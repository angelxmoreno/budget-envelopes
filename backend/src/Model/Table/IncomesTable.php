<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Incomes Model
 *
 * @property \App\Model\Table\IncomeDeductionsTable&\Cake\ORM\Association\HasMany $IncomeDeductions
 *
 * @method \App\Model\Entity\Income newEmptyEntity()
 * @method \App\Model\Entity\Income newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Income[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Income get($primaryKey, $options = [])
 * @method \App\Model\Entity\Income findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Income patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Income[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Income|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Income saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class IncomesTable extends Table
{

    public const PAYCHECK_FREQUENCY_WEEKLY = 'weekly';
    public const PAYCHECK_FREQUENCY_BI_WEEKLY = 'bi-weekly';
    public const PAYCHECK_FREQUENCY_MONTHLY = 'monthly';
    public const PAYCHECK_FREQUENCY_BI_MONTHLY = 'bi-monthly';

    public const PAYCHECK_FREQUENCY = [
        self::PAYCHECK_FREQUENCY_WEEKLY,
        self::PAYCHECK_FREQUENCY_BI_WEEKLY,
        self::PAYCHECK_FREQUENCY_MONTHLY,
        self::PAYCHECK_FREQUENCY_BI_MONTHLY,
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('incomes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('IncomeDeductions', [
            'foreignKey' => 'income_id',
        ]);

        $this->addBehavior('IncomeNetUpdate');
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
            ->scalar('frequency')
            ->notEmptyString('frequency')
            ->requirePresence('frequency', 'create')
            ->inList('frequency', self::PAYCHECK_FREQUENCY);

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->numeric('gross')
            ->requirePresence('gross', 'create')
            ->notEmptyString('gross');

        $validator
            ->date('first_pay_check_date')
            ->allowEmptyDate('first_pay_check_date');

        $validator
            ->numeric('net')
            ->allowEmptyString('net');

        return $validator;
    }
}
