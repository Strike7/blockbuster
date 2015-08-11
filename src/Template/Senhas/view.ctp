<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Senha'), ['action' => 'edit', $senha->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Senha'), ['action' => 'delete', $senha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $senha->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Senhas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Senha'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="senhas view large-10 medium-9 columns">
    <h2><?= h($senha->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Conta') ?></h6>
            <p><?= $senha->has('conta') ? $this->Html->link($senha->conta->email, ['controller' => 'Contas', 'action' => 'view', $senha->conta->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Usuario') ?></h6>
            <p><?= $senha->has('usuario') ? $this->Html->link($senha->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $senha->usuario->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Senha') ?></h6>
            <p><?= h($senha->senha) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($senha->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Data Cadastro') ?></h6>
            <p><?= h($senha->data_cadastro) ?></p>
        </div>
    </div>
</div>
