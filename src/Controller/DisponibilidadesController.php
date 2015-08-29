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
        'fields' => ['Disponibilidades.titulo'],
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
        $this->set('disponibilidades', $this->paginate($this->Disponibilidades));
        $this->set('_serialize', ['disponibilidades']);
    }
}
