<?php
/* @var $this PlaylistsController */
/* @var $model Playlists */

$this->breadcrumbs=array(
	'Playlists'=>array('index'),
	$model->PLID,
);

$this->menu=array(
	array('label'=>'List Playlists', 'url'=>array('index')),
	array('label'=>'Create Playlists', 'url'=>array('create')),
	array('label'=>'Update Playlists', 'url'=>array('update', 'id'=>$model->PLID)),
	array('label'=>'Delete Playlists', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PLID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Playlists', 'url'=>array('admin')),
);
?>

<h1>View Playlists #<?php echo $model->PLID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PLID',
		'PLREF',
		'PLTITLE',
		'DESCRIPTION',
		'IMAGEPATH',
	),
)); ?>
