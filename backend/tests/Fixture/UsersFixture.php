<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
            'length' => 100,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'email' => [
            'type' => 'string',
            'length' => 200,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'password' => [
            'type' => 'string',
            'length' => 100,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
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
            'email' => ['type' => 'unique', 'columns' => ['email'], 'length' => []],
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
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'created' => '2021-01-11 05:08:55',
                'modified' => '2021-01-11 05:08:55',
            ],
        ];
        parent::init();
    }
}
