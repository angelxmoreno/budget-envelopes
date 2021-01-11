<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PayChecksFixture
 */
class PayChecksFixture extends TestFixture
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
        'pay_check_date' => [
            'type' => 'date',
            'length' => null,
            'null' => true,
            'default' => null,
            'comment' => '',
            'precision' => null
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
        'series' => [
            'type' => 'integer',
            'length' => null,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => '',
            'precision' => null,
            'autoIncrement' => null
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
            'name' => ['type' => 'unique', 'columns' => ['name'], 'length' => []],
            'series' => ['type' => 'unique', 'columns' => ['series'], 'length' => []],
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
                'pay_check_date' => '2021-01-11',
                'name' => 'Lorem ipsum dolor sit amet',
                'series' => 1,
                'gross' => 1,
                'created' => '2021-01-11 05:08:55',
                'modified' => '2021-01-11 05:08:55',
            ],
        ];
        parent::init();
    }
}
