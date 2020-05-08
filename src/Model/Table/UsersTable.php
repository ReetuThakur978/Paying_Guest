<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use Cake\Utility\Text;


class UsersTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('user_id');

        $this->addBehavior('Timestamp');

        // $this->belongsTo('userroles', [
        //     'foreignKey' => 'role',
        //     'joinType' => 'INNER',
        // ]);
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
            ->sameAs('password_match','password','Password Match failed');    

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

        $validator
            ->allowEmptyFile('image')
            ->add( 'image', [
            'mimeType' => [
                'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg' ] ],
                'message' => 'Please upload only jpg and png.',
            ],
            'fileSize' => [
                'rule' => [ 'fileSize', '<=', '1MB' ],
                'message' => 'Image file size must be less than 1MB.',
            ],
        ] );    

        // $validator 
        //     ->scalar('confirm_password')
        //     ->maxLength('confirm_password', 20)
        //     ->requirePresence('confirm_password', 'create')  
        //     ->notEmptyString('confirm_password');
        //     ->add('confirm_password',[
        //         'password_mismatch'=>[
        //                 'rule'=>['compareWith','password'],
        //                 'message'=>'Password didnot match'
        //         ]

        //     ]) ;
    
     $validator
            ->scalar('token')
            ->maxLength('token', 20)
            ->notEmptyString('token');


        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        // $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        // $rules->add($rules->existsIn(['role'], 'userroles'));


        return $rules;
    }
}
