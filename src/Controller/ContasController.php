<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Contas Controller
 *
 * @property \App\Model\Table\ContasTable $Contas
 */
class ContasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Jogos']
        ];
        $this->set('contas', $this->paginate($this->Contas));
        $this->set('_serialize', ['contas']);
    }

    /**
     * View method
     *
     * @param string|null $id Conta id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => ['Jogos', 'Senhas']
        ]);
        $this->set('conta', $conta);
        $this->set('_serialize', ['conta']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $conta = $this->Contas->newEntity();
        if ($this->request->is('post')) {
            $conta = $this->Contas->patchEntity($conta, $this->request->data);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The conta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The conta could not be saved. Please, try again.'));
            }
        }
        $jogos = $this->Contas->Jogos->find('list', ['limit' => 200]);
        $this->set(compact('conta', 'jogos'));
        $this->set('_serialize', ['conta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Conta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $conta = $this->Contas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $conta = $this->Contas->patchEntity($conta, $this->request->data);
            if ($this->Contas->save($conta)) {
                $this->Flash->success(__('The conta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The conta could not be saved. Please, try again.'));
            }
        }
        $jogos = $this->Contas->Jogos->find('list', ['limit' => 200]);
        $this->set(compact('conta', 'jogos'));
        $this->set('_serialize', ['conta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Conta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $conta = $this->Contas->get($id);
        if ($this->Contas->delete($conta)) {
            $this->Flash->success(__('The conta has been deleted.'));
        } else {
            $this->Flash->error(__('The conta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
