<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Aluguel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="alugueis index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('cliente_id') ?></th>
            <th><?= $this->Paginator->sort('conta_id') ?></th>
            <th><?= $this->Paginator->sort('data_inicio') ?></th>
            <th><?= $this->Paginator->sort('data_fim') ?></th>
            <th><?= $this->Paginator->sort('situacao') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($alugueis as $aluguel): ?>
        <tr>
            <td>
                <?= $aluguel->has('cliente') ? $this->Html->link($aluguel->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $aluguel->cliente->id]) : '' ?>
            </td>
            <td>
                <?= $aluguel->has('conta') ? $this->Html->link($aluguel->conta->email, ['controller' => 'Contas', 'action' => 'view', $aluguel->conta->id]) : '' ?>
            </td>
            <td><?= h($aluguel->data_inicio) ?></td>
            <td><?= h($aluguel->data_fim) ?></td>
            <td><?= h($aluguel->descricao_situacao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $aluguel->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $aluguel->id]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
