<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * IncomeDeductions Controller
 *
 * @property \App\Model\Table\IncomeDeductionsTable $IncomeDeductions
 * @method \App\Model\Entity\IncomeDeduction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomeDeductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Incomes', 'Categories'],
        ];
        $incomeDeductions = $this->paginate($this->IncomeDeductions);

        $this->set(compact('incomeDeductions'));
    }

    /**
     * View method
     *
     * @param string|null $id Income Deduction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $incomeDeduction = $this->IncomeDeductions->get($id, [
            'contain' => ['Incomes', 'Categories', 'PayCheckDeductions'],
        ]);

        $this->set(compact('incomeDeduction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($income_id = null)
    {
        $incomeDeduction = $this->IncomeDeductions->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($income_id) {
                $data['income_id'] = $income_id;
            }
            $incomeDeduction = $this->IncomeDeductions->patchEntity($incomeDeduction, $data);
            if ($this->IncomeDeductions->save($incomeDeduction)) {
                $this->Flash->success(__('The income deduction has been saved.'));

                return $this->redirect(['controller' => 'Incomes', 'action' => 'view', $incomeDeduction->income_id]);
            } else {
                $this->Flash->error(__('The income deduction could not be saved. Please, try again.'));
            }
        }
        $incomes = $this->IncomeDeductions->Incomes->find('list', ['limit' => 200]);
        $categories = $this->IncomeDeductions->Categories->find('list', ['limit' => 200]);
        $this->set(compact('incomeDeduction', 'incomes', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Income Deduction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $incomeDeduction = $this->IncomeDeductions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $incomeDeduction = $this->IncomeDeductions->patchEntity($incomeDeduction, $this->request->getData());
            if ($this->IncomeDeductions->save($incomeDeduction)) {
                $this->Flash->success(__('The income deduction has been saved.'));

                return $this->redirect(['controller' => 'Incomes', 'action' => 'view', $incomeDeduction->income_id]);
            } else {
                $this->Flash->error(__('The income deduction could not be saved. Please, try again.'));
            }
        }
        $categories = $this->IncomeDeductions->Categories->find('list', ['limit' => 200]);
        $this->set(compact('incomeDeduction', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Income Deduction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $incomeDeduction = $this->IncomeDeductions->get($id);
        if ($this->IncomeDeductions->delete($incomeDeduction)) {
            $this->Flash->success(__('The income deduction has been deleted.'));
        } else {
            $this->Flash->error(__('The income deduction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
