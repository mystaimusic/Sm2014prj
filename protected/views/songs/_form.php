<?php
/* @var $this SongsController */
/* @var $model Songs */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'songs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'WEBSITE'); ?>
		<?php echo $form->textField($model,'WEBSITE',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'WEBSITE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BANDID'); ?>
		<?php echo $form->textField($model,'BANDID',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'BANDID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CODE'); ?>
		<?php echo $form->textField($model,'CODE',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'CODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TITLE'); ?>
		<?php echo $form->textField($model,'TITLE',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DESCRIPTION'); ?>
		<?php echo $form->textField($model,'DESCRIPTION',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'DESCRIPTION'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->