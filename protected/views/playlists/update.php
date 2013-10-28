<?php
/* @var $this PlaylistsController */
/* @var $model Playlists */

$this->breadcrumbs=array(
	'Playlists'=>array('index'),
	$model->PLID=>array('view','id'=>$model->PLID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Playlists', 'url'=>array('index')),
	array('label'=>'Create Playlists', 'url'=>array('create')),
	array('label'=>'View Playlists', 'url'=>array('view', 'id'=>$model->PLID)),
	array('label'=>'Manage Playlists', 'url'=>array('admin')),
);
?>

<h1>Update Playlists <?php echo $model->PLID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>