<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jogo Entity.
 */
class Jogo extends Entity
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

    public static function statuses($value = null) {
	    $options = array(
	        self::LANCAMENTO => __('Lançamento',true),
	        
	    );
	    return parent::enum($value, $options);
	}
	 
	const LANCAMENTO = 'L'; # causes sound, then marks itself as "unread"
	
}
