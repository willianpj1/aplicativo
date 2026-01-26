<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Contact extends AbstractMigration
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
        $table = $this->table('contact', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('tipo', 'text')   // telefone, email
            ->addColumn('valor', 'text')

            ->addColumn('company_id', 'biginteger', ['null' => true])
            ->addColumn('client_id', 'biginteger', ['null' => true])
            ->addColumn('supplier_id', 'biginteger', ['null' => true])

            // ÍNDICES
            ->addIndex(['company_id'], ['name' => 'idx_contact_company'])
            ->addIndex(['client_id'], ['name' => 'idx_contact_client'])
            ->addIndex(['supplier_id'], ['name' => 'idx_contact_supplier'])

            // FK + CONSTRAINT
            ->addForeignKey('company_id', 'company', 'id', [
                'constraint' => 'fk_contact_company'
            ])
            ->addForeignKey('client_id', 'client', 'id', [
                'constraint' => 'fk_contact_client'
            ])
            ->addForeignKey('supplier_id', 'supplier', 'id', [
                'constraint' => 'fk_contact_supplier'
            ])
            ->create();
    }
}
