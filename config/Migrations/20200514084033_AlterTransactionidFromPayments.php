<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AlterTransactionidFromPayments extends AbstractMigration
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
        $table = $this->table('payments')
        ->changeColumn('transaction_id','integer',['limit' => 10])
        ->addForeignKey('transaction_id' , 'rooms' , 'room_id')
        ->update();
    }
}
