<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateLikeTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('likes');

        $table->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('post_id', 'integer', ['signed' => false])
            ->addForeignKey('post_id', 'posts', 'id', ['delete' => 'CASCADE'])
            ->addIndex(['user_id', 'post_id'], ['unique' => true])
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
