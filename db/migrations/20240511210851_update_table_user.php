<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateTableUser extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table("users");
        $table->addColumn('image_url', 'string')
            ->update();
    }
}
