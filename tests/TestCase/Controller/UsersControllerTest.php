<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
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
     * Fixtures manuales
     */
    public $newUser;

    /**
     * Asigno valores a los fixtures manuales y cargo Fixtures Cake como TableRegistry
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->Users = TableRegistry::get('Users');

        $this->newUser = [
            'id' => '59',
            'name' => 'NewUser',
            'email' => 'user59@gmail.com',
            'password' => '$2y$10$lvBlqxyXJMGezk2GNrqK7.vdClrEqKcusx5sh1u0A/BbFIkyV0bJ.',
            'role' => 'client',
            'created' => '2019-01-01 08:59:00',
            'last_active' => NULL,
            'deleted' => NULL,
        ];
    }

    /**
     * Vacío los fixtures manuales
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->sessionAdmin);
        unset($this->newUser);
    }

    /**
     * Sólo usuarios con 'role' = 'admin' pueden acceder a este método.
     */
    public function testIndex()
    {
        // Sólo usuario admin puede ver esta ruta
        $data = [
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'name' => 'admin',
                    'role' => 'admin'
                ]
            ]
        ];
        $this->session($data);

        $this->get(['controller' => 'Users', 'action' => 'index']);
        $this->assertResponseOk('No ha sido posible acceder a /users');

        // Se carga la lista de usuarios, y existen tantos registros como en el fixture
        $users = $this->Users->find('all')->toArray();
        $this->assertEquals(2, count($users), 'El número de registros entre UsersFixture y la BD es distinto');
    }

    /**
     * Unregistered user can visit create account
     */
    public function testAdd_view_unregistered()
    {
        $this->get(['controller' => 'Users', 'action' => 'add']);

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

        $user = $this->newUser;
        $user['password1'] = $user['password'];
        $user['password2'] = $user['password'];
        unset($user['password']);

        $this->post('/users/add', $user);

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

        $user = $this->newUser;
        $user['password1'] = $user['password'];
        $user['password2'] = 'different';
        unset($user['password']);
        $this->post('/users/add', $user);

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

        // Envío datos de un cliente que existe en el fixture 'UsersFixture'
        $loggingUser['email'] = 'user2@gmail.com';
        $loggingUser['password'] = 'pass';

        $this->post('/users/login', $loggingUser);

        $this->assertFlashElement('Flash/success');
    }
}
