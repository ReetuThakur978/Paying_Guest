<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class BookingsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('bookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'transient_id',
            'joinType' => 'INNER',
        ]);
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('days')
            ->maxLength('days', 20)
            ->requirePresence('days', 'create')
            ->notEmptyString('days');

        $validator
            ->scalar('personshift')
            ->maxLength('personshift', 20)
            ->requirePresence('personshift', 'create')
            ->notEmptyString('personshift');

        $validator
            ->scalar('requirement')
            ->maxLength('requirement', 60)
            ->requirePresence('requirement', 'create')
            ->notEmptyString('requirement');

        return $validator;
    }
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['transient_id'], 'Users'));

        return $rules;
    }
}
