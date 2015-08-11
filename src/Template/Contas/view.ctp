<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Conta'), ['action' => 'edit', $conta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Conta'), ['action' => 'delete', $conta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $conta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Conta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jogos'), ['controller' => 'Jogos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jogo'), ['controller' => 'Jogos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Senhas'), ['controller' => 'Senhas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Senha'), ['controller' => 'Senhas', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="contas view large-10 medium-9 columns">
    <h2><?= h($conta->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Jogo') ?></h6>
            <p><?= $conta->has('jogo') ? $this->Html->link($conta->jogo->id, ['controller' => 'Jogos', 'action' => 'view', $conta->jogo->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($conta->email) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($conta->id) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Senhas') ?></h4>
    <?php if (!empty($conta->senhas)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Conta Id') ?></th>
            <th><?= __('Usuario Id') ?></th>
            <th><?= __('Senha') ?></th>
            <th><?= __('Data Cadastro') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($conta->senhas as $senhas): ?>
        <tr>
            <td><?= h($senhas->id) ?></td>
            <td><?= h($senhas->conta_id) ?></td>
            <td><?= h($senhas->usuario_id) ?></td>
            <td><?= h($senhas->senha) ?></td>
            <td><?= h($senhas->data_cadastro) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Senhas', 'action' => 'view', $senhas->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Senhas', 'action' => 'edit', $senhas->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Senhas', 'action' => 'delete', $senhas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $senhas->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
