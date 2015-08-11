<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Usuarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Senhas'), ['controller' => 'Senhas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Senha'), ['controller' => 'Senhas', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="usuarios form large-10 medium-9 columns">
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Add Usuario') ?></legend>
        <?php
            echo $this->Form->input('nome');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
