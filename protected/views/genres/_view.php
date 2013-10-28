<?php
/* @var $this GenresController */
/* @var $data Genres */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENREID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->GENREID), array('view', 'id'=>$data->GENREID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENRENAME')); ?>:</b>
	<?php echo CHtml::encode($data->GENRENAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IMAGEPATH')); ?>:</b>
	<?php echo CHtml::encode($data->IMAGEPATH); ?>
	<br />


</div>