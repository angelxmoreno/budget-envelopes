<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BudgetItemsFixture
 */
class BudgetItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'autoIncrement' => true,
            'precision' => null
        ],
        'category_id' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
        ],
        'budget_id' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
        ],
        'name' => [
            'type' => 'string',
            'length' => 100,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'amount' => [
            'type' => 'float',
            'length' => 16,
            'precision' => 2,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => ''
        ],
        'created' => [
            'type' => 'datetime',
            'length' => null,
            'precision' => null,
            'null' => true,
            'default' => null,
            'comment' => ''
        ],
        'modified' => [
            'type' => 'datetime',
            'length' => null,
            'precision' => null,
            'null' => true,
            'default' => null,
            'comment' => ''
        ],
        '_indexes' => [
            'category_id' => ['type' => 'index', 'columns' => ['category_id'], 'length' => []],
            'budget_id' => ['type' => 'index', 'columns' => ['budget_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'name' => ['type' => 'unique', 'columns' => ['name'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // phpcs:enable

    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'category_id' => 1,
                'budget_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'amount' => 1,
                'created' => '2021-01-11 05:08:55',
                'modified' => '2021-01-11 05:08:55',
            ],
        ];
        parent::init();
    }
}
