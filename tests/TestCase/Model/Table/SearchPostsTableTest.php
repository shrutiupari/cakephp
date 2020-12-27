<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SearchPostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SearchPostsTable Test Case
 */
class SearchPostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SearchPostsTable
     */
    protected $SearchPosts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SearchPosts',
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
        $config = $this->getTableLocator()->exists('SearchPosts') ? [] : ['className' => SearchPostsTable::class];
        $this->SearchPosts = $this->getTableLocator()->get('SearchPosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SearchPosts);

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
