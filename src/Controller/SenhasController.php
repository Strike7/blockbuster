<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Senhas Controller
 *
 * @property \App\Model\Table\SenhasTable $Senhas
 */
class SenhasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Contas', 'Usuarios']
        ];
        $this->set('senhas', $this->paginate($this->Senhas));
        $this->set('_serialize', ['senhas']);
    }

    /**
     * View method
     *
     * @param string|null $id Senha id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $senha = $this->Senhas->get($id, [
            'contain' => ['Contas', 'Usuarios']
        ]);
        $this->set('senha', $senha);
        $this->set('_serialize', ['senha']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $senha = $this->Senhas->newEntity();
        if ($this->request->is('post')) {
            $senha = $this->Senhas->patchEntity($senha, $this->request->data);
            if ($this->Senhas->save($senha)) {
                $this->Flash->success(__('The senha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The senha could not be saved. Please, try again.'));
            }
        }
        $contas = $this->Senhas->Contas->find('list', ['limit' => 200]);
        $usuarios = $this->Senhas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('senha', 'contas', 'usuarios'));
        $this->set('_serialize', ['senha']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Senha id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $senha = $this->Senhas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $senha = $this->Senhas->patchEntity($senha, $this->request->data);
            if ($this->Senhas->save($senha)) {
                $this->Flash->success(__('The senha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The senha could not be saved. Please, try again.'));
            }
        }
        $contas = $this->Senhas->Contas->find('list', ['limit' => 200]);
        $usuarios = $this->Senhas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('senha', 'contas', 'usuarios'));
        $this->set('_serialize', ['senha']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Senha id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $senha = $this->Senhas->get($id);
        if ($this->Senhas->delete($senha)) {
            $this->Flash->success(__('The senha has been deleted.'));
        } else {
            $this->Flash->error(__('The senha could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
