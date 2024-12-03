<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateSkillsTable extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('skills');
        $table->addColumn('name', 'string', ['null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}
