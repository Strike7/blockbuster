<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $conta->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $conta->id)]
            )
        ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="contas form large-10 medium-9 columns">
    <?= $this->Form->create($conta) ?>
    <fieldset>
        <legend><?= __('Edit Conta') ?></legend>
        <?php
            echo $this->Form->input('jogo_id', ['options' => $jogos]);
            echo $this->Form->input('email');
            echo $this->Form->label('tipo');

            $optionsTipo = ['S' => 'Assinatura',
                            'L' => 'Locação'];
            echo $this->Form->select('tipo', $optionsTipo);

            echo $this->Form->input('user_id', ['options' => $users,
                                    'empty' => 'Selecione um usuário']);


        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
