<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterAreaFromPgdetails extends AbstractMigration
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
        $table = $this->table('pgdetails');
    $table->changeColumn('area','string',['limit' => 30]);
        $table->update();
    }
}
