<?php
/* @var $this BandsController */
/* @var $data Bands */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANDID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->BANDID), array('view', 'id'=>$data->BANDID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BANDNAME')); ?>:</b>
	<?php echo CHtml::encode($data->BANDNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEPATH')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEPATH); ?>
	<br />


</div>