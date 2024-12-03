<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTableUsers extends AbstractMigration
{
    public function up(): void
    {
        $table = $this->table("users");
        $table->addColumn('profile_path', 'string')
            ->update();
    }
}
