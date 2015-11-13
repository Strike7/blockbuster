<?php
namespace App\Model\Table;

use App\Model\Entity\Jogo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Model\Behavior\SearcableBehavior;

/**
 * Jogos Model
 *
 * @property \Cake\ORM\Association\HasMany $Contas
 */
class JogosTable extends Table
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

        $this->table('jogos');
        $this->displayField('titulo');
        $this->primaryKey('id');
        $this->hasMany('Contas', [
            'foreignKey' => 'jogo_id'
        ]);

        $this->addBehavior('Searchable', [
            "titulo" => "titulo",
            "fields" => ["titulo", "categoria", "descricao_categoria"]]);
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
            ->requirePresence('titulo', 'create')
            ->notEmpty('titulo');

        $validator
            ->allowEmpty('categoria');

        return $validator;
    }
}
