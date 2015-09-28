<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Aluguel'), ['action' => 'add']) ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="alugueis form large-10 medium-9 columns">
    <?= $this->Form->create($aluguel, ['type' => 'get']) ?>
    <fieldset>
        <legend><?= __('Filtro Aluguel') ?></legend>
        <?php
            echo $this->Form->label('tipo');
            $optionsTipo = ['A' => 'Avulso',
                            'M' => 'Mercado Livre'];
            echo $this->Form->select('tipo', $optionsTipo,
                             ['empty' => 'Todos']);

            echo $this->Form->label('situação');
            $optionsSituacao = ['U' => 'Em uso',
                                'R' => 'Reservado', 'C' => 'Cancelado',
                                'F' => 'Finalizado'];

            echo $this->Form->select('situacao', $optionsSituacao,
                                    ['empty' => 'Todos']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<div class="alugueis index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome') ?></th>
            <th><?= $this->Paginator->sort('titulo') ?></th>
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
                <?= $aluguel->has('cliente') ? $this->Html->link($aluguel->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $aluguel->cliente->id], ['title' => $aluguel->cliente->email ]) : '' ?>
            </td>
            <td>
                <?= $aluguel->conta->has('jogo') ? $this->Html->link($aluguel->conta->jogo->titulo, ['controller' => 'Jogos', 'action' => 'view', $aluguel->conta->jogo->id], ['title' => $aluguel->conta->email ]) : ''  ?>
            </td>
            <td><?= h($aluguel->data_inicio) ?></td>
            <td><?= h($aluguel->data_fim) ?></td>
            <td><?= h($aluguel->descricao_situacao) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('Email'), ['action' => 'email', $aluguel->id], ['title' => $aluguel->mail ]) ?>
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
