<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="clientes view large-10 medium-9 columns">
    <h2><?= h($cliente->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Nome') ?></h6>
            <p><?= h($cliente->nome) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($cliente->email) ?></p>
            <h6 class="subheader"><?= __('Game Tag') ?></h6>
            <p><?= h($cliente->game_tag) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($cliente->id) ?></p>
            <h6 class="subheader"><?= __('Id Google') ?></h6>
            <p><?= $this->Number->format($cliente->id_google) ?></p>
        </div>
    </div>
</div>
