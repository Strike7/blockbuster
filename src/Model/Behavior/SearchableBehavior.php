<?php
namespace App\Model\Behavior;

use Cake\Event\Event;

use Cake\ORM\Behavior;
use Cake\ORM\Entity;

use Cake\ElasticSearch\TypeRegistry;

/**
* Adicioa a capacidade de uma entidade ser pesquisavel sendo possivel
* indicar o id para uma rota reversa a sua vizualição e também indicar
* os campos indexados e os campos de descrição da visualizacao
*
*/
class SearchableBehavior extends Behavior
{
	 protected $_defaultConfig = [
		'desc' => 'desc',
		'fields' => []
		];

	public function initialize(array $config)
	{
	    Parent::initialize($config);
	    if(!array_key_exists('name', $config))
	    	$this->config('name', $this->_table->displayField());
	}

	public function afterSave(Event $event, Entity $entity, $options)
	{
		$config = $this->config();
		$pesquisas = TypeRegistry::get('Pesquisas');

		if(!isset($config['fields']) && is_array($config['fields']))
		{
			return;
		}

		$allTerms = array_reduce($config['fields'], function($v, $w) use (&$entity)
			{
				return implode(" ", [$v, $entity->get($w)]);
			});


			$pesquisa = $pesquisas->newEntity();
			$pesquisa = $pesquisas->patchEntity($pesquisa, [
				"fonte" => [
				'id' => $entity->get('id'),
				'tipo' => $entity->source() ],
				"name" => $entity->get($config['name']),
				"desc" => $entity->get($config['desc']),
				"terms" => explode(" ", $allTerms)
			]);
			if ($pesquisas->save($pesquisa))
			{
			    // Document was indexed
			}
	}

	public function afterDelete(Event $event, Entity $entity, $options)
	{
		$config = $this->config();
		$pesquisas = TypeRegistry::get('Pesquisas');

		$query  = $pesquisas->find()->where([
			'AND' => [
			'fonte.id' => $entity->get('id'),
			'fonte.tipo' => strtolower($entity->source()) ]])->all();
		foreach( $query as $pesquisa)
		{
			$pesquisas->delete($pesquisa);
		}
	}
}
