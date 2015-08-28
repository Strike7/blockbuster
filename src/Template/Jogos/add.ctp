<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="jogos form large-10 medium-9 columns">
    <?= $this->Form->create($jogo) ?>
    <fieldset>
        <legend><?= __('Add Jogo') ?></legend>
        <?php
            echo $this->Form->input('titulo');
            $options = ['' => 'Selecione uma categoria', 'E' => 'Econômico', 'L' => 'Lançamento', 'N' => 'Normal', 
                        'M' => 'Mais alugados'];
            echo $this->Form->select('categoria', $options);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
