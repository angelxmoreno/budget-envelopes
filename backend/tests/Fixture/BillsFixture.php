<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BillsFixture
 */
class BillsFixture extends TestFixture
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
            'null' => true,
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
        'url' => [
            'type' => 'text',
            'length' => null,
            'null' => true,
            'default' => null,
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'img_url' => [
            'type' => 'text',
            'length' => null,
            'null' => true,
            'default' => null,
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'amount' => [
            'type' => 'float',
            'length' => 16,
            'precision' => 2,
            'unsigned' => true,
            'null' => false,
            'default' => null,
            'comment' => ''
        ],
        'frequency' => [
            'type' => 'string',
            'length' => 100,
            'null' => false,
            'default' => '',
            'collate' => 'utf8mb4_unicode_ci',
            'comment' => '',
            'precision' => null
        ],
        'is_auto_paid' => [
            'type' => 'boolean',
            'length' => null,
            'null' => true,
            'default' => '0',
            'comment' => '',
            'precision' => null
        ],
        'due_date' => [
            'type' => 'date',
            'length' => null,
            'null' => false,
            'default' => null,
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
        '_indexes' => [
            'category_id' => ['type' => 'index', 'columns' => ['category_id'], 'length' => []],
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
                'category_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'img_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'amount' => 1,
                'frequency' => 'Lorem ipsum dolor sit amet',
                'is_auto_paid' => 1,
                'due_date' => '2021-01-12',
                'created' => '2021-01-12 03:44:26',
                'modified' => '2021-01-12 03:44:26',
            ],
        ];
        parent::init();
    }
}
