<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayChecksTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayChecksTable Test Case
 */
class PayChecksTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PayChecksTable
     */
    protected $PayChecks;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.PayChecks',
        'app.PayCheckBudgets',
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
        $config = $this->getTableLocator()->exists('PayChecks') ? [] : ['className' => PayChecksTable::class];
        $this->PayChecks = $this->getTableLocator()->get('PayChecks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->PayChecks);

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
