<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
        'app.Orders'
    ];

    /**
     * Creo Fixture manual de sesión iniciada como Admin
     */
    public $fixtAdminSession;
    public $fixtUser;

    /**
     * Asigno valores a los fixtures manuales
     */
    public function setUp(): void
    {
        parent::setUp();
        /**
         * Asigno valor de sesión iniciada como Admin
         */
        $this->fixtAdminSession = [
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'name' => 'admin',
                    'role' => 'admin'
                ]
            ]
        ];

        /**
         * Asigno valor de nuevo usuario
         */
        $this->fixtUser = [
            'name' => 'username',
            'email' => 'email@gmail.com',
            'password1' => 'pass',
            'password2' => 'pass'
        ];
    }

    /**
     * Vacío las fixtures
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->fixtAdminSession);
        unset($this->fixtUser);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->session($this->fixtAdminSession);

        $this->get('/users');

        $this->assertResponseOk();
    }

    /**
     * Unregistered user can visit create account
     * 
     * @return void
     */
    public function testAdd_view_unregistered()
    {
        $this->get('/users/add');

        $this->assertResponseOk();
    }

    /**
     * Unregistered user can create account with correct data     
     * @depends testAdd_view_unregistered
     */
    public function testAdd_correct_user_data()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $user = $this->fixtUser;
        $this->post('/users/add', $user);

        $this->assertResponseSuccess();
        $this->assertFlashElement('Flash/success');
    }

    /**
     * Unregistered user gets error when passwords dont match     
     * @depends testAdd_view_unregistered
     */
    public function testAdd_incorrect_user_data()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $user = $this->fixtUser;
        $user['password2'] = 'different';
        $this->post('/users/add', $user);

        $this->assertResponseSuccess();
        $this->assertFlashElement('Flash/error');
    }

    /**
     * Unregistered user can visit login
     */
    public function testLogin_view()
    {
        $this->get('/users/login');

        $this->assertResponseSuccess();
    }

    /**
     * Unregistered user can login
     * @depends testLogin_view
     */
    public function testLogin_user()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $user = $this->fixtUser;
        $this->post('/users/login', $user);

        $this->assertResponseSuccess();
    }
}
