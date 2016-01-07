<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aluguel Entity.
 */
class Aluguel extends Entity
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

    protected function _getDescricaoSituacao(){
        switch ($this->_properties['situacao']) {
            case 'U':
                return 'Em uso';
                break;
            case 'R':
                return 'Reservado';
                break;
            case 'C':
                return 'Cancelado';
                break;
            case 'F':
                return 'Finalizado';
                break;
            default:
                return ' - ';
                break;
        }
    }

    protected function _getDescricaoTipo(){
        switch ($this->_properties['tipo']) {
            case 'S':
                return 'Assinatura';
                break;
            case 'A':
                return 'Avulso';
                break;
            case 'M':
                return 'Mercado Livre';
                break;
            case 'L':
                return 'Loja Virtual';
                break;
            default:
                return ' - ';
                break;
        }
    }
}
