<?php
/* @var $this BandsController */
/* @var $model Bands */

$this->breadcrumbs=array(
	'Bands'=>array('index'),
	$model->BANDID=>array('view','id'=>$model->BANDID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bands', 'url'=>array('index')),
	array('label'=>'Create Bands', 'url'=>array('create')),
	array('label'=>'View Bands', 'url'=>array('view', 'id'=>$model->BANDID)),
	array('label'=>'Manage Bands', 'url'=>array('admin')),
);
?>

<h1>Update Bands <?php echo $model->BANDID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>