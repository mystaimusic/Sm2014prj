<?php
/* @var $this TagsController */
/* @var $data Tags */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAGID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TAGID), array('view', 'id'=>$data->TAGID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TAGNAME')); ?>:</b>
	<?php echo CHtml::encode($data->TAGNAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEPATH')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEPATH); ?>
	<br />


</div>