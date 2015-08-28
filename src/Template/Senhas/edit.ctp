<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $senha->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $senha->id)]
            )
        ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="senhas form large-10 medium-9 columns">
    <?= $this->Form->create($senha) ?>
    <fieldset>
        <legend><?= __('Edit Senha') ?></legend>
        <?php
            echo $this->Form->input('conta_id', ['options' => $contas]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('senha');
            echo $this->Form->input('data_cadastro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
