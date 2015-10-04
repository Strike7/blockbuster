<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $aluguel->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $aluguel->id)]
            )
        ?></li>
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="alugueis form large-10 medium-9 columns">
    <?= $this->Form->create($aluguel) ?>
    <fieldset>
        <legend><?= __('Edit Aluguel') ?></legend>
        <?php
            echo $this->Form->input('cliente_id', ['options' => $clientes]);
            echo $this->Form->input('conta_id', ['options' => $contas]);
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('data_fim');
            $optionsSituacao = ['' => 'Selecione uma situação', 'U' => 'Em uso',
                                'R' => 'Reservado', 'C' => 'Cancelado',
                                'F' => 'Finalizado'];
            echo $this->Form->select('situacao', $optionsSituacao);
            $optionsTipo = ['' => 'Selecione um tipo','S' => 'Assinatura', 'A' => 'Avulso',
                            'M' => 'Mercado Livre'];
            echo $this->Form->select('tipo', $optionsTipo);
            echo $this->Form->label('observacao');
            echo $this->Form->textarea('observacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
