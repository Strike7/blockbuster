<div class="col-md-4 col-md-offset-4">
	<div class="login-panel panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">
				<?= __('Please enter your username and password') ?>
			</div> 
		</div>

		<div class="panel-body">
			<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>
		    <fieldset>
		        <?= $this->Form->input('username', ['type' => 'text']) ?>
		        <?= $this->Form->input('password', ['type' => 'password']) ?>
		    </fieldset>
			<?= $this->Form->button(__('Login')); ?>
			<?= $this->Form->end() ?>
		</div>
		
	</div>
</div>

