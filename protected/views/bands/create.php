<?php
/* @var $this BandsController */
/* @var $model Bands */

$this->breadcrumbs=array(
	'Bands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bands', 'url'=>array('index')),
	array('label'=>'Manage Bands', 'url'=>array('admin')),
);
?>

<h1>Create Bands</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>