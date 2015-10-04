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

    public $paginate = [

        'limit' => 200
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

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
        $this->set('disponibilidades', $this->paginate($this->Disponibilidades));
        $this->set('_serialize', ['disponibilidades']);
    }
}
