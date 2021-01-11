<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * BudgetItems Controller
 *
 * @property \App\Model\Table\BudgetItemsTable $BudgetItems
 * @method \App\Model\Entity\BudgetItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BudgetItemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Budgets'],
        ];
        $budgetItems = $this->paginate($this->BudgetItems);

        $this->set(compact('budgetItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Budget Item id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $budgetItem = $this->BudgetItems->get($id, [
            'contain' => ['Categories', 'Budgets', 'PayCheckBudgets'],
        ]);

        $this->set(compact('budgetItem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $budgetItem = $this->BudgetItems->newEmptyEntity();
        if ($this->request->is('post')) {
            $budgetItem = $this->BudgetItems->patchEntity($budgetItem, $this->request->getData());
            if ($this->BudgetItems->save($budgetItem)) {
                $this->Flash->success(__('The budget item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The budget item could not be saved. Please, try again.'));
        }
        $categories = $this->BudgetItems->Categories->find('list', ['limit' => 200]);
        $budgets = $this->BudgetItems->Budgets->find('list', ['limit' => 200]);
        $this->set(compact('budgetItem', 'categories', 'budgets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Budget Item id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $budgetItem = $this->BudgetItems->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $budgetItem = $this->BudgetItems->patchEntity($budgetItem, $this->request->getData());
            if ($this->BudgetItems->save($budgetItem)) {
                $this->Flash->success(__('The budget item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The budget item could not be saved. Please, try again.'));
        }
        $categories = $this->BudgetItems->Categories->find('list', ['limit' => 200]);
        $budgets = $this->BudgetItems->Budgets->find('list', ['limit' => 200]);
        $this->set(compact('budgetItem', 'categories', 'budgets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Budget Item id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $budgetItem = $this->BudgetItems->get($id);
        if ($this->BudgetItems->delete($budgetItem)) {
            $this->Flash->success(__('The budget item has been deleted.'));
        } else {
            $this->Flash->error(__('The budget item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
