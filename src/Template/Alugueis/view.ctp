<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Aluguel'), ['action' => 'edit', $aluguel->id]) ?> </li>
        <li><?= $this->Html->link(__('New Aluguel'), ['action' => 'add']) ?> </li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="alugueis view large-10 medium-9 columns">
    <h2><?= h($aluguel->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Cliente') ?></h6>
            <p><?= $aluguel->has('cliente') ? $this->Html->link($aluguel->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $aluguel->cliente->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Conta') ?></h6>
            <p><?= $aluguel->has('conta') ? $this->Html->link($aluguel->conta->email, ['controller' => 'Contas', 'action' => 'view', $aluguel->conta->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Situacao') ?></h6>
            <p><?= h($aluguel->situacao) ?></p>
            <h6 class="subheader"><?= __('Tipo') ?></h6>
            <p><?= h($aluguel->tipo) ?></p>
            <h6 class="subheader"><?= __('Observacao') ?></h6>
            <p><?= h($aluguel->observacao) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($aluguel->id) ?></p>
            <h6 class="subheader"><?= __('Id Pai') ?></h6>
            <p><?= $this->Number->format($aluguel->id_pai) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Data Inicio') ?></h6>
            <p><?= h($aluguel->data_inicio) ?></p>
            <h6 class="subheader"><?= __('Data Fim') ?></h6>
            <p><?= h($aluguel->data_fim) ?></p>
            <h6 class="subheader"><?= __('Data Cadastro') ?></h6>
            <p><?= h($aluguel->data_cadastro) ?></p>
        </div>
    </div>
</div>
