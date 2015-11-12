<?php
namespace App\Model\Entity;

use Cake\ORM\TableRegistry;

trait DescribeTrait {

    public function _getDesc()
    {
       	if(method_exists($this, '_discribe')){
    		return $this->_discribe();
    	}
		$repository = $this->source();
    	$table = TableRegistry::get($repository);
        return $this->get($table->displayField());
    }
}