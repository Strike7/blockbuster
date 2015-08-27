<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disponibilidades Controller
 *
 * @property \App\Model\Table\DisponibilidadesTable $Disponibilidades
 */
class DisponibilidadesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('disponibilidades', $this->paginate($this->Disponibilidades));
        $this->set('_serialize', ['disponibilidades']);
    }

    /**
     * View method
     *
     * @param string|null $id Disponibilidade id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disponibilidade = $this->Disponibilidades->get($id, [
            'contain' => []
        ]);
        $this->set('disponibilidade', $disponibilidade);
        $this->set('_serialize', ['disponibilidade']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $disponibilidade = $this->Disponibilidades->newEntity();
        if ($this->request->is('post')) {
            $disponibilidade = $this->Disponibilidades->patchEntity($disponibilidade, $this->request->data);
            if ($this->Disponibilidades->save($disponibilidade)) {
                $this->Flash->success(__('The disponibilidade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disponibilidade could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disponibilidade'));
        $this->set('_serialize', ['disponibilidade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Disponibilidade id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disponibilidade = $this->Disponibilidades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disponibilidade = $this->Disponibilidades->patchEntity($disponibilidade, $this->request->data);
            if ($this->Disponibilidades->save($disponibilidade)) {
                $this->Flash->success(__('The disponibilidade has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The disponibilidade could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('disponibilidade'));
        $this->set('_serialize', ['disponibilidade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Disponibilidade id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disponibilidade = $this->Disponibilidades->get($id);
        if ($this->Disponibilidades->delete($disponibilidade)) {
            $this->Flash->success(__('The disponibilidade has been deleted.'));
        } else {
            $this->Flash->error(__('The disponibilidade could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
