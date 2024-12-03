<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateEducationTable extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('education');
        $table->addColumn('university', 'string', ['null' => false])
            ->addColumn('major', 'string', ['null' => false])
            ->addColumn('start_date', 'date', ['null' => false])
            ->addColumn('end_date', 'date', ['null' => false])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE'])
            ->addColumn('created_at', 'datetime', ['null' => true])
            ->addColumn('updated_at', 'datetime', ['null' => true])
            ->create();
    }
}
