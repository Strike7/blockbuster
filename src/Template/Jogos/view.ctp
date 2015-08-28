<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Jogo'), ['action' => 'edit', $jogo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jogo'), ['action' => 'delete', $jogo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jogo->id)]) ?> </li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="jogos view large-10 medium-9 columns">
    <h2><?= h($jogo->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Titulo') ?></h6>
            <p><?= h($jogo->titulo) ?></p>
            <h6 class="subheader"><?= __('Categoria') ?></h6>
            <p><?= h($jogo->categoria) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($jogo->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Contas') ?></h4>
    <?php if (!empty($jogo->contas)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Jogo Id') ?></th>
            <th><?= __('Email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($jogo->contas as $contas): ?>
        <tr>
            <td><?= h($contas->id) ?></td>
            <td><?= h($contas->jogo_id) ?></td>
            <td><?= h($contas->email) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Contas', 'action' => 'view', $contas->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Contas', 'action' => 'edit', $contas->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contas', 'action' => 'delete', $contas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contas->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
