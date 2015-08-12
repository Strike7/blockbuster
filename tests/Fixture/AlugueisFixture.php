<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlugueisFixture
 *
 */
class AlugueisFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'seq_aluguel' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'cliente_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'conta_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'data_inicio' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'data_fim' => ['type' => 'timestamp', 'length' => null, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null],
        'situacao' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'tipo' => ['type' => 'string', 'fixed' => true, 'length' => 1, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'data_cadastro' => ['type' => 'timestamp', 'length' => null, 'default' => 'now()', 'null' => false, 'comment' => null, 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'seq_aluguel'], 'length' => []],
            'alugueis_clientes_fk' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['clientes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'alugueis_contas_fk' => ['type' => 'foreign', 'columns' => ['conta_id'], 'references' => ['contas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'seq_aluguel' => '',
            'cliente_id' => '',
            'conta_id' => '',
            'data_inicio' => 1439345352,
            'data_fim' => 1439345352,
            'situacao' => 'Lorem ipsum dolor sit ame',
            'tipo' => 'Lorem ipsum dolor sit ame',
            'data_cadastro' => 1439345352
        ],
    ];
}
