<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="disponibilidades index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('titulo') ?></th>
            <th><?= $this->Paginator->sort('email') ?></th>
<<<<<<< HEAD
            <th><?= $this->Paginator->sort('disponivel') ?></th>
=======
            <th><?= $this->Paginator->sort('senha') ?></th>
            <th><?= $this->Paginator->sort('alterar_senha') ?></th>
>>>>>>> 966a594fc03d8b95f69ff967a7920f5e5efe5366
        </tr>
    </thead>
    <tbody>
    <?php foreach ($disponibilidades as $disponibilidade): ?>
        <tr>
            <td><?= h($disponibilidade->titulo) ?></td>
            <td><?= h($disponibilidade->email) ?></td>
<<<<<<< HEAD
            <td><?= h($disponibilidade->disponivel) ?></td>
=======
            <td><?= h($disponibilidade->senha) ?></td>
            <td><?= h($disponibilidade->alterar_senha) ?></td>
>>>>>>> 966a594fc03d8b95f69ff967a7920f5e5efe5366
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
