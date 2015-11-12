<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Conta Entity.
 */
class Conta extends Entity
{

    protected static $_senhas;
    
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getSenha()
    {        
        if( !isset(Conta::$_senhas) ) {
            Conta::$_senhas = TableRegistry::get('Senhas');
        }

        $query = Conta::$_senhas->find();

        $query = $query->where([
                'conta_id' => $this->id ])
            ->order(['data_cadastro' => 'DESC']);

        return $query->first()->senha;
    }

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
