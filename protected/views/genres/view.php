<?php
/* @var $this GenresController */
/* @var $model Genres */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->GENREID,
);

$this->menu=array(
	array('label'=>'List Genres', 'url'=>array('index')),
	array('label'=>'Create Genres', 'url'=>array('create')),
	array('label'=>'Update Genres', 'url'=>array('update', 'id'=>$model->GENREID)),
	array('label'=>'Delete Genres', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->GENREID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Genres', 'url'=>array('admin')),
);
?>

<h1>View Genres #<?php echo $model->GENREID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GENREID',
		'GENRENAME',
		'DESCRIPTION',
		'IMAGEPATH',
	),
)); ?>
