<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PlaidCategories Model
 *
 * @method \App\Model\Entity\PlaidCategory newEmptyEntity()
 * @method \App\Model\Entity\PlaidCategory newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PlaidCategory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PlaidCategory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PlaidCategory findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PlaidCategory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PlaidCategory[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PlaidCategory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlaidCategory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PlaidCategory[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlaidCategory[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlaidCategory[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PlaidCategory[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 * @mixin \Cake\ORM\Behavior\TreeBehavior
 */
class PlaidCategoriesTable extends Table
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

        $this->setTable('plaid_categories');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Tree');

        $this->belongsTo('ParentPlaidCategories', [
            'className' => 'PlaidCategories',
            'foreignKey' => 'parent_id',
        ]);
        $this->hasMany('ChildPlaidCategories', [
            'className' => 'PlaidCategories',
            'foreignKey' => 'parent_id',
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
            ->notEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name');

        $validator
            ->scalar('grouping')
            ->maxLength('grouping', 100)
            ->allowEmptyString('grouping');

        return $validator;
    }
}
