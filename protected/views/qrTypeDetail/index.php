<?php
/* @var $this QrTypeDetailController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qr Type Details',
);

$this->menu=array(
	array('label'=>'Create QrTypeDetail', 'url'=>array('create')),
	array('label'=>'Manage QrTypeDetail', 'url'=>array('admin')),
);
?>

<h1>Qr Type Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
