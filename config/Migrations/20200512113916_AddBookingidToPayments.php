<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddBookingidToPayments extends AbstractMigration
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
        $table = $this->table('payments');
       $table->addColumn('booking_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
    ->addForeignKey('booking_id' , 'bookings' , 'id')
        ->update();
    }
}
