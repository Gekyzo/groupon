<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users, ['order' => ['Users.id' => 'DESC']]);

        $this->set(compact('users'));
    }

    /**
     * Muestra la información del usuario que recoja como parámetro por URL.
     * Acción restringida para rol 'admin'
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        /**
         * Incluyo en la query la 'información de la promoción asociada' a cada pedido para
         * poder mostrar en la vista el 'nombre de la promoción' en lugar de la 'ID'.
         */
        $user = $this->Users->get($id, [
            'contain' => [
                'Orders' => [
                    'Promotions',
                    'sort' => ['Orders.id' => 'DESC']
                ]
            ]
        ]);

        $this->set(compact(['user']));
    }

    /**
     * Muestra la información de perfil para el usuario conectado.     
     */
    public function profile()
    {
        /**
         * Incluyo en la query la 'información de la promoción asociada' a cada pedido para
         * poder mostrar en la vista el 'nombre de la promoción' en lugar de la 'ID'.
         */
        $profileUserID = $this->viewVars['currentUser']['id'];
        $user = $this->Users->get($profileUserID, [
            'contain' => [
                'Orders' => [
                    'Promotions',
                    'sort' => ['Orders.id' => 'DESC']
                ]
            ]
        ]);

        $this->set(compact(['user']));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        /**
         * Si el usuario ya está logeado, no le permite crear otra cuenta
         */
        if ($this->Auth->user()) {
            $this->redirect(['controller' => 'users', 'action' => 'view', $this->Auth->user('id')]);
        }

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ((strlen($data['password1']) > 0) && ($data['password1'] === $data['password2'])) {
                $data['password'] = $data['password1'];
                $data['role'] = 'client';
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Tu cuenta ha sido creada.'));
                    /**
                     * Login after register y redirect a Home
                     */
                    if ($result = $this->Users->save($user)) {
                        $authUser = $this->Users->get($result->id)->toArray();
                        $this->Auth->setUser($authUser);
                        $this->redirect(['controller' => 'pages', 'action' => 'index']);
                    }
                } else {
                    $this->Flash->error(__('No ha sido posible crear el usuario. Por favor, comprueba los errores.'));
                }
            } else {
                $this->Flash->error(__('Las contraseñas no coinciden'));
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        $user['state'] = 'deleted';
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                /**
                 * Comprobamos Auth y logueamos
                 */
                $this->Auth->setUser($user);
                /**
                 * Actualizamos BD con timestamp en last-active
                 */
                $usersTable = TableRegistry::get('Users');
                $logingUser = $usersTable->get($user['id']);
                $logingUser->last_active = Time::now();
                $usersTable->save($logingUser);
                /**
                 * Redirect a Home y mostramos mensaje bienvenida
                 */
                $this->Flash->success(__('Bienvenido ') . $user['name']);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    /**
     * Defino permisos para cualquier visitante.
     * Incluye los UNLOGGED.
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
    }

    /**
     * Logout method
     */
    public function logout()
    {
        $this->Flash->success('Has salido de tu cuenta.');
        $this->Auth->logout();
        return $this->redirect(['controller' => 'pages', 'action' => 'index']);
    }

    /**
     * Defino permisos para visitantes CON SESIÓN INICIADA.
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['login', 'logout', 'edit', 'profile'])) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
