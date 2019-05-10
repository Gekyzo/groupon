<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\CategoriesController Test Case
 */
class CategoriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Categories',
        'app.Promotions'
    ];

    public $fixtCategory = [];

    public function setUp(): void
    {
        $this->fixtCategory = [
            'id' => 1,
            'name' => 'Restaurante',
            'state' => 'active',
            'body' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'image' => 'Lorem ipsum dolor sit amet'
        ];
        parent::setUp();
    }

    public function tearDown(): void
    {
        $this->fixtCategory = [];
        parent::tearDown();
    }
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/categorias');

        $this->assertResponseOk();
    }

    /**
     * Test view method
     * @depends testAdd
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->enableCsrfToken();

        $newCategory = $this->fixtCategory;
        $this->post('/categorias/crear', $newCategory);

        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
