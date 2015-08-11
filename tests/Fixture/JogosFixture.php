<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JogosFixture
 *
 */
class JogosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'titulo' => ['type' => 'string', 'length' => 200, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'fixed' => null],
        'categoria' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => '',
            'titulo' => 'Lorem ipsum dolor sit amet',
            'categoria' => 'Lorem ipsum dolor sit ame'
        ],
    ];
}
