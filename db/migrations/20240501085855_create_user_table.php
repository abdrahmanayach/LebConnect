<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('first_name', 'string')
            ->addColumn('last_name', 'string')
            ->addColumn('email', 'string', ['null' => false])
            ->addIndex(['email'], ['unique' => true])
            ->addColumn('password', 'string')
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->table('users')->drop()->save();
    }
}
