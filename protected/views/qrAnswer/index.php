<?php
/* @var $this QrAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qr Answers',
);

$this->menu=array(
	array('label'=>'Create QrAnswer', 'url'=>array('create')),
	array('label'=>'Manage QrAnswer', 'url'=>array('admin')),
);
?>

<h1>Qr Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
