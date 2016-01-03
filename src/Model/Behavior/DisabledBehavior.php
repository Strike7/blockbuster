<?php
namespace App\Model\Behavior;

use Cake\Event\Event;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

use Cake\ElasticSearch\TypeRegistry;

/**
* Disabilita registros antigos depois de salvar o mais atual
*
*/
class DisabledBehavior extends Behavior
{

	public function initialize(array $config)
	{
	    Parent::initialize($config);
	}

	public function afterSave(Event $event, Entity $entity, $options)
	{
		$config = $this->config();

		$pesquisas = TableRegistry::get($entity->source());
		$entityField = $config['entityField'];;
		$field = $config['field'];
		debug($entity->source());
		debug($options);

		$query = $pesquisas->query();
		debug($query);

		$pesquisas->updateAll(['ativo' => 'N'],
			[	$field => $entity[$entityField],
				'id != ' => $entity['id']]);
	}
}
