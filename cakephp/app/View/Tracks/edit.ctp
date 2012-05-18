<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Form->create('Track', array('type' => 'put', 'class' => 'form-horizontal')); ?>
			<fieldset>
				<legend>Edit Track on <i><?php echo $this->Html->link($album['Album']['a_Title'], array('controller' => 'albums', 'action' => 'view', $track['Track']['t_AlbumID'])) ?></i></legend>
				<?php echo $this->Form->input('t_TrackID', array('type' => 'hidden')); ?>
				<?php echo $this->TB->input('t_DiskNumber', array(
					'type' => 'text',
					'pattern' => '[0-9]*',
					'label' => 'Disc',
					'class' => 'input-large'
				)); ?>
				<?php echo $this->TB->input('t_TrackNumber', array(
					'type' => 'text',
					'pattern' => '[0-9]*',
					'label' => '#',
					'class' => 'input-large'
				)); ?>
				<?php echo $this->TB->input('t_Title', array(
					'label' => 'Track Name',
					'class' => 'input-large'
				)); ?>
				<?php echo $this->TB->input('t_Artist', array(
					'label' => 'Artist',
					'class' => 'input-large'
				)); ?>
				<?php echo $this->TB->input('t_Duration', array(
					'type' => 'text',
					'pattern' => '[0-9]*',
					'label' => 'Duration (seconds)',
					'class' => 'input-large'
				)); ?>
				<div class="form-actions">
					<?php echo $this->TB->button('Save Track', array('style' => 'primary')); ?>
					<?php echo $this->Html->link('Cancel', $this->request->referer(), array('class' => 'btn')); ?>
				</div>
			</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

