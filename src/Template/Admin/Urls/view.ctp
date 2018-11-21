<?php
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('vamshop', 'URLs'), h($seoLiteUrl['SeoUrl']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('vamshop', 'URLs'), array('action' => 'index'));

?>
<h2 class="hidden-desktop"><?php echo __d('vamshop', 'URL'); ?></h2>

<div class="row-fluid">
	<div class="span12 actions">
		<ul class="nav-buttons">
		<li><?php echo $this->Html->link(__d('vamshop', 'Edit URL'), array('action' => 'edit', $seoLiteUrl['SeoUrl']['id']), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Form->postLink(__d('vamshop', 'Delete URL'), array('action' => 'delete', $seoLiteUrl['SeoUrl']['id']), array('button' => 'danger', 'escape' => true), __d('vamshop', 'Are you sure you want to delete # {0}?', $seoLiteUrl['SeoUrl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('vamshop', 'List URLs'), array('action' => 'index'), array('button' => 'default')); ?> </li>
		<li><?php echo $this->Html->link(__d('vamshop', 'New URL'), array('action' => 'add'), array('button' => 'success')); ?> </li>
		</ul>
	</div>
</div>

<div class="seoLiteUrls view">
	<dl class="inline">
		<dt><?php echo __d('vamshop', 'Id'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Url'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Description'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Status'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Created'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Created By'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['TrackableCreator']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Updated'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['SeoUrl']['updated']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('vamshop', 'Updated By'); ?></dt>
		<dd>
			<?php echo h($seoLiteUrl['TrackableUpdater']['username']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
