<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateNotifications extends AbstractMigration
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
	  $this->table('notifications', ['id' => false, 'primary_key' => ['notification_id']])
            ->addColumn('notification_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('transientuser_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('pgowner_id', 'integer', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
	    ->addColumn('status', 'string', [
                'comment' => '1:Active, 0:Inactive',
                'default' => '1',
                'limit' => null,
                'null' => false,
            ])
            
	    ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
	     ->addColumn('updated', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            
           
            ->addForeignKey('pgowner_id' , 'user_tables' , 'user_id')
	    ->addForeignKey('transientuser_id' , 'user_tables' , 'user_id')

	

        ->create();
    }
}
