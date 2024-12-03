<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateCommentTable extends AbstractMigration
{

    public function change(): void
    {
        $table = $this->table('comments');

        $table->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('post_id', 'integer', ['signed' => false])
            ->addForeignKey('post_id', 'posts', 'id', ['delete' => 'CASCADE'])
            ->addColumn('content', 'text')
            ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
