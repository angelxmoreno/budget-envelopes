<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncomesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncomesTable Test Case
 */
class IncomesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncomesTable
     */
    protected $Incomes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Incomes',
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
        $config = $this->getTableLocator()->exists('Incomes') ? [] : ['className' => IncomesTable::class];
        $this->Incomes = $this->getTableLocator()->get('Incomes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Incomes);

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
