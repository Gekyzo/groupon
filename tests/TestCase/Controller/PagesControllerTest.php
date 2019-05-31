<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PagesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\PagesController Test Case
 */
class PagesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures manuales
     */
    public $Page;

    /**
     * Asigno valores a los fixtures manuales
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->Page = new PagesController;
    }

    /**
     * Método de limpieza
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->Page);
    }

    /**
     * Carga la page 'home' (su ruta es: '/')
     *
     * @return void
     */
    public function test_Display_muestra_homepage()
    {
        $this->get(['controller' => 'Pages', 'action' => 'display', '/']);

        $this->assertResponseSuccess('No ha sido posible cargar la Home');
    }

    /**
     * El método 'display' está siempre permitido
     *
     * @return void
     */
    public function test_Initialize_allowed_actions()
    {
        $allowedActions = $this->Page->Auth->allowedActions;

        $this->assertContains('display', $allowedActions, 'Display no aparece entre los métodos permitidos');
    }

    /**
     * Test tempOptions method
     *
     * @return void
     */
    public function test_TempOptions_returns_expected_array()
    {
        $firstArr = [
            'key' => ['firstVal' => 1]
        ];
        $secondArr = [
            'key' => ['secondVal' => 2]
        ];
        $expected = [
            'key' => [
                'firstVal' => 1,
                'secondVal' => 2
            ]
        ];

        $res = $this->Page->tempOptions($firstArr, $secondArr);

        $this->assertEquals($expected, $res);
    }
}
