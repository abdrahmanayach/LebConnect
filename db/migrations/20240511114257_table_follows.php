<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class TableFollows extends AbstractMigration
{

    public function change(): void
    { {
            $table = $this->table('follows');

            $table->addColumn('follower_id', 'integer', ['signed' => false, 'null' => false])
                ->addForeignKey('follower_id', 'users', 'id', ['delete' => 'CASCADE'])
                ->addColumn('followed_id', 'integer', ['signed' => false, 'null' => false])
                ->addForeignKey('followed_id', 'users', 'id', ['delete' => 'CASCADE'])
                ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
                ->create();
        }
    }
}
