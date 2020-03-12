<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateContactus extends AbstractMigration
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
        $this->table('contactus', ['id' => true, 'primary_key' => ['id'],'autoIncrement' => true,])
            ->addColumn('name', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('phone', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
		->addColumn('Address', 'string', [
                'default' => null,
                'limit' => 40,
                'null' => false,
            ])
		->addColumn('Message', 'string', [
                'default' => null,
                'limit' => 100,
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
        ->create();
    }
}
