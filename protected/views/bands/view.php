<?php
/* @var $this BandsController */
/* @var $model Bands */

$this->breadcrumbs=array(
	'Bands'=>array('index'),
	$model->BANDID,
);

$this->menu=array(
	array('label'=>'List Bands', 'url'=>array('index')),
	array('label'=>'Create Bands', 'url'=>array('create')),
	array('label'=>'Update Bands', 'url'=>array('update', 'id'=>$model->BANDID)),
	array('label'=>'Delete Bands', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->BANDID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bands', 'url'=>array('admin')),
);
?>

<h1>View Bands #<?php echo $model->BANDID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'BANDID',
		'BANDNAME',
		'DESCRIPTION',
		'IMAGEPATH',
	),
)); ?>
