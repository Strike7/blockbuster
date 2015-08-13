<?php 

namespace App\Controller\Component;

use Cake\Controller\Component;

class ContasComboBoxComponent extends Component
{
    public function get($nome, $options){
    	echo '<option value>Selecione uma conta</option>';
        foreach ($options as $option) {
            echo '<option value= "'.$option->id.'" > '. $option->email . '</option>';
        }
    }
}