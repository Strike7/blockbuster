<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Entity\DescribeTrait;

/**
 * Jogo Entity.
 */
class Jogo extends Entity
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
        return $this->get('titulo') . " categoria " . $this->_getDescricaoCategoria;
    }

    protected function _getDescricaoCategoria()
    {
        switch ($this->_properties['categoria'])
        {
            case 'E':
                return 'Econômico';
                break;
            case 'L':
                return 'Lançamento';
                break;
            case 'N':
                return 'Normal';
                break;    
            case 'M':
                return 'Mais Alugados';
                break;    
            default:
                return ' - ';
                break;
        }
    }
}
