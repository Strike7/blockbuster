<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $jogo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $jogo->id)]
            )
        ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="jogos form large-10 medium-9 columns">
    <?= $this->Form->create($jogo) ?>
    <fieldset>
        <legend><?= __('Edit Jogo') ?></legend>
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
