<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SenhasExpirada Entity.
 */
class SenhasExpirada extends Entity
{

/*	protected _getNovaSenha()
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";
	  $length = 8;
		$len = strlen($chars);
		$pw = '';
 		for ($i=0;$i<$length;$i++)
        	$pw .= substr($chars, rand(0, $len-1), 1);
		// the finished password
		$pw = str_shuffle($pw);
		return $pw;
	}
	*/
}
