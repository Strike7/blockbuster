<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Senhas Expirada'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="senhasExpiradas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('titulo_id') ?></th>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th><?= $this->Paginator->sort('conta_id') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('senha') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($senhasExpiradas as $senhasExpirada): ?>
        <tr>
            <td><?= $this->Number->format($senhasExpirada->titulo_id) ?></td>
            <td><?= h($senhasExpirada->titulo) ?></td>
            <td><?= $this->Number->format($senhasExpirada->conta_id) ?></td>
            <td><?= h($senhasExpirada->email) ?></td>
            <td><?= h($senhasExpirada->senha) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $senhasExpirada->titulo_id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $senhasExpirada->titulo_id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $senhasExpirada->titulo_id], ['confirm' => __('Are you sure you want to delete # {0}?', $senhasExpirada->titulo_id)]) ?>
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
