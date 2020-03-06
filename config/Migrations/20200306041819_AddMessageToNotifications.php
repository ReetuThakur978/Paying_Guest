<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddMessageToNotifications extends AbstractMigration
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
        $table = $this->table('notifications');
	$table->addColumn('message', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
        
        ->update();
    }
}
