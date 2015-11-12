<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pesquisa'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pesquisas index large-9 medium-8 columns content">
    <h3><?= __('Pesquisas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesquisas as $pesquisa): ?>
            <tr>
                <td><?= $pesquisa->element_id ?></td>
                <td><?= h($pesquisa->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pesquisa->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pesquisa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pesquisa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pesquisa->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
