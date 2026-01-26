<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Address extends AbstractMigration
{    
    public function change(): void
    {
         $table = $this->table('address', ['id' => false, 'primary_key' => ['id']]);
        $table->addColumn('id', 'biginteger', ['identity' => true, 'null' => false])
            ->addColumn('id_usuario', 'biginteger', ['null' => true])
            ->addColumn('titulo', 'text', ['null' => true])
            ->addColumn('cep', 'text', ['null' => true])
            ->addColumn('numero', 'text', ['null' => true])
            ->addColumn('bairro', 'text', ['null' => true])
            ->addColumn('cidade', 'text', ['null' => true])
            ->addColumn('uf', 'text', ['null' => true])
            ->addColumn('ibge', 'text', ['null' => true])
            // FK + CONSTRAINT
            ->addForeignKey('id_usuario', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'NO ACTION'])
            ->create();
    }
}

/* --- IGNORE ---
public function change()
{
    $table = $this->table('address', ['id' => false, 'primary_key' => ['id']]);

    $table->addColumn('id', 'biginteger', ['identity' => true])
          ->addColumn('logradouro', 'text')
          ->addColumn('numero', 'text', ['null' => true])
          ->addColumn('bairro', 'text')
          ->addColumn('cidade', 'text')
          ->addColumn('estado', 'text', ['limit' => 2])
          ->addColumn('cep', 'text')

          ->addColumn('company_id', 'biginteger', ['null' => true])
          ->addColumn('client_id', 'biginteger', ['null' => true])
          ->addColumn('supplier_id', 'biginteger', ['null' => true])

          // ÍNDICES
          ->addIndex(['company_id'], ['name' => 'idx_address_company'])
          ->addIndex(['client_id'], ['name' => 'idx_address_client'])
          ->addIndex(['supplier_id'], ['name' => 'idx_address_supplier'])

          // FK + CONSTRAINT
          ->addForeignKey('company_id', 'company', 'id', [
              'constraint' => 'fk_address_company'
          ])
          ->addForeignKey('client_id', 'client', 'id', [
              'constraint' => 'fk_address_client'
          ])
          ->addForeignKey('supplier_id', 'supplier', 'id', [
              'constraint' => 'fk_address_supplier'
          ])
          ->create();
}

 --- IGNORE --- */

 