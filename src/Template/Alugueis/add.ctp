<?php echo $this->Html->script('http://code.jquery.com/jquery.min.js'); ?>
<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Alugueis'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contas'), ['controller' => 'Contas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Conta'), ['controller' => 'Contas', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="alugueis form large-10 medium-9 columns">
    <?= $this->Form->create($aluguel); ?>
    <fieldset>
        <legend><?= __('Add Aluguel') ?></legend>
        <?php
            echo $this->Form->input('cliente_id', ['options' => $clientes]);
            echo $this->Form->input('jogo_id', ['options' => $jogos, 
                                                'onchange' => 'loadContas(this.value)',
                                                'empty' => 'Selectione um jogo']);
            echo $this->Form->select('conta_id', null, ['id' => 'conta_id']);
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('data_fim');
            echo $this->Form->input('data_cadastro');

            echo $this->Form->label('situação');

            $optionsSituacao = ['U' => 'Em uso', 
                                'R' => 'Reservado', 'C' => 'Cancelado', 
                                'F' => 'Finalizado'];

            echo $this->Form->select('situacao', $optionsSituacao,
                                    ['empty' => 'Selecione uma situação']);

            echo $this->Form->label('tipo');

            $optionsTipo = ['' => 'Selecione um tipo', 'A' => 'Avulso', 
                            'M' => 'Mercado Livre'];
            
            echo $this->Form->select('tipo', $optionsTipo,
                                    ['empty' => 'Selecione um tipo',
                                    'label' => true]);

            echo $this->Form->input('data_cadastro');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){

       
    });

    function loadContas(jogo_id) {
        
        if (jogo_id) {
            var url = '/alugueis/add';
            $.ajax({
                url: url,
                data: { id: jogo_id}
            }).done(function(data) {
                $("#conta_id").html(data); 
            });
        }    
    }
</script>
