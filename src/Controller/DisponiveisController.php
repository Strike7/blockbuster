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

    public $paginate = [
        'limit' => 200
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    
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
}
