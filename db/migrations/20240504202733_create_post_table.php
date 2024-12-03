<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePostTable extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('posts');
        $table->addColumn('content', 'string')
            ->addColumn('image_url', 'string')
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->create();
    }

    public function down()
    {
        $this->table('posts')->drop()->save();
    }
}
