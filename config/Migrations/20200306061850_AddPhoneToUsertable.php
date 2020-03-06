<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class AddPhoneToUsertable extends AbstractMigration
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
        $table = $this->table('user_tables');
	$table->addColumn('phone', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => false,
            ])
        ->update();
    }
}
