<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * IncomeDeductions Model
 *
 * @property \App\Model\Table\IncomesTable&\Cake\ORM\Association\BelongsTo $Incomes
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\PayCheckDeductionsTable&\Cake\ORM\Association\HasMany $PayCheckDeductions
 *
 * @method \App\Model\Entity\IncomeDeduction newEmptyEntity()
 * @method \App\Model\Entity\IncomeDeduction newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\IncomeDeduction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\IncomeDeduction get($primaryKey, $options = [])
 * @method \App\Model\Entity\IncomeDeduction findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\IncomeDeduction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\IncomeDeduction[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\IncomeDeduction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IncomeDeduction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\IncomeDeduction[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IncomeDeduction[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\IncomeDeduction[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\IncomeDeduction[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IncomeDeductionsTable extends Table
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

        $this->setTable('income_deductions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Incomes', [
            'foreignKey' => 'income_id',
            'joinType' => 'INNER',
        ]);

        $this->addBehavior('IncomeNetUpdate');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
        ]);
        $this->hasMany('PayCheckDeductions', [
            'foreignKey' => 'income_deduction_id',
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
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name');

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
        $rules->add($rules->existsIn(['income_id'], 'Incomes'), ['errorField' => 'income_id']);
        $rules->add($rules->existsIn(['category_id'], 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}
