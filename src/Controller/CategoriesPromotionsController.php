<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CategoriesPromotions Controller
 *
 * @property \App\Model\Table\CategoriesPromotionsTable $CategoriesPromotions
 *
 * @method \App\Model\Entity\CategoriesPromotion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoriesPromotionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Promotions']
        ];
        $categoriesPromotions = $this->paginate($this->CategoriesPromotions);

        $this->set(compact('categoriesPromotions'));
    }

    /**
     * View method
     *
     * @param string|null $id Categories Promotion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoriesPromotion = $this->CategoriesPromotions->get($id, [
            'contain' => ['Categories', 'Promotions']
        ]);

        $this->set('categoriesPromotion', $categoriesPromotion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoriesPromotion = $this->CategoriesPromotions->newEntity();
        if ($this->request->is('post')) {
            $categoriesPromotion = $this->CategoriesPromotions->patchEntity($categoriesPromotion, $this->request->getData());
            if ($this->CategoriesPromotions->save($categoriesPromotion)) {
                $this->Flash->success(__('The categories promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categories promotion could not be saved. Please, try again.'));
        }
        $categories = $this->CategoriesPromotions->Categories->find('list', ['limit' => 200]);
        $promotions = $this->CategoriesPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('categoriesPromotion', 'categories', 'promotions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Categories Promotion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoriesPromotion = $this->CategoriesPromotions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoriesPromotion = $this->CategoriesPromotions->patchEntity($categoriesPromotion, $this->request->getData());
            if ($this->CategoriesPromotions->save($categoriesPromotion)) {
                $this->Flash->success(__('The categories promotion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The categories promotion could not be saved. Please, try again.'));
        }
        $categories = $this->CategoriesPromotions->Categories->find('list', ['limit' => 200]);
        $promotions = $this->CategoriesPromotions->Promotions->find('list', ['limit' => 200]);
        $this->set(compact('categoriesPromotion', 'categories', 'promotions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Categories Promotion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoriesPromotion = $this->CategoriesPromotions->get($id);
        if ($this->CategoriesPromotions->delete($categoriesPromotion)) {
            $this->Flash->success(__('The categories promotion has been deleted.'));
        } else {
            $this->Flash->error(__('The categories promotion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
