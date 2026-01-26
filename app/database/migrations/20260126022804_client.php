<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Client extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('client', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('nome', 'text')
            ->addColumn('sobrenome', 'text')
            ->addColumn('cpf', 'text')
            ->addColumn('ativo', 'boolean', ['default' => true])
            ->addColumn('data_cadastro', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
