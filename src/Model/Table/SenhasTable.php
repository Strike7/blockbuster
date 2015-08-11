<?php
namespace App\Model\Table;

use App\Model\Entity\Senha;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Senhas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Contas
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 */
class SenhasTable extends Table
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

        $this->table('senhas');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Contas', [
            'foreignKey' => 'conta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
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
            ->requirePresence('senha', 'create')
            ->notEmpty('senha');

        $validator
            ->requirePresence('data_cadastro', 'create')
            ->notEmpty('data_cadastro');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['conta_id'], 'Contas'));
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        return $rules;
    }
}
