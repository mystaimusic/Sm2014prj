<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */


?>





















<div class="container">

<div id="maincont" class="clearfix">
	
    
<div id="mainleft">
<div class="mainleft_text">
<!-- <h1>Contattaci</h1>  -->
<!-- <h1><?php echo Yii::t('msg','Contattaci')?></h1> -->
<p>
<?php echo Yii::t('msg','Our staff is deployed in several countries, contact us for information and if you want to collaborate with us');?>
<br>
<!-- Il nostro staff &egrave; dislocato in diversi paesi, contattaci per informazioni e se vuoi collaborare con noi<br />  -->
<!--<strong>Contatto Spagna: <a href="mailto:barcelona@staimusic.com">barcelona@staimusic.com</a></strong><br />
<strong>Contatto Belgio: <a href="mailto:bruxelles@staimusic.com">bruxelles@staimusic.com</a></strong><br />
<strong>Contatto Italia: <a href="mailto:milano@staimusic.com">milano@staimusic.com</a></strong><br />-->
<strong><?php echo Yii::t('msg','Write us')?>: <a href="mailto:info@staimusic.com">info@staimusic.com</a></strong><br />
</p>
<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mappa.gif" border="0" alt="Staimusic" width="700px" height="auto">





<hr>

<p><?php echo Yii::t('msg','For any further information please don\'t hesitate to contact us using the following form')?></p>
<!--   <h2>Inviaci una mail attraverso la form</h2> -->
<p>


<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('msg','Fields with')?><span class="required">*</span><?php echo Yii::t('msg','are required')?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"><?php echo Yii::t('msg','Please enter the letters as they are shown in the image above.')?>
		<br/><?php echo Yii::t('msg','Letters are not case-sensitive.')?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</p>


</div><!--mainleft_text"-->		          
</div><!--mainleft-->




<div id="mainright">
       
</div><!--mainright-->





</div><!--maincont-->
</div><!--container-->
