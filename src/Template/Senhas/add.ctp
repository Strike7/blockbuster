<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Senhas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="senhas form large-10 medium-9 columns">
    <?= $this->Form->create($senha) ?>
    <fieldset>
        <legend><?= __('Add Senha') ?></legend>
        <?php
            echo $this->Form->input('conta_id', ['options' => $contas,
                                        'empty' => 'Selecione uma conta']);
            echo $this->Form->input('user_id', ['options' => $users,
                                    'empty' => 'Selecione um usuário']);
            echo $this->Form->input('senha');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
