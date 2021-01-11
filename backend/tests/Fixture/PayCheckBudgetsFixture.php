<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PayCheckBudgetsFixture
 */
class PayCheckBudgetsFixture extends TestFixture
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
        'pay_check_id' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
        ],
        'budget_item_id' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
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
            'pay_check_id' => ['type' => 'index', 'columns' => ['pay_check_id'], 'length' => []],
            'budget_item_id' => ['type' => 'index', 'columns' => ['budget_item_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'pay_check_id' => 1,
                'budget_item_id' => 1,
                'amount' => 1,
                'created' => '2021-01-11 05:08:55',
                'modified' => '2021-01-11 05:08:55',
            ],
        ];
        parent::init();
    }
}
