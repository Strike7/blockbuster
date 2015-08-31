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
