<?php
/* @var $this SongsController */
/* @var $data Songs */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SONGID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SONGID), array('view', 'id'=>$data->SONGID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('WEBSITE')); ?>:</b>
	<?php echo CHtml::encode($data->WEBSITE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANDID')); ?>:</b>
	<?php echo CHtml::encode($data->BANDID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODE')); ?>:</b>
	<?php echo CHtml::encode($data->CODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />


</div>