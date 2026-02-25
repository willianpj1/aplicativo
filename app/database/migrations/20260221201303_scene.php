<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Scene extends AbstractMigration
{
    public function up(): void
    {
        $this->execute("
            CREATE OR REPLACE FUNCTION fn_trigger_sale_to_stock_movement()
            RETURNS TRIGGER
            LANGUAGE plpgsql
            AS $$
            BEGIN

                /*
                 * Dispara somente quando:
                 *  - o campo estado_venda for definido como 'VENDA'
                 *  - e o valor anterior era diferente (evita disparos duplicados)
                 */
                IF (NEW.estado_venda = 'VENDA') 
                   AND (OLD.estado_venda IS DISTINCT FROM 'VENDA') THEN

                    INSERT INTO stock_movement(
                        id_produto, 
                        quantidade_saida, 
                        tipo, 
                        origem_movimento
                    )
                    SELECT 
                        id_produto, 
                        COALESCE(SUM(quantidade), 0) AS quantidade, 
                        'SAIDA', 
                        'VENDA'
                    FROM item_sale
                    WHERE id_venda = NEW.id
                    GROUP BY id_produto;

                    -- Validação: garante que existem itens para movimentar
                    IF NOT FOUND THEN
                        RAISE WARNING 
                        'Trigger fn_trigger_sale_to_stock_movement: Nenhum item encontrado para a venda ID = %', 
                        NEW.id;
                    END IF;

                END IF;

                RETURN NEW;
            END;
            $$;
        ");
    }   
}