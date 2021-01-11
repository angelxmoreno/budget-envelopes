<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PayChecks Controller
 *
 * @property \App\Model\Table\PayChecksTable $PayChecks
 * @method \App\Model\Entity\PayCheck[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PayChecksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $payChecks = $this->paginate($this->PayChecks);

        $this->set(compact('payChecks'));
    }

    /**
     * View method
     *
     * @param string|null $id Pay Check id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $payCheck = $this->PayChecks->get($id, [
            'contain' => ['PayCheckBudgets', 'PayCheckDeductions'],
        ]);

        $this->set(compact('payCheck'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $payCheck = $this->PayChecks->newEmptyEntity();
        if ($this->request->is('post')) {
            $payCheck = $this->PayChecks->patchEntity($payCheck, $this->request->getData());
            if ($this->PayChecks->save($payCheck)) {
                $this->Flash->success(__('The pay check has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check could not be saved. Please, try again.'));
        }
        $this->set(compact('payCheck'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pay Check id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $payCheck = $this->PayChecks->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $payCheck = $this->PayChecks->patchEntity($payCheck, $this->request->getData());
            if ($this->PayChecks->save($payCheck)) {
                $this->Flash->success(__('The pay check has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pay check could not be saved. Please, try again.'));
        }
        $this->set(compact('payCheck'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pay Check id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $payCheck = $this->PayChecks->get($id);
        if ($this->PayChecks->delete($payCheck)) {
            $this->Flash->success(__('The pay check has been deleted.'));
        } else {
            $this->Flash->error(__('The pay check could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
