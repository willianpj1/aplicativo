<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Product extends AbstractMigration
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
        $table = $this->table('product', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('descricao', 'text')
            ->addColumn('preco', 'decimal', [
                'precision' => 18,
                'scale' => 4,
                'default' => 0
            ])
            ->addColumn('estoque', 'integer', ['default' => 0])
            ->addColumn('supplier_id', 'biginteger')

            // INDEX
            ->addIndex(['supplier_id'], ['name' => 'idx_product_supplier'])

            // FK + CONSTRAINT
            ->addForeignKey('supplier_id', 'supplier', 'id', [
                'delete' => 'CASCADE', 'update' => 'NO ACTION'
            ])
            ->create();
    }
}
