<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PaymentsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('payments');
        $this->setDisplayField('payment_id');
        $this->setPrimaryKey('payment_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'transientuser_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Bookings', [
            'foreignKey' => 'booking_id',
            'joinType' => 'INNER',
        ]);
        // $this->belongsTo('Transactions', [
        //     'foreignKey' => 'transaction_id',
        //     'joinType' => 'INNER',
        // ]);
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('payment_id')
            ->allowEmptyString('payment_id', null, 'create');

        $validator
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->scalar('payment_mode')
            ->maxLength('payment_mode', 20)
            ->requirePresence('payment_mode', 'create')
            ->notEmptyString('payment_mode');

        return $validator;
    }

    //    public function buildRules(RulesChecker $rules): RulesChecker
    // {
    //     $rules->add($rules->existsIn(['transientuser_id'], 'Users'));
    //     $rules->add($rules->existsIn(['booking_id'], 'Bookings'));
    //     // $rules->add($rules->existsIn(['transaction_id'], 'Transactions'));

    //     return $rules;
    // }
}
