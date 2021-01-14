<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CreditCards Model
 *
 * @method \App\Model\Entity\CreditCard newEmptyEntity()
 * @method \App\Model\Entity\CreditCard newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard get($primaryKey, $options = [])
 * @method \App\Model\Entity\CreditCard findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CreditCard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CreditCard|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditCard saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CreditCard[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CreditCard[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CreditCard[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CreditCard[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CreditCardsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('credit_cards');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('issuer')
            ->maxLength('issuer', 100)
            ->requirePresence('issuer', 'create')
            ->notEmptyString('issuer');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name');

        $validator
            ->scalar('url')
            ->allowEmptyString('url');

        $validator
            ->scalar('img_url')
            ->allowEmptyString('img_url');

        $validator
            ->numeric('apr')
            ->greaterThanOrEqual('apr', 0)
            ->requirePresence('apr', 'create')
            ->notEmptyString('apr');

        $validator
            ->numeric('limit')
            ->requirePresence('limit', 'create')
            ->notEmptyString('limit');

        $validator
            ->numeric('balance')
            ->requirePresence('balance', 'create')
            ->notEmptyString('balance');

        $validator
            ->date('due_date')
            ->requirePresence('due_date', 'create')
            ->notEmptyDate('due_date');

        return $validator;
    }
}
