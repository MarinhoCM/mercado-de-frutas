<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * SalesItems Controller
 *
 * @property \App\Model\Table\SalesItemsTable $SalesItems
 */
class SalesItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->SalesItems->find()
            ->contain(['Sales', 'Fruits']);
        $salesItems = $this->paginate($query);

        $this->set(compact('salesItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Sales Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $salesItem = $this->SalesItems->get($id, contain: ['Sales', 'Fruits']);
        $this->set(compact('salesItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $salesItem = $this->SalesItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $salesItem = $this->SalesItems->patchEntity($salesItem, $this->request->getData());
            if ($this->SalesItems->save($salesItem)) {
                $this->Flash->success(__('The sales item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales item could not be saved. Please, try again.'));
        }
        $sales = $this->SalesItems->Sales->find('list', limit: 200)->all();
        $fruits = $this->SalesItems->Fruits->find('list', limit: 200)->all();
        $this->set(compact('salesItem', 'sales', 'fruits'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sales Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $salesItem = $this->SalesItems->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $salesItem = $this->SalesItems->patchEntity($salesItem, $this->request->getData());
            if ($this->SalesItems->save($salesItem)) {
                $this->Flash->success(__('The sales item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sales item could not be saved. Please, try again.'));
        }
        $sales = $this->SalesItems->Sales->find('list', limit: 200)->all();
        $fruits = $this->SalesItems->Fruits->find('list', limit: 200)->all();
        $this->set(compact('salesItem', 'sales', 'fruits'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sales Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $salesItem = $this->SalesItems->get($id);
        if ($this->SalesItems->delete($salesItem)) {
            $this->Flash->success(__('The sales item has been deleted.'));
        } else {
            $this->Flash->error(__('The sales item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
