<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;

/**
 * Promotions Controller
 *
 * @property \App\Model\Table\PromotionsTable $Promotions
 *
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PromotionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $promotions = $this->paginate($this->Promotions, ['contain' => ['Images']]);

        $this->set(compact('promotions'));
    }

    /**
     * View method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['Categories', 'Images', 'Orders']
        ]);

        $this->set('promotion', $promotion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $promotion = $this->Promotions->newEntity();
        if ($this->request->is('post')) {
            /**
             * Intentamos subir las imágenes de la promoción
             */
            $this->loadComponent('Images');
            $data = $this->request->getData();
            $files = $data['images'];
            $this->Images->mainUpload('Promotion', $files);
            /**
             * Fix datetime-local format
             */
            $data['available_since'] = parent::convertDatetime($data['available_since']);
            $data['available_until'] = parent::convertDatetime($data['available_until']);
            /**
             * Asigno valor al atributo 'path' de las imágenes para que las pueda guardar en la BD.
             * Paso la variable '$imagen' por referencia con el prefijo '&'
             */
            foreach ($data['images'] as &$imagen) {
                $imagen['path'] = '\\' . Configure::read('Fol.images') . 'promotions\\' . $imagen['name'];
            }
            $promotion = $this->Promotions->patchEntity($promotion, $data);
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $categories = $this->Promotions->Categories->find('list', ['limit' => 200]);
        $images = $this->Promotions->Images->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'categories', 'images'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $promotion = $this->Promotions->get($id, [
            'contain' => ['Categories', 'Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $promotion = $this->Promotions->patchEntity($promotion, $this->request->getData());
            if ($this->Promotions->save($promotion)) {
                $this->Flash->success(__('The promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The promotion could not be saved. Please, try again.'));
        }
        $categories = $this->Promotions->Categories->find('list', ['limit' => 200]);
        $images = $this->Promotions->Images->find('list', ['limit' => 200]);
        $this->set(compact('promotion', 'categories', 'images'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Promotion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $promotion = $this->Promotions->get($id);
        if ($this->Promotions->delete($promotion)) {
            $this->Flash->success(__('The promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Defino permisos para cualquier visitante.
     * Incluye los UNLOGGED.
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['index', 'view']);
    }

    /**
     * Defino permisos para visitantes CON SESIÓN INICIADA.
     */
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['addToCart'])) {
            return true;
        }

        return parent::isAuthorized($user);
    }
}
