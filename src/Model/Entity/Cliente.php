<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity.
 */
class Cliente extends Entity
{
	use DescribeTrait;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _describe()
    {
    	return $this->nome . " contato " . $this->email . " gametag " . $this->game_tag;
    }
}
