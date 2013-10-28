<?php
/* @var $this BandsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bands',
);

$this->menu=array(
	array('label'=>'Create Bands', 'url'=>array('create')),
	array('label'=>'Manage Bands', 'url'=>array('admin')),
);
?>

<h1>Bands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
