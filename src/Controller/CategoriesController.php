<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Utility\Text;
use App\Controller\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 *
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $categories = $this->paginate($this->Categories);

        $this->set(compact('categories'));
    }

    /**
     * View method
     *
     * @param string|null $name Category name.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($name)
    {
        $category = $this->Categories->find('all', [
            'conditions' => [
                'LOWER(Categories.name) LIKE' => $name,
            ],
            'contain' => ['Promotions' => ['Images']]
        ])->first();

        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Categories->newEntity();
        if ($this->request->is('post')) {

            /* Recojo los datos */
            $this->loadComponent('Images');
            $data = $this->request->getData();

            /* Cambio el nombre de la imagen para que sea el mismo que el de la categoría */
            $fileExtension = substr($data['image']['type'], (strpos($data['image']['type'], '/') + 1));
            $data['image']['name'] = strtolower(Text::slug($data['name'])) . '.' . $fileExtension;
            $files = [];
            array_push($files, $data['image']);

            /* Guardo la imagen de la categoría */
            $this->Images->mainUpload('Category', $files);

            /* Almaceno la entidad en la BD */
            $data['image'] = 'categories/' . $data['image']['name'];
            $category = $this->Categories->patchEntity($category, $data);
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('La categoría ha sido creada correctamente.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No ha sido posible crear la categoría.'));
        }
        $promotions = $this->Categories->Promotions->find('list', ['order' => ['Promotions.name' => 'ASC'], 'limit' => 200]);
        $this->set(compact('category', 'promotions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Categories->get($id, [
            'contain' => ['Promotions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Categories->patchEntity($category, $this->request->getData());
            if ($this->Categories->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $promotions = $this->Categories->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('category', 'promotions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
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
        return parent::isAuthorized($user);
    }
}
