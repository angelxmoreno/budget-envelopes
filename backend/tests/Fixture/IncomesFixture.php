<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IncomesFixture
 */
class IncomesFixture extends TestFixture
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
        'name' => [
            'type' => 'string',
            'length' => 50,
            'null' => true,
            'default' => null,
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'gross' => [
            'type' => 'float',
            'length' => 16,
            'precision' => 2,
            'unsigned' => false,
            'null' => false,
            'default' => null,
            'comment' => ''
        ],
        'frequency' => [
            'type' => 'string',
            'length' => 50,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'first_pay_check_date' => [
            'type' => 'date',
            'length' => null,
            'null' => true,
            'default' => null,
            'comment' => '',
            'precision' => null
        ],
        'net' => [
            'type' => 'float',
            'length' => 16,
            'precision' => 2,
            'unsigned' => false,
            'null' => true,
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
                'name' => 'Lorem ipsum dolor sit amet',
                'gross' => 1,
                'frequency' => 'Lorem ipsum dolor sit amet',
                'first_pay_check_date' => '2021-01-11',
                'net' => 1,
                'created' => '2021-01-11 05:08:55',
                'modified' => '2021-01-11 05:08:55',
            ],
        ];
        parent::init();
    }
}
