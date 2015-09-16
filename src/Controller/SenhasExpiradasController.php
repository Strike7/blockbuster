<?php
namespace App\Controller;

/**
 * SenhasExpiradas Controller
 *
 * @property \App\Model\Table\SenhasExpiradasTable $SenhasExpiradas
 */
class SenhasExpiradasController extends AppController
{

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
