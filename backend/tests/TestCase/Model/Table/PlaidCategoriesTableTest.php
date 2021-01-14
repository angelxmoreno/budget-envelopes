<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlaidCategoriesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlaidCategoriesTable Test Case
 */
class PlaidCategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlaidCategoriesTable
     */
    protected $PlaidCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PlaidCategories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PlaidCategories') ? [] : ['className' => PlaidCategoriesTable::class];
        $this->PlaidCategories = $this->getTableLocator()->get('PlaidCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PlaidCategories);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
