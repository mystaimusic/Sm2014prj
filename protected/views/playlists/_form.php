<?php
/* @var $this PlaylistsController */
/* @var $model Playlists */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'playlists-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PLREF'); ?>
		<?php echo $form->textField($model,'PLREF',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'PLREF'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PLTITLE'); ?>
		<?php echo $form->textField($model,'PLTITLE',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'PLTITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'DESCRIPTION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IMAGEPATH'); ?>
		<?php echo $form->textField($model,'IMAGEPATH',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'IMAGEPATH'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->