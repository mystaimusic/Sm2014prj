<?php
/* @var $this GenresController */
/* @var $model Genres */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->GENREID=>array('view','id'=>$model->GENREID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Genres', 'url'=>array('index')),
	array('label'=>'Create Genres', 'url'=>array('create')),
	array('label'=>'View Genres', 'url'=>array('view', 'id'=>$model->GENREID)),
	array('label'=>'Manage Genres', 'url'=>array('admin')),
);
?>

<h1>Update Genres <?php echo $model->GENREID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>