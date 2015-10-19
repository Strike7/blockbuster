<?php
namespace App\Controller;

use App\View\Email\AluguelView;
use Cake\Core\Configure;
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
            'order' => ['data_inicio' => 'ASC'],
            'sortWhitelist' => ['nome', 'data_inicio', 'data_fim', 'situacao', 'titulo' ]
        ];

        $aluguel = $this->Alugueis->newEntity();
        $alugueis = $this->Alugueis->find();

        $tipo = $this->request->query('tipo');
        $situacao = $this->request->query('situacao');

        if (!empty($tipo)){
            $aluguel->set('tipo', $tipo);
            $alugueis->where(['tipo' => $tipo]);
        }

        if (!empty($situacao)){
            $aluguel->set('situacao', $situacao);
            $alugueis->where(['situacao' => $situacao]);
        }

        $alugueis->where(['ativo' => 'S']);
        /*$alugueis->where(function ($exp, $q) {
            return $exp->in('situacao', ['R', 'U']);
        });*/

        $alugueis->contain(['Clientes', 'Contas' => ['Jogos']]);

        $this->set('alugueis', $this->paginate($alugueis));
        $this->set('_serialize', ['alugueis']);
        $this->set(compact('aluguel'));
    }

    
    private function _emailText($aluguel)
    {
        $view = new AluguelView($this->request);
        $view->set('conta', $aluguel->conta);
        $view->set('cliente', $aluguel->cliente);
        $view->set('jogo', $aluguel->conta->jogo);
        $view->set('senha', end($aluguel->conta->senhas));
        return $view->render('Email/Aluguel/send', 'Email/text/default');;
    }

    public function email($id = null)
    {

        # Instantiate the client.
        $mgClient = new Mailgun(getenv("MAILGUN_API"));
        $domain = getenv("MAILGUN_DOMAIN");

        $aluguel = $this->Alugueis->get($id,[
                'contain' => ['Clientes', 'Contas', 'Contas.Jogos', 'Contas.Senhas']
            ]);


        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, array(
            'from'    => "Strike7 aluguel <aluguel@dy.bazarxbox.com.br>",
            'to'      => "{$aluguel->cliente->nome} <{$aluguel->cliente->email}>",
            'subject' => "ALUGUEL {$aluguel->conta->jogo->titulo}",
            'html'    => $this->_emailText($aluguel),
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
                                    'data_fim >= ' => $aluguel->data_inicio, ])
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

        $clientes = $this->Alugueis->Clientes->find('list', [ 'order' => ['Clientes.nome' => 'ASC']  
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

        $clientes = $this->Alugueis->Clientes->find('list', [ 'order' => ['Clientes.nome' => 'ASC']  
                                                            ]);
        $contas = $this->Alugueis->Contas->find('list');
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
