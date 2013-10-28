<?php
/* @var $this SongsController */
/* @var $model Songs */

$this->breadcrumbs=array(
	'Songs'=>array('index'),
	$model->TITLE=>array('view','id'=>$model->SONGID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Songs', 'url'=>array('index')),
	array('label'=>'Create Songs', 'url'=>array('create')),
	array('label'=>'View Songs', 'url'=>array('view', 'id'=>$model->SONGID)),
	array('label'=>'Manage Songs', 'url'=>array('admin')),
);
?>

<h1>Update Songs <?php echo $model->SONGID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>