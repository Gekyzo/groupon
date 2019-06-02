<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

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
        'app.Users'
    ];

    /**
     * Fixtures manuales
     */
    public $newUser;
    public $Controller;

    /**
     * Asigno valores a los fixtures manuales y cargo Fixtures Cake como TableRegistry
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->Controller = new UsersController();
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
     * Método de limpieza
     * Vacío los fixtures manuales
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->Controller);
        unset($this->newUser);
        TableRegistry::clear();
    }

    /**
     * Usuario no registrado puede acceder a '/users/add'
     */
    public function test_Unregistered_user_can_access_add()
    {
        $this->get(['controller' => 'Users', 'action' => 'add']);

        $this->assertResponseOk();
        $this->assertNoRedirect();
    }

    /**
     * Usuario no registrado puede acceder a '/users/login'
     */
    public function test_Unregistered_user_can_access_login()
    {
        $this->get(['controller' => 'Users', 'action' => 'login']);

        $this->assertResponseOk();
        $this->assertNoRedirect();
    }


    /**
     * Usuario no registrado puede hacer login
     * @depends test_Unregistered_user_can_access_login
     */
    public function test_User_can_login()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        // Envío datos de un cliente que existe en el fixture 'UsersFixture'
        $loggingUser['email'] = 'user2@gmail.com';
        $loggingUser['password'] = 'pass';

        $this->post(['controller' => 'Users', 'action' => 'login'], $loggingUser);

        $this->assertFlashElement('Flash/success');
    }

    /**
     * Usuario no registrado puede crear nueva cuenta
     * @depends test_Unregistered_user_can_access_add
     */
    public function test_User_add_new_account_correct_password()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $user = $this->newUser;
        $user['password1'] = $user['password'];
        $user['password2'] = $user['password'];
        unset($user['password']);

        $this->post(['controller' => 'Users', 'action' => 'add'], $user);

        $this->assertFlashElement('Flash/success');
    }

    /**
     * Usuario no registrado recibe error cuando intenta registrarse con datos incorrectos
     * @depends test_Unregistered_user_can_access_add
     */
    public function test_User_add_new_account_wrong_password()
    {
        $this->enableCsrfToken();
        $this->enableRetainFlashMessages();

        $user = $this->newUser;
        $user['password1'] = $user['password'];
        $user['password2'] = 'different';
        unset($user['password']);

        $this->post(['controller' => 'Users', 'action' => 'add'], $user);

        $this->assertFlashElement('Flash/error');
    }

    /**
     * Sólo usuarios con 'role' = 'admin' puede visitar '/users/'
     */
    public function test_Only_admin_can_access_index()
    {
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
        $this->assertNoRedirect();
    }

    /**
     * Users::index devuelve tantos registros como usuarios existen en la BD
     */
    public function test_Index_returns_all_database_records()
    {
        // Se carga la lista de usuarios, y existen tantos registros como en el fixture
        $users = $this->Users->find('all')->toArray();
        debug($users);

        $this->assertEquals(2, count($users), 'El número de registros entre UsersFixture y la BD es distinto');
    }

    /**
     * Permisos para usuarios NO LOGUEADOS
     */
    public function test_Initialize_allowed_actions()
    {
        $allowedActions = ['logout', 'add'];

        $this->assertEquals($allowedActions, $this->Controller->Auth->allowedActions);
    }
}
