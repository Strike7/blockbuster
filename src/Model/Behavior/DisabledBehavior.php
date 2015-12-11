<?php
namespace App\Model\Behavior;

use Cake\Event\Event;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;

use Cake\ElasticSearch\TypeRegistry;

/**
* Disabilita registros antigos depois de salvar o mais atual
*
*/
class DisabledBehavior extends Behavior
{


	public function afterSave(Event $event, Entity $entity, $options)
	{
		$config = $this->config();
		$pesquisas = TypeRegistry::get($entity->source());
		$field = $options['field'];

		$pesquisas->updateAll(
			['ativo' => 'N'],
			[$field => $entity[$field]]
			);
	}
}