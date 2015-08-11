<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Alugueis Controller
 *
 * @property \App\Model\Table\AlugueisTable $Alugueis
 */
class AlugueisController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('alugueis', $this->paginate($this->Alugueis));
        $this->set('_serialize', ['alugueis']);
    }

    /**
     * View method
     *
     * @param string|null $id Aluguel id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aluguel = $this->Alugueis->get($id, [
            'contain' => []
        ]);
        $this->set('aluguel', $aluguel);
        $this->set('_serialize', ['aluguel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aluguel = $this->Alugueis->newEntity();
        if ($this->request->is('post')) {
            $aluguel = $this->Alugueis->patchEntity($aluguel, $this->request->data);
            if ($this->Alugueis->save($aluguel)) {
                $this->Flash->success(__('The aluguel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The aluguel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('aluguel'));
        $this->set('_serialize', ['aluguel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Aluguel id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aluguel = $this->Alugueis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aluguel = $this->Alugueis->patchEntity($aluguel, $this->request->data);
            if ($this->Alugueis->save($aluguel)) {
                $this->Flash->success(__('The aluguel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The aluguel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('aluguel'));
        $this->set('_serialize', ['aluguel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Aluguel id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aluguel = $this->Alugueis->get($id);
        if ($this->Alugueis->delete($aluguel)) {
            $this->Flash->success(__('The aluguel has been deleted.'));
        } else {
            $this->Flash->error(__('The aluguel could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
