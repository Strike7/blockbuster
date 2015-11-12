<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pesquisas'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="pesquisas form large-9 medium-8 columns content">
    <?= $this->Form->create($pesquisa) ?>
    <fieldset>
        <legend><?= __('Add Pesquisa') ?></legend>
        <?php
            echo $this->Form->input('nome');
            echo $this->Form->input('descricao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
