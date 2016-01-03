<?php
namespace App\Model\Behavior;

use Cake\Event\Event;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Network\Http\Client;


/**
* Disabilita registros antigos depois de salvar o mais atual
*
*/
class DisponibilidadeBehavior extends Behavior
{
	 protected $_defaultConfig = [
		'desc' => 'desc',
		'fields' => []
		];

	public function initialize(array $config)
	{
	    Parent::initialize($config);
	}

	public function afterSave(Event $event, Entity $entity, $options)
	{
		$config = $this->config();
		$http = new Client();

		$response = $http->put('http://45.55.11.19/api/jogos/75',
		                   json_encode( [
						             'jogo' => [
														'id'     => 75  ,
														'titulo' => 'Evolve',
														'capa'   => 'evolve.png',
														'disponibilidade' => true
												 ]]), ['type' => 'json'] );
								debug($response);
	}
}
