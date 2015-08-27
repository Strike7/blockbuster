<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DisponibilidadesFixture
 *
 */
class DisponibilidadesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'titulo' => ['type' => 'string', 'length' => 200, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'fixed' => null],
        'categoria' => ['type' => 'text', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
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
            'id' => '',
            'titulo' => 'Lorem ipsum dolor sit amet',
            'categoria' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'email' => 'Lorem ipsum dolor sit amet',
            'senha' => 'Lorem ipsum dolor '
        ],
    ];
}
