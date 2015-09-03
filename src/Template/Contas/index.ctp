<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Conta'), ['action' => 'add']) ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="contas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('jogo_id') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contas as $conta): ?>
        <tr>
            <td><?= $this->Number->format($conta->id) ?></td>
            <td>
                <?= $conta->has('jogo') ? $this->Html->link($conta->jogo->titulo, ['controller' => 'Jogos', 'action' => 'view', $conta->jogo->id]) : '' ?>
            </td>
            <td><?= h($conta->email) ?></td>
            <td>
                <?= $conta->has('user') ? h($conta->user->username) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $conta->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $conta->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $conta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conta->id)]) ?>
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
