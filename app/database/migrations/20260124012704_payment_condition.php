<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PaymentCondition extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('payment_condition', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('descricao', 'text')
            ->addColumn('quantidade_parcelas', 'integer')
            ->create();
    }
}
