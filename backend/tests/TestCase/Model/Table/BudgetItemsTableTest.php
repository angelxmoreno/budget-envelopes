<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BudgetItemsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BudgetItemsTable Test Case
 */
class BudgetItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BudgetItemsTable
     */
    protected $BudgetItems;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.BudgetItems',
        'app.Categories',
        'app.Budgets',
        'app.PayCheckBudgets',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('BudgetItems') ? [] : ['className' => BudgetItemsTable::class];
        $this->BudgetItems = $this->getTableLocator()->get('BudgetItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->BudgetItems);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
