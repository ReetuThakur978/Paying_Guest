<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateBookings extends AbstractMigration
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
          $this->table('bookings')
           ->addColumn('transient_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
            ->addColumn('days', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])

            ->addColumn('personshift', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
            ])

          ->addColumn('requirement', 'string', [
                'default' => null,
                'limit' => 60,
                'null' => false,
            ])
         ->addForeignKey('transient_id' , 'users' , 'user_id')
         ->create();

    }
}
