<?php 

foreach($menu as $item) {
	echo $this->Html->tag('li', $this->Html->link($item['title'], ['controller' => $item['url']['controller']]));
	
	
	
    
} 


?>

