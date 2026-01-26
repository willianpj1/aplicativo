<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Company extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('company', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('razao_social', 'text')
            ->addColumn('nome_fantasia', 'text', ['null' => true])
            ->addColumn('cnpj', 'text')
            ->addColumn('ativo', 'boolean', ['default' => true])
            ->addColumn('data_cadastro', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
