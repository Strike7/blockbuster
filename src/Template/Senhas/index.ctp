<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Senha'), ['action' => 'add']) ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="senhas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('conta_id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('senha') ?></th>
            <th><?= $this->Paginator->sort('data_cadastro') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($senhas as $senha): ?>
        <tr>
            <td><?= $this->Number->format($senha->id) ?></td>
            <td>
                <?= $senha->has('conta') ? $this->Html->link($senha->conta->email, ['controller' => 'Contas', 'action' => 'view', $senha->conta->id]) : '' ?>
            </td>
            <td>
                <?= $senha->has('user') ? $this->Html->link($senha->user->username, ['controller' => 'Users', 'action' => 'view', $senha->user->id]) : '' ?>
            </td>
            <td><?= h($senha->senha) ?></td>
            <td><?= h($senha->data_cadastro) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $senha->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $senha->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $senha->id], ['confirm' => __('Are you sure you want to delete # {0}?', $senha->id)]) ?>
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
