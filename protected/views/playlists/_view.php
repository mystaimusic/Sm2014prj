<?php
/* @var $this PlaylistsController */
/* @var $data Playlists */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PLID), array('view', 'id'=>$data->PLID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLREF')); ?>:</b>
	<?php echo CHtml::encode($data->PLREF); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PLTITLE')); ?>:</b>
	<?php echo CHtml::encode($data->PLTITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEPATH')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEPATH); ?>
	<br />


</div>