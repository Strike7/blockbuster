<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SenhasExpiradasFixture
 *
 */
class SenhasExpiradasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'titulo_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'titulo' => ['type' => 'string', 'length' => 200, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'conta_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'email' => ['type' => 'string', 'length' => 200, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'senha' => ['type' => 'string', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'titulo_id' => '',
            'titulo' => 'Lorem ipsum dolor sit amet',
            'conta_id' => '',
            'email' => 'Lorem ipsum dolor sit amet',
            'senha' => 'Lorem ipsum dolor '
        ],
    ];
}
