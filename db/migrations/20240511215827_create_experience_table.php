<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateExperienceTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('Experience');
        $table->addColumn('job_title', 'string', ['null' => false])
            ->addColumn('company', 'string', ['null' => false])
            ->addColumn('type', 'string', ['null' => false])
            ->addColumn('description', 'string', ['null' => false])
            ->addColumn('start_date', 'date', ['null' => false])
            ->addColumn('end_date', 'date', ['null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}
