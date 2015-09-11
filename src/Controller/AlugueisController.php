<?php
namespace App\Controller;

use Cake\Core\Configure;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

use Mailgun\Mailgun;

/**
 * Alugueis Controller
 *
 * @property \App\Model\Table\AlugueisTable $Alugueis
 */
class AlugueisController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clientes', 'Contas'],
            'limit' => 200,
            'order' => ['data_inicio' => 'ASC'],
            'sortWhitelist' => ['nome', 'data_inicio', 'data_fim', 'situacao', 'titulo' ]
        ];

        $alugueis = $this->Alugueis->find();
        $alugueis->where(['ativo' => 'S']);
        $alugueis->where(function ($exp, $q) {
                return $exp->in('situacao', ['R', 'U']);
            });

        $alugueis->contain(['Clientes', 'Contas' => ['Jogos']]);

        $this->set('alugueis', $this->paginate($alugueis, $settings));
        $this->set('_serialize', ['alugueis']);
    }


    public function email($id = null)
    {

        # Instantiate the client.
        $mgClient = new Mailgun('key-96a537499df2b5db930a9ad0b4d37e5e');
        $domain = "dy.bazarxbox.com.br";

        $aluguel = $this->Alugueis->get($id,[
                'contain' => ['Clientes', 'Contas', 'Contas.Jogos']
            ]);


        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => "Strike7 aluguel <aluguel@dy.bazarxbox.com.br>",
            'to'      => "{$aluguel->cliente->nome} <{$aluguel->cliente->email}>",
            'subject' => "ALUGUEL {$aluguel->conta->jogo->titulo}",
            'text'    => 'Obrigado por aluguar',
            'o:tag'   => array('aluguel'),
            'o:testmode' => Configure::read('debug')
        ));
        

        if($result->http_response_code == 200)
        {
            $aluguel->set('mail', $result->http_response_body->id);
            if ($this->Alugueis->save($aluguel)) {
                $this->Flash->success(__('The aluguel has been saved. {0}', $result->http_response_body->message));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The aluguel could not be saved. Please, try again. But the email was sent'));
            }
        } else {
            $this->Flash->error(__('The email could not be sent. {0}, {1}', $result->http_response_code, $result->http_response_body->message));
        }
        
        return $this->redirect(['action' => 'index']);
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
            'contain' => ['Clientes', 'Contas']
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
            $aluguel->set('ativo', 'S');

            $al = TableRegistry::get('Alugueis')
                                ->find()
                                ->where(['conta_id' => $aluguel->conta_id,
                                    'ativo' => 'S',
                                    'data_fim >= ' => $aluguel->data_inicio ])
                                ->where(function ($exp, $q) {
                                        return $exp->in('situacao', ['R', 'U']);
                                    })->first();
            if (!$al){
                if ($this->Alugueis->save($aluguel)) {
                    $this->Flash->success(__('The aluguel has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The aluguel could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('Já existe um aluguel para o período informado.'));
            }
        }

        $clientes = $this->Alugueis->Clientes->find('list', ['limit' => 200,
                                                             'order' => ['Clientes.nome' => 'ASC']  
                                                            ]);
                                                        
        $jogosTable = TableRegistry::get('Jogos');
        $query = $jogosTable->find('list')->order(['titulo' => 'ASC']);
        $jogos = $query->toArray();

        $this->set(compact('aluguel', 'clientes', 'jogos'));
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
            $aluguel = $this->Alugueis->newEntity();
            $aluguel = $this->Alugueis->patchEntity($aluguel, $this->request->data);
            $aluguel->set('id_pai', $id);
            $aluguel->set('ativo', 'S');
            
            if ($this->Alugueis->save($aluguel)) {
                $this->Flash->success(__('The aluguel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The aluguel could not be saved. Please, try again.'));
            }
        }

        $clientes = $this->Alugueis->Clientes->find('list', ['limit' => 200]);
        $contas = $this->Alugueis->Contas->find('list', ['limit' => 200]);
        $this->set(compact('aluguel', 'clientes', 'contas'));
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
