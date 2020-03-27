<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveNoofroomFromPgdetails extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $table = $this->table('pgdetails');
$table->removeColumn('no_of_room')
        ->save();
    }
}
