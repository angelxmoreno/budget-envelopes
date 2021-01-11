<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomeDeductionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomeDeductionsTable Test Case
 */
class IncomeDeductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomeDeductionsTable
     */
    protected $IncomeDeductions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.IncomeDeductions',
        'app.Incomes',
        'app.Categories',
        'app.PayCheckDeductions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('IncomeDeductions') ? [] : ['className' => IncomeDeductionsTable::class];
        $this->IncomeDeductions = $this->getTableLocator()->get('IncomeDeductions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->IncomeDeductions);

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
