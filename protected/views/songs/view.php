<?php
/* @var $this SongsController */
/* @var $model Songs */

$this->breadcrumbs=array(
	'Songs'=>array('index'),
	$model->TITLE,
);

$this->menu=array(
	array('label'=>'List Songs', 'url'=>array('index')),
	array('label'=>'Create Songs', 'url'=>array('create')),
	array('label'=>'Update Songs', 'url'=>array('update', 'id'=>$model->SONGID)),
	array('label'=>'Delete Songs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SONGID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Songs', 'url'=>array('admin')),
);
?>

<h1>View Songs #<?php echo $model->SONGID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SONGID',
		'WEBSITE',
		'BANDID',
		'CODE',
		'TITLE',
		'DESCRIPTION',
	),
)); ?>
