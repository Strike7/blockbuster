<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SenhasExpiradas Controller
 *
 * @property \App\Model\Table\SenhasExpiradasTable $SenhasExpiradas
 */
class SenhasExpiradasController extends AppController
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
        $this->set('senhasExpiradas', $this->paginate($this->SenhasExpiradas));
        $this->set('_serialize', ['senhasExpiradas']);
    }
}
