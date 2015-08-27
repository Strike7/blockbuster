<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Aluguel'), ['controller' => 'Alugueis', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="disponibilidades index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
            <th><?= $this->Paginator->sort('senha') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($disponibilidades as $disponibilidade): ?>
        <tr>
            <td><?= h($disponibilidade->titulo) ?></td>
            <td><?= h($disponibilidade->email) ?></td>
            <td><?= h($disponibilidade->senha) ?></td>
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
