<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayCheckBudgets Model
 *
 * @property \App\Model\Table\PayChecksTable&\Cake\ORM\Association\BelongsTo $PayChecks
 * @property \App\Model\Table\BudgetItemsTable&\Cake\ORM\Association\BelongsTo $BudgetItems
 *
 * @method \App\Model\Entity\PayCheckBudget newEmptyEntity()
 * @method \App\Model\Entity\PayCheckBudget newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckBudget[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckBudget get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayCheckBudget findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PayCheckBudget patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckBudget[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayCheckBudget|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheckBudget saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayCheckBudget[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckBudget[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckBudget[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PayCheckBudget[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PayCheckBudgetsTable extends Table
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

        $this->setTable('pay_check_budgets');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('PayChecks', [
            'foreignKey' => 'pay_check_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('BudgetItems', [
            'foreignKey' => 'budget_item_id',
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
        $rules->add($rules->existsIn(['budget_item_id'], 'BudgetItems'), ['errorField' => 'budget_item_id']);

        return $rules;
    }
}
