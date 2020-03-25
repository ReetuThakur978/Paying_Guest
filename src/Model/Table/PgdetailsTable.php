<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class PgdetailsTable extends Table
{
    
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pgdetails');
        $this->setDisplayField('pg_id');
        $this->setPrimaryKey('pg_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'owner_id',
            'joinType' => 'INNER',
        ]);
    }

   
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('pg_id')
            ->allowEmptyString('pg_id', null, 'create');

        $validator
            ->scalar('room')
            ->maxLength('room', 20)
            ->requirePresence('room', 'create')
            ->notEmptyString('room');

        $validator
            ->scalar('location')
            ->maxLength('location', 30)
            ->requirePresence('location', 'create')
            ->notEmptyString('location');

        $validator
            ->scalar('address')
            ->maxLength('address', 30)
            ->requirePresence('address', 'create')
            ->notEmptyString('address');

        $validator
            ->scalar('area')
            ->maxLength('area', 10)
            ->requirePresence('area', 'create')
            ->notEmptyString('area');

        $validator
            ->scalar('which_gender')
            ->maxLength('which_gender', 10)
            ->requirePresence('which_gender', 'create')
            ->notEmptyString('which_gender');

        $validator
            ->scalar('availability')
            ->maxLength('availability', 10)
            ->requirePresence('availability', 'create')
            ->notEmptyString('availability');

        $validator
            ->integer('no_of_room')
            ->requirePresence('no_of_room', 'create')
            ->notEmptyString('no_of_room');

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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['owner_id'], 'Users'));

        return $rules;
    }
}
