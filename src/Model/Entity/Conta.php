<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use App\Model\Entity\DescribeTrait;


/**
 * Conta Entity.
 */
class Conta extends Entity
{
    use DescribeTrait;

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

    protected function _describe()
    {
        return "Jogo " . $this->jogo->titulo . " conta " . this->email . " tipo " . this->descricaoTipo
    }

    protected function _getSenha()
    {        
        if( !isset(Conta::$_senhas) ) {
            Conta::$_senhas = TableRegistry::get('Senhas');
        }

        $query = Conta::$_senhas->find();

        $query = $query->where([
                'conta_id' => $this->id ])
            ->order(['data_cadastro' => 'DESC']);

        return $query->first()->senha ?: '';
    }

    protected function _getTitulo(){
        return $this->jogo->titulo;
    }

    protected function _getDescricaoTipo(){
        switch ($this->tipo) {
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
