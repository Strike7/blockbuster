<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disponiveis Controller
 *
 * @property \App\Model\Table\DisponiveisTable $Disponiveis
 */
class DisponiveisController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('disponiveis', $this->paginate($this->Disponiveis));
        $this->set('_serialize', ['disponiveis']);
    }

    /**
     * View method
     *
     * @param string|null $id Disponivei id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disponivei = $this->Disponiveis->get($id, [
            'contain' => []
        ]);
        $this->set('disponivei', $disponivei);
        $this->set('_serialize', ['disponivei']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disponivei = $this->Disponiveis->newEntity();
        if ($this->request->is('post')) {
            $disponivei = $this->Disponiveis->patchEntity($disponivei, $this->request->data);
            if ($this->Disponiveis->save($disponivei)) {
                $this->Flash->success(__('The disponivei has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disponivei could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disponivei'));
        $this->set('_serialize', ['disponivei']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Disponivei id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disponivei = $this->Disponiveis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disponivei = $this->Disponiveis->patchEntity($disponivei, $this->request->data);
            if ($this->Disponiveis->save($disponivei)) {
                $this->Flash->success(__('The disponivei has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disponivei could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disponivei'));
        $this->set('_serialize', ['disponivei']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Disponivei id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disponivei = $this->Disponiveis->get($id);
        if ($this->Disponiveis->delete($disponivei)) {
            $this->Flash->success(__('The disponivei has been deleted.'));
        } else {
            $this->Flash->error(__('The disponivei could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
