<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Incomes Controller
 *
 * @property \App\Model\Table\IncomesTable $Incomes
 * @method \App\Model\Entity\Income[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class IncomesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $incomes = $this->paginate($this->Incomes);

        $this->set(compact('incomes'));
    }

    /**
     * View method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $income = $this->Incomes->get($id, [
            'contain' => [
                'IncomeDeductions' => 'Categories'
            ],
        ]);
        $this->set(compact('income'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $income = $this->Incomes->newEmptyEntity();
        if ($this->request->is('post')) {
            $income = $this->Incomes->patchEntity($income, $this->request->getData());
            if ($this->Incomes->save($income)) {
                $this->Flash->success(__('The income has been saved.'));

                return $this->redirect(['action' => 'view', $income->id]);
            } else {
                $this->Flash->error(__('The income could not be saved. Please, try again.'));

            }
        }
        $this->set(compact('income'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $income = $this->Incomes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $income = $this->Incomes->patchEntity($income, $this->request->getData());
            if ($this->Incomes->save($income)) {
                $this->Flash->success(__('The income has been saved.'));
                return $this->redirect(['action' => 'view', $income->id]);
            } else {
                $this->Flash->error(__('The income could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('income'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Income id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $income = $this->Incomes->get($id);
        if ($this->Incomes->delete($income)) {
            $this->Flash->success(__('The income has been deleted.'));
        } else {
            $this->Flash->error(__('The income could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
