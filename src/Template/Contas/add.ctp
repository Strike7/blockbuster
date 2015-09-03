<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="contas form large-10 medium-9 columns">
    <?= $this->Form->create($conta) ?>
    <fieldset>
        <legend><?= __('Add Conta') ?></legend>
        <?php
            echo $this->Form->input('jogo_id', ['options' => $jogos,
                                    'empty' => 'Selecione um jogo']);
            echo $this->Form->input('email');
            echo $this->Form->input('user_id', ['options' => $users,
                                    'empty' => 'Selecione um usuário']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
