<?php
/* @var $this PlaylistsController */
/* @var $data Playlists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('plid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->plid), array('view', 'id'=>$data->plid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('plref')); ?>:</b>
	<?php echo CHtml::encode($data->PLREF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pltitle')); ?>:</b>
	<?php echo CHtml::encode($data->PLTITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagepath')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEPATH); ?>
	<br />


</div>