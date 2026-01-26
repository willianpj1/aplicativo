<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SaleInstallment extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('sale_installment', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('sale_id', 'biginteger')
            ->addColumn('numero_parcela', 'integer')
            ->addColumn('valor', 'decimal', [
                'precision' => 18,
                'scale' => 4
            ])
            ->addColumn('data_vencimento', 'date')
            ->addColumn('pago', 'boolean', ['default' => false])

            ->addIndex(['sale_id'], ['name' => 'idx_sale_installment_sale'])

            ->addForeignKey('sale_id', 'sale', 'id', [
                'constraint' => 'fk_sale_installment_sale'
            ])
            ->create();
    }
}
