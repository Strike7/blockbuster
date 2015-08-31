<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SenhasExpiradasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SenhasExpiradasTable Test Case
 */
class SenhasExpiradasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.senhas_expiradas',
        'app.titulos',
        'app.contas',
        'app.jogos',
        'app.alugueis',
        'app.clientes',
        'app.senhas',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SenhasExpiradas') ? [] : ['className' => 'App\Model\Table\SenhasExpiradasTable'];
        $this->SenhasExpiradas = TableRegistry::get('SenhasExpiradas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SenhasExpiradas);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
