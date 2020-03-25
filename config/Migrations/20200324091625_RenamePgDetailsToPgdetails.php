<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RenamePgDetailsToPgdetails extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
     $this->table('pg_details')
                ->rename('pgdetails')
                ->save();
    }
}
