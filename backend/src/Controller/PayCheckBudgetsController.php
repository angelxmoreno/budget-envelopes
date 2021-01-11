<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayCheckBudgets Controller
 *
 * @property \App\Model\Table\PayCheckBudgetsTable $PayCheckBudgets
 * @method \App\Model\Entity\PayCheckBudget[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayCheckBudgetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PayChecks', 'BudgetItems'],
        ];
        $payCheckBudgets = $this->paginate($this->PayCheckBudgets);

        $this->set(compact('payCheckBudgets'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Check Budget id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payCheckBudget = $this->PayCheckBudgets->get($id, [
            'contain' => ['PayChecks', 'BudgetItems'],
        ]);

        $this->set(compact('payCheckBudget'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payCheckBudget = $this->PayCheckBudgets->newEmptyEntity();
        if ($this->request->is('post')) {
            $payCheckBudget = $this->PayCheckBudgets->patchEntity($payCheckBudget, $this->request->getData());
            if ($this->PayCheckBudgets->save($payCheckBudget)) {
                $this->Flash->success(__('The pay check budget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check budget could not be saved. Please, try again.'));
        }
        $payChecks = $this->PayCheckBudgets->PayChecks->find('list', ['limit' => 200]);
        $budgetItems = $this->PayCheckBudgets->BudgetItems->find('list', ['limit' => 200]);
        $this->set(compact('payCheckBudget', 'payChecks', 'budgetItems'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Check Budget id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payCheckBudget = $this->PayCheckBudgets->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payCheckBudget = $this->PayCheckBudgets->patchEntity($payCheckBudget, $this->request->getData());
            if ($this->PayCheckBudgets->save($payCheckBudget)) {
                $this->Flash->success(__('The pay check budget has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check budget could not be saved. Please, try again.'));
        }
        $payChecks = $this->PayCheckBudgets->PayChecks->find('list', ['limit' => 200]);
        $budgetItems = $this->PayCheckBudgets->BudgetItems->find('list', ['limit' => 200]);
        $this->set(compact('payCheckBudget', 'payChecks', 'budgetItems'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Check Budget id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payCheckBudget = $this->PayCheckBudgets->get($id);
        if ($this->PayCheckBudgets->delete($payCheckBudget)) {
            $this->Flash->success(__('The pay check budget has been deleted.'));
        } else {
            $this->Flash->error(__('The pay check budget could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
