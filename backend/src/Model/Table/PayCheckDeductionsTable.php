<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayCheckDeductions Model
 *
 * @property \App\Model\Table\PayChecksTable&\Cake\ORM\Association\BelongsTo $PayChecks
 * @property \App\Model\Table\IncomeDeductionsTable&\Cake\ORM\Association\BelongsTo $IncomeDeductions
 *
 * @method \App\Model\Entity\PayCheckDeduction newEmptyEntity()
 * @method \App\Model\Entity\PayCheckDeduction newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckDeduction get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckDeduction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckDeduction[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PayCheckDeductionsTable extends Table
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

        $this->setTable('pay_check_deductions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PayChecks', [
            'foreignKey' => 'pay_check_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('IncomeDeductions', [
            'foreignKey' => 'income_deduction_id',
            'joinType' => 'INNER',
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
            ->numeric('amount')
            ->requirePresence('amount', 'create')
            ->notEmptyString('amount');

        $validator
            ->notEmptyString('position');

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
        $rules->add($rules->existsIn(['pay_check_id'], 'PayChecks'), ['errorField' => 'pay_check_id']);
        $rules->add($rules->existsIn(['income_deduction_id'], 'IncomeDeductions'),
            ['errorField' => 'income_deduction_id']);

        return $rules;
    }
}
