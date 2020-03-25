<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PgdetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PgdetailsTable Test Case
 */
class PgdetailsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PgdetailsTable
     */
    protected $Pgdetails;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pgdetails',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Pgdetails') ? [] : ['className' => PgdetailsTable::class];
        $this->Pgdetails = TableRegistry::getTableLocator()->get('Pgdetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pgdetails);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
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
