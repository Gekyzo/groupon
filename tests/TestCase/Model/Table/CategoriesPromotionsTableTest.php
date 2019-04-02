<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesPromotionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriesPromotionsTable Test Case
 */
class CategoriesPromotionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesPromotionsTable
     */
    public $CategoriesPromotions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CategoriesPromotions',
        'app.Categories',
        'app.Promotions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CategoriesPromotions') ? [] : ['className' => CategoriesPromotionsTable::class];
        $this->CategoriesPromotions = TableRegistry::getTableLocator()->get('CategoriesPromotions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriesPromotions);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
