<?php
/* @var $this QrTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qr Types',
);

$this->menu=array(
	array('label'=>'Create QrType', 'url'=>array('create')),
	array('label'=>'Manage QrType', 'url'=>array('admin')),
);
?>

<h1>Qr Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
