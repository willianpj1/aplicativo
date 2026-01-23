<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Users extends AbstractMigration
{
    
    public function change(): void
    {
        $this->table('usuarios')
            ->addColumn('nome', 'text', [
                'null' => false
            ])
            ->addColumn('sobrenome', 'text', [
                'null' => false
            ])
            ->addColumn('data_nascimento', 'date', [
                'null' => false
            ])
            ->addColumn('data_cadastro', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false
            ])
            ->addColumn('status', 'boolean', [
                'default' => true,
                'null' => false,
                'comment' => 'Indica se o usuário está ativo'
            ])
            ->create();
    }
}
