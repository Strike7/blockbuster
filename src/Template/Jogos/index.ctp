<div class="">
    
</div>
<div class="jogos index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th><?= $this->Paginator->sort('categoria') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($jogos as $jogo): ?>
        <tr>
            <td><?= $this->Number->format($jogo->id) ?></td>
            <td><?= h($jogo->titulo) ?></td>
            <td><?= h($jogo->descricao_categoria) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $jogo->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jogo->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jogo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jogo->id)]) ?>
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
