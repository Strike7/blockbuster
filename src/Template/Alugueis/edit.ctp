<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aluguel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aluguel->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Alugueis'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="alugueis form large-10 medium-9 columns">
    <?= $this->Form->create($aluguel) ?>
    <fieldset>
        <legend><?= __('Edit Aluguel') ?></legend>
        <?php
            echo $this->Form->input('id_cliente');
            echo $this->Form->input('id_conta');
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('data_fim');
            echo $this->Form->input('situacao');
            echo $this->Form->input('data_cadastro');
            echo $this->Form->input('seq_aluguel');
            echo $this->Form->input('tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
