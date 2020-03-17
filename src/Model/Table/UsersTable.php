<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('user_id');

        $this->addBehavior('Timestamp');
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id', null, 'create');

        $validator
            ->scalar('firstname')
            ->maxLength('firstname', 20)
            ->notEmptyString('firstname');

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 20)
           
            ->notEmptyString('lastname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 20)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->integer('adharcard')
            ->requirePresence('adharcard', 'create')
            ->notEmptyString('adharcard');

        $validator
            ->integer('role')
            ->requirePresence('role', 'create')
            ->notEmptyString('role');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->notEmptyString('status');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
