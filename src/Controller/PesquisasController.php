<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Event\Event;

/**
 * Pesquisas Controller
 *
 * @property \App\Model\Table\PesquisasTable $Pesquisas
 */
class PesquisasController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('RequestHandler');
        $this->loadModel('Pesquisas', 'Elastic');
    }


    /**
     * Index method
     *
     * @return void
     */
    public function index($palavra='')
    {
        debug($palavra);
        $query = $this->Pesquisas->find()
            ->where(function($builder){
                return $builder->or(
                    $builder->regexp('nome',".*$palavra.*"),
                    $builder->regexp('descricao',".*$palavra.*"),
                    $builder->regexp('termos',".*$palavra.*"));
            })->all();
        $this->set('pesquisas', $query);
        $this->set('_serialize', ['pesquisas']);
    }

    /**
     * View method
     *
     * @param string|null $id Pesquisa id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pesquisa = $this->Pesquisas->get($id, [
            'contain' => []
        ]);
        $this->set('pesquisa', $pesquisa);
        $this->set('_serialize', ['pesquisa']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pesquisa = $this->Pesquisas->newEntity();
        if ($this->request->is('post')) {
            $pesquisa = $this->Pesquisas->patchEntity($pesquisa, $this->request->data);

            if ($this->Pesquisas->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pesquisa'));
        $this->set('_serialize', ['pesquisa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pesquisa id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pesquisa = $this->Pesquisas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pesquisa = $this->Pesquisas->patchEntity($pesquisa, $this->request->data);
            if ($this->Pesquisas->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('pesquisa'));
        $this->set('_serialize', ['pesquisa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pesquisa = $this->Pesquisas->get($id);
        if ($this->Pesquisas->delete($pesquisa)) {
            $this->Flash->success(__('The pesquisa has been deleted.'));
        } else {
            $this->Flash->error(__('The pesquisa could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
