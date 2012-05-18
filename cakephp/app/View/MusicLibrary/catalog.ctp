<?php // $this->start('subNavLinks'); ?>
	<?php // echo $this->element('subnav/musiclibrary'); ?>
<?php // $this->end(); ?>

<div class="row-fluid">
	<div class="span2">
		<div class="btn-group">
			<a class="btn dropdown-toggle input-block-level" data-toggle="dropdown" href="#">Add Music <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><?php echo $this->Html->link('Import From iTunes', array('controller' => 'itunes', 'action' => 'search')); ?></li>
				<li><?php echo $this->Html->link('Add Manually', array('controller' => 'albums', 'action' => 'add')); ?></li>
			</ul>
		</div>
		<div class="well sidebar-nav">
			<!-- <ul class="nav nav-list">
				<li><?php echo $this->Html->link('All Music', array('controller' => 'musiclibrary', 'action' => 'show', 'all')); ?></li>
				<li><?php echo $this->Html->link('Recently Added', array('controller' => 'musiclibrary', 'action' => 'show', 'recentlyadded')); ?></li>
				<li><?php echo $this->Html->link('Recently Played', array('controller' => 'musiclibrary', 'action' => 'show', 'recentlyplayed')); ?></li>
				<li><?php echo $this->Html->link('Flagged', array('controller' => 'musiclibrary', 'action' => 'show', 'flagged')); ?></li>
			</ul> -->
			<?php echo $this->Form->create(false, array('type' => 'get')); ?>
				<fieldset>
					<?php echo $this->TB->input('filter', array(
						'label' => false,
						'type' => 'text',
						'class' => 'input-block-level',
						'placeholder' => 'Filter'
					)); ?>
					<?php echo $this->TB->input('genre', array(
						'label' => false,
						'class' => 'input-block-level',
						'options' => $genres,
						'multiple' => true,
						'empty' => true,
						'style' => 'height: 200px'
					)); ?>
				</fieldset>
				<div class="form-actions">
					<?php echo $this->TB->button('Filter'); ?>
				</div>
			<?php echo $this->Form->end(); ?>
			
		</div>
	</div>
	<div class="span10">
		<table class="table table-condensed">
			<thead>
				<tr>
					<th></th>
					<th>Album</th>
					<th>Artist</th>
					<th>Genre</th>
					<th>Added</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($albums as $album): ?>
					<tr>
						<td><?php echo $this->Html->image($album['Album']['a_AlbumArt'] ? $album['Album']['a_AlbumArt'] : 'album.png', array('class' => 'album-art')); ?></td>
						<td><?php echo $this->Html->link($album['Album']['a_Title'], array('controller' => 'albums', 'action' => 'view', $album['Album']['a_AlbumID'])); ?></td>
						<td><?php echo ($album['Album']['a_Compilation'] ? 'Various Artists' : $album['Album']['a_Artist']); ?></td>
						<td><?php if (isset($album['Genre']['g_Name'])): ?><span class="label label-info"><?php echo ($album['Genre']['g_Name']); ?></span><?php endif; ?></td>
						<td><?php echo $this->Time->format('n/j/Y', $album['Album']['a_AddDate']); ?></td>
						<td style="white-space: nowrap">
							<div class="btn-group pull-right">
								<?php echo $this->Html->link($this->TB->icon('pencil'), array('controller' => 'albums', 'action' => 'edit', $album['Album']['a_AlbumID']), array('class' => 'btn btn-mini', 'escape' => false)); ?>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>