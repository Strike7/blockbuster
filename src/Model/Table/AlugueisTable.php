<?php
namespace App\Model\Table;

use App\Model\Entity\Aluguel;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Alugueis Model
 *
 */
class AlugueisTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('alugueis');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('id_cliente', 'create')
            ->notEmpty('id_cliente');

        $validator
            ->requirePresence('id_conta', 'create')
            ->notEmpty('id_conta');

        $validator
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio');

        $validator
            ->requirePresence('data_fim', 'create')
            ->notEmpty('data_fim');

        $validator
            ->allowEmpty('situacao');

        $validator
            ->requirePresence('data_cadastro', 'create')
            ->notEmpty('data_cadastro');

        $validator
            ->requirePresence('seq_aluguel', 'create')
            ->notEmpty('seq_aluguel');

        $validator
            ->allowEmpty('tipo');

        return $validator;
    }
}
