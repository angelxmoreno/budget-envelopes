<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoansTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoansTable Test Case
 */
class LoansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LoansTable
     */
    protected $Loans;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Loans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Loans') ? [] : ['className' => LoansTable::class];
        $this->Loans = $this->getTableLocator()->get('Loans', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Loans);

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
