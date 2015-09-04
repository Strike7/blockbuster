<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="alugueis form large-10 medium-9 columns">
    <?= $this->Form->create($aluguel); ?>
    <fieldset>
        <legend><?= __('Add Aluguel') ?></legend>
        <?php
            echo $this->Form->input('cliente_id', ['options' => $clientes, 
                                            'empty' => 'Selectione um cliente']);
            echo $this->Form->input('jogo_id', ['options' => $jogos, 
                                                'onchange' => 'loadContas(this.value)',
                                                'empty' => 'Selectione um jogo']);
            echo $this->Form->label('Conta');
            echo $this->Form->select('conta_id', null, ['id' => 'conta_id']);
            
            echo $this->Form->input('data_inicio');
            echo $this->Form->input('data_fim', ['id' => 'data_fim']);

            echo $this->Form->label('situação');

            $optionsSituacao = ['U' => 'Em uso', 
                                'R' => 'Reservado', 'C' => 'Cancelado', 
                                'F' => 'Finalizado'];

            echo $this->Form->select('situacao', $optionsSituacao,
                                    ['empty' => 'Selecione uma situação']);

            echo $this->Form->label('tipo');

            $optionsTipo = ['A' => 'Avulso', 
                            'M' => 'Mercado Livre'];
            
            echo $this->Form->select('tipo', $optionsTipo,
                                    ['empty' => 'Selecione um tipo',
                                    'label' => true]);
            echo $this->Form->label('observacao');
            echo $this->Form->textarea('observacao');
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
            var url = '/contas.json?jogo_id=' + jogo_id;
            $.ajax({
                url: url,
                dataType: 'json'
            }).done(function(data) {
                var contas = data.contas;

                $('#conta_id').find('option').remove().end();
                $('#conta_id')
                    .append($('<option>', { 
                        value: '',
                        text : 'Selecione uma conta' 
                    }));
                
                for (var i in contas){
                    $('#conta_id').append($('<option>', { 
                        value: contas[i].id,
                        text : contas[i].email}));
                }
            });
        }    
    }
</script>
