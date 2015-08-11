<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Aluguel'), ['action' => 'edit', $aluguel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aluguel'), ['action' => 'delete', $aluguel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aluguel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Alugueis'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aluguel'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="alugueis view large-10 medium-9 columns">
    <h2><?= h($aluguel->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Situacao') ?></h6>
            <p><?= h($aluguel->situacao) ?></p>
            <h6 class="subheader"><?= __('Tipo') ?></h6>
            <p><?= h($aluguel->tipo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($aluguel->id) ?></p>
            <h6 class="subheader"><?= __('Id Cliente') ?></h6>
            <p><?= $this->Number->format($aluguel->id_cliente) ?></p>
            <h6 class="subheader"><?= __('Id Conta') ?></h6>
            <p><?= $this->Number->format($aluguel->id_conta) ?></p>
            <h6 class="subheader"><?= __('Seq Aluguel') ?></h6>
            <p><?= $this->Number->format($aluguel->seq_aluguel) ?></p>
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
