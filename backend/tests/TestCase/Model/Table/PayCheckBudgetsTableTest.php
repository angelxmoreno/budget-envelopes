<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayCheckBudgetsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayCheckBudgetsTable Test Case
 */
class PayCheckBudgetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PayCheckBudgetsTable
     */
    protected $PayCheckBudgets;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PayCheckBudgets',
        'app.PayChecks',
        'app.BudgetItems',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PayCheckBudgets') ? [] : ['className' => PayCheckBudgetsTable::class];
        $this->PayCheckBudgets = $this->getTableLocator()->get('PayCheckBudgets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PayCheckBudgets);

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
