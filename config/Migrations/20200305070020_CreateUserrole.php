<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUserrole extends AbstractMigration
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
        $table = $this->table('user_roles');
        $table->addColumn('user_rolename', 'text', [
            'default' => null,
            'null' => false,
            'limit' => 100,
        ]);
       
        $table->create();
     
    }
}
