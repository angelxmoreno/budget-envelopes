<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BudgetsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BudgetsTable Test Case
 */
class BudgetsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BudgetsTable
     */
    protected $Budgets;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Budgets',
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
        $config = $this->getTableLocator()->exists('Budgets') ? [] : ['className' => BudgetsTable::class];
        $this->Budgets = $this->getTableLocator()->get('Budgets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Budgets);

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
