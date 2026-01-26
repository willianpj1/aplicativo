<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SaleItem extends AbstractMigration
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
        $table = $this->table('sale_item', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('sale_id', 'biginteger')
            ->addColumn('product_id', 'biginteger')
            ->addColumn('quantidade', 'integer')
            ->addColumn('valor_unitario', 'decimal', [
                'precision' => 18,
                'scale' => 4
            ])

            ->addIndex(['sale_id'], ['name' => 'idx_sale_item_sale'])
            ->addIndex(['product_id'], ['name' => 'idx_sale_item_product'])

            ->addForeignKey('sale_id', 'sale', 'id', [
                'constraint' => 'fk_sale_item_sale',
                'delete' => 'CASCADE'
            ])
            ->addForeignKey('product_id', 'product', 'id', [
                'constraint' => 'fk_sale_item_product'
            ])
            ->create();
    }
}
