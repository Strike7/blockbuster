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

    $contas = TableRegistry::get('Contas');
		$conta = $contas->get($entity->conta_id, [ 'contain' => ['Jogos']]);

		$jogo = $conta->jogo;
		$json = $http->get('http://45.55.11.19/api/jogos')->json;

		$jogos = array_filter($json['jogos'], function($var)use($jogo){
			if ($var['id']== $jogo->codigo) return true;
		});
		$jogojson = array_pop($jogos);

		$jogojson['disponibilidade'] = $jogo->disponivel->disponivel=='S';

    if (!empty($jogojson)){
			$response = $http->put('http://45.55.11.19/api/jogos/'.$conta->jogo->codigo,
			                   json_encode( [
							             'jogo' => $jogojson
													 ]), ['type' => 'json'] );

		 }
	}

}
