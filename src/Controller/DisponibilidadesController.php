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
<<<<<<< HEAD
        'limit' => 200
=======
        'fields' => ['Disponibilidades.titulo'],
        'limit' => 200
        
>>>>>>> 966a594fc03d8b95f69ff967a7920f5e5efe5366
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
