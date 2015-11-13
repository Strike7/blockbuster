<?php
namespace App\Model\Table;

use App\Model\Entity\Conta;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jogos
 * @property \Cake\ORM\Association\HasMany $Alugueis
 * @property \Cake\ORM\Association\HasMany $Senhas
 */
class ContasTable extends Table
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

        $this->table('contas');
        $this->displayField('email');
        $this->primaryKey('id');
        $this->belongsTo('Jogos', [
            'foreignKey' => 'jogo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
        $this->hasMany('Alugueis', [
            'foreignKey' => 'conta_id'
        ]);
        $this->hasMany('Senhas', [
            'foreignKey' => 'conta_id'
        ]);

        $this->addBehavior('Searchable', [
            'titulo' => 'email',
            'fields' =>[ 'email', 'titulo', 'descricaoTipo']])
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
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['jogo_id'], 'Jogos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }
}
