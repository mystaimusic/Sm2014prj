<?php
/* @var $this TagsController */
/* @var $model Tags */

$this->breadcrumbs=array(
	'Tags'=>array('index'),
	$model->TAGID=>array('view','id'=>$model->TAGID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tags', 'url'=>array('index')),
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'View Tags', 'url'=>array('view', 'id'=>$model->TAGID)),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
?>

<h1>Update Tags <?php echo $model->TAGID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>