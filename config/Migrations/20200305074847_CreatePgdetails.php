<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePgdetails extends AbstractMigration
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
$this->table('pg_details', ['id' => false, 'primary_key' => ['pg_id']])
            ->addColumn('pg_id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('owner_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('room', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])
            ->addColumn('location', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
            ->addColumn('address', 'string', [
                'default' => null,
                'limit' => 30,
                'null' => false,
            ])
             ->addColumn('area', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
             ->addColumn('which_gender', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('availability', 'string', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('no_of_room', 'integer', [
                'default' => null,
                'limit' => 10,
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
            ->addForeignKey('owner_id' , 'user_tables' , 'user_id')
            ->create();

            }
}
