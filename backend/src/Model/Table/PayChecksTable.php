<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayChecks Model
 *
 * @property \App\Model\Table\PayCheckBudgetsTable&\Cake\ORM\Association\HasMany $PayCheckBudgets
 * @property \App\Model\Table\PayCheckDeductionsTable&\Cake\ORM\Association\HasMany $PayCheckDeductions
 *
 * @method \App\Model\Entity\PayCheck newEmptyEntity()
 * @method \App\Model\Entity\PayCheck newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheck[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheck get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayCheck findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PayCheck patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheck[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheck|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheck saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheck[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheck[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheck[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheck[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PayChecksTable extends Table
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

        $this->setTable('pay_checks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('PayCheckBudgets', [
            'foreignKey' => 'pay_check_id',
        ]);
        $this->hasMany('PayCheckDeductions', [
            'foreignKey' => 'pay_check_id',
        ]);
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
            ->date('pay_check_date')
            ->allowEmptyDate('pay_check_date');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->nonNegativeInteger('series')
            ->requirePresence('series', 'create')
            ->notEmptyString('series')
            ->add('series', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->numeric('gross')
            ->requirePresence('gross', 'create')
            ->notEmptyString('gross');

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
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);
        $rules->add($rules->isUnique(['series']), ['errorField' => 'series']);

        return $rules;
    }
}
