<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Jogos Controller
 *
 * @property \App\Model\Table\JogosTable $Jogos
 */
class JogosController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('index');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('jogos', $this->paginate($this->Jogos));
        $this->set('_serialize', ['jogos']);
    }

    /**
     * View method
     *
     * @param string|null $id Jogo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jogo = $this->Jogos->get($id, [
            'contain' => ['Contas']
        ]);
        $this->set('jogo', $jogo);
        $this->set('_serialize', ['jogo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jogo = $this->Jogos->newEntity();
        if ($this->request->is('post')) {
            $jogo = $this->Jogos->patchEntity($jogo, $this->request->data);
            if ($this->Jogos->save($jogo)) {
                $this->Flash->success(__('The jogo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jogo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jogo'));
        $this->set('_serialize', ['jogo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jogo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jogo = $this->Jogos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jogo = $this->Jogos->patchEntity($jogo, $this->request->data);
            if ($this->Jogos->save($jogo)) {
                $this->Flash->success(__('The jogo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The jogo could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('jogo'));
        $this->set('_serialize', ['jogo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jogo id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jogo = $this->Jogos->get($id);
        if ($this->Jogos->delete($jogo)) {
            $this->Flash->success(__('The jogo has been deleted.'));
        } else {
            $this->Flash->error(__('The jogo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
