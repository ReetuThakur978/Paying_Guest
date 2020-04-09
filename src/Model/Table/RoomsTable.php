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
            ->scalar('ac')
            ->maxLength('ac', 20)
            ->requirePresence('ac', 'create')
            ->notEmptyString('ac');

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

        $validator
            ->scalar('food_availability')
            ->maxLength('food_availability', 10)
            ->requirePresence('food_availability', 'create')
            ->notEmptyString('food_availability');

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
