<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="senhasExpiradas index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('senha') ?></th>
            <th><?= $this->Paginator->sort('expirou') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($senhasExpiradas as $senhasExpirada): ?>
        <tr>
            <td><?= h($senhasExpirada->titulo) ?></td>
            <td><?= h($senhasExpirada->email) ?></td>
            <td><?= h($senhasExpirada->senha) ?></td>
            <td><?= h($senhasExpirada->expirou) ?></td>
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
