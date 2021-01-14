<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CreditCardsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CreditCardsTable Test Case
 */
class CreditCardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CreditCardsTable
     */
    protected $CreditCards;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CreditCards',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CreditCards') ? [] : ['className' => CreditCardsTable::class];
        $this->CreditCards = $this->getTableLocator()->get('CreditCards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CreditCards);

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
