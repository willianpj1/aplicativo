<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Sale extends AbstractMigration
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
        $table = $this->table('sale', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('client_id', 'biginteger')
            ->addColumn('company_id', 'biginteger')
            ->addColumn('payment_condition_id', 'biginteger')
            ->addColumn('valor_total', 'decimal', [
                'precision' => 18,
                'scale' => 4,
                'default' => 0
            ])
            ->addColumn('data_venda', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])

            ->addIndex(['client_id'], ['name' => 'idx_sale_client'])
            ->addIndex(['company_id'], ['name' => 'idx_sale_company'])
            ->addIndex(['payment_condition_id'], ['name' => 'idx_sale_payment'])

            ->addForeignKey('client_id', 'client', 'id', [
                'constraint' => 'fk_sale_client'
            ])
            ->addForeignKey('company_id', 'company', 'id', [
                'constraint' => 'fk_sale_company'
            ])
            ->addForeignKey('payment_condition_id', 'payment_condition', 'id', [
                'constraint' => 'fk_sale_payment_condition'
            ])
            ->create();
    }
}
