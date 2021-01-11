<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayCheckDeductionsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayCheckDeductionsTable Test Case
 */
class PayCheckDeductionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PayCheckDeductionsTable
     */
    protected $PayCheckDeductions;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PayCheckDeductions',
        'app.PayChecks',
        'app.IncomeDeductions',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PayCheckDeductions') ? [] : ['className' => PayCheckDeductionsTable::class];
        $this->PayCheckDeductions = $this->getTableLocator()->get('PayCheckDeductions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PayCheckDeductions);

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
