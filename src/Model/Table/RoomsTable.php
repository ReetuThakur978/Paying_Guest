<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class RoomsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('rooms');
        $this->setDisplayField('room_id');
        $this->setPrimaryKey('room_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pgdetails', [
            'foreignKey' => 'pg_id',
            'joinType' => 'INNER',
        ]);
    }

    
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('room_id')
            ->allowEmptyString('room_id', null, 'create');

        $validator
            ->scalar('ac_noac')
            ->maxLength('ac_noac', 20)
            ->requirePresence('ac_noac', 'create')
            ->notEmptyString('ac_noac');

        $validator
            ->scalar('seater')
            ->maxLength('seater', 20)
            ->requirePresence('seater', 'create')
            ->notEmptyString('seater');

        $validator
            ->integer('rent')
            ->requirePresence('rent', 'create')
            ->notEmptyString('rent');

        $validator
            ->requirePresence('image', 'create')
            ->notEmptyString('image');

        $validator
            ->scalar('with_or_without_food')
            ->maxLength('with_or_without_food', 10)
            ->requirePresence('with_or_without_food', 'create')
            ->notEmptyString('with_or_without_food');

        $validator
            ->integer('security_charge')
            ->requirePresence('security_charge', 'create')
            ->notEmptyString('security_charge');

        $validator
            ->integer('notic_period')
            ->requirePresence('notic_period', 'create')
            ->notEmptyString('notic_period');

        $validator
            ->integer('seates_available')
            ->requirePresence('seates_available', 'create')
            ->notEmptyString('seates_available');

        $validator
            ->scalar('status')
            ->maxLength('status', 255)
            ->notEmptyString('status');

        return $validator;
    }

    
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['pg_id'], 'Pgdetails'));

        return $rules;
    }
}
