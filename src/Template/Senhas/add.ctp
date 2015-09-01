<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <?= $this->cell('Menu'); ?>
    </ul>
</div>
<div class="senhas form large-10 medium-9 columns">
    <?= $this->Form->create($senha) ?>
    <fieldset>
        <legend><?= __('Add Senha') ?></legend>
        <?php
            echo $this->Form->input('jogo_id', ['options' => $jogos, 
                                                'onchange' => 'loadContas(this.value)',
                                                'empty' => 'Selectione um jogo']);
            echo $this->Form->label('Conta');
            echo $this->Form->select('conta_id', null, ['id' => 'conta_id']);
            echo $this->Form->input('user_id', ['options' => $users,
                                    'empty' => 'Selecione um usuário']);
            echo $this->Form->input('senha');
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
