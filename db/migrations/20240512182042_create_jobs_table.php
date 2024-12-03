<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateJobsTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('jobs');
        $table->addColumn('company', 'string', ['null' => false])
            ->addColumn('job_title', 'string', ['null' => false])
            ->addColumn('location', 'string', ['null' => false])
            ->addColumn('salary', 'integer', ['null' => false])
            ->addColumn('type', 'string', ['null' => false])
            ->addColumn('email', 'string', ['null' => false])
            ->addColumn('description', 'text', ['null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false, 'null' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}
