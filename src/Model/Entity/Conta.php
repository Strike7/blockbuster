<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conta Entity.
 */
class Conta extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getDescricaoTipo(){
        switch ($this->_properties['tipo']) {
            case 'S':
                return 'Assinatura';
                break;
            case 'L':
                return 'Locação';
                break;
            default:
                return ' - ';
                break;
        }
    }
}
