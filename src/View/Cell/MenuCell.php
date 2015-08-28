<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Menu cell
 */
class MenuCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display() {
        $menu = [];

        $menu[] = $this ->menu( __('Jogos'), array( 'controller' => 'Jogos', 'action' => 'index' ), 'pencil', [] );
        $menu[] = $this ->menu( __('Contas'), array( 'controller' => 'Contas', 'action' => 'index' ), 'fa-table', [] );
        $menu[] = $this ->menu( __('Senhas'), array( 'controller' => 'Senhas', 'action' => 'index' ), 'fa-table', [] );
        $menu[] = $this ->menu( __('Alugueis'), array( 'controller' => 'Alugueis', 'action' => 'index' ), 'fa-table', [] );
        $menu[] = $this ->menu( __('Clientes'), array( 'controller' => 'Clientes', 'action' => 'index' ), 'fa-table', [] );
        $menu[] = $this ->menu( __('Users'), array( 'controller' => 'Users', 'action' => 'index' ), 'fa-table', [] );
        $menu[] = $this ->menu( __('Disponibilidades'), array( 'controller' => 'Disponibilidades', 'action' => 'index' ), 'fa-table', [] );

        $this -> set ( 'menu',  $menu );
    }

    private function menu( $title, $url = [], $icon, $submenu = [] ) {
        return ['title' => $title, 'url' => $url, 'icon' => $icon, 'submenu' => $submenu]; 
    }
    
}
