<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayCheckDeductions Controller
 *
 * @property \App\Model\Table\PayCheckDeductionsTable $PayCheckDeductions
 * @method \App\Model\Entity\PayCheckDeduction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayCheckDeductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PayChecks', 'IncomeDeductions'],
        ];
        $payCheckDeductions = $this->paginate($this->PayCheckDeductions);

        $this->set(compact('payCheckDeductions'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Check Deduction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payCheckDeduction = $this->PayCheckDeductions->get($id, [
            'contain' => ['PayChecks', 'IncomeDeductions'],
        ]);

        $this->set(compact('payCheckDeduction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payCheckDeduction = $this->PayCheckDeductions->newEmptyEntity();
        if ($this->request->is('post')) {
            $payCheckDeduction = $this->PayCheckDeductions->patchEntity($payCheckDeduction, $this->request->getData());
            if ($this->PayCheckDeductions->save($payCheckDeduction)) {
                $this->Flash->success(__('The pay check deduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check deduction could not be saved. Please, try again.'));
        }
        $payChecks = $this->PayCheckDeductions->PayChecks->find('list', ['limit' => 200]);
        $incomeDeductions = $this->PayCheckDeductions->IncomeDeductions->find('list', ['limit' => 200]);
        $this->set(compact('payCheckDeduction', 'payChecks', 'incomeDeductions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Check Deduction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payCheckDeduction = $this->PayCheckDeductions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payCheckDeduction = $this->PayCheckDeductions->patchEntity($payCheckDeduction, $this->request->getData());
            if ($this->PayCheckDeductions->save($payCheckDeduction)) {
                $this->Flash->success(__('The pay check deduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check deduction could not be saved. Please, try again.'));
        }
        $payChecks = $this->PayCheckDeductions->PayChecks->find('list', ['limit' => 200]);
        $incomeDeductions = $this->PayCheckDeductions->IncomeDeductions->find('list', ['limit' => 200]);
        $this->set(compact('payCheckDeduction', 'payChecks', 'incomeDeductions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Check Deduction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payCheckDeduction = $this->PayCheckDeductions->get($id);
        if ($this->PayCheckDeductions->delete($payCheckDeduction)) {
            $this->Flash->success(__('The pay check deduction has been deleted.'));
        } else {
            $this->Flash->error(__('The pay check deduction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
