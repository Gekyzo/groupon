<?php
namespace App\Controller;

use App\Controller\AppController;

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
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Orders']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
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
                    if($result = $this->Users->save($user)){
                        $authUser = $this->Users->get($result->id)->toArray(); 
                        $this->Auth->setUser($authUser);  
                        $this->redirect(['controller' => 'pages', 'action' => 'index']);
                    }
                }
                $this->Flash->error(__('No ha sido posible crear el usuario. Por favor, comprueba los errores.'));
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
            $data = $this->request->getData();
            if ((strlen($data['newPass1']) > 0) && ($data['newPass1'] === $data['newPass2'])) {
                $data['password'] = $data['newPass1'];
                $user = $this->Users->patchEntity($user, $data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('La información ha sido actualizada.'));

                    return $this->redirect(['controller' => 'pages', 'action' => 'index']);
                }
                $this->Flash->error(__('No ha sido posible actualizar la información. Por favor, comprueba los errores.'));
            } else {
                $this->Flash->error(__('Las contraseñas no coinciden'));
            }
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
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    /**
     * Initialize method
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
        return $this->redirect(['action' => 'index']);
    }
}
