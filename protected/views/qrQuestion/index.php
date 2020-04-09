<?php
/* @var $this QrQuestionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qr Questions',
);

$this->menu=array(
	array('label'=>'Create QrQuestion', 'url'=>array('create')),
	array('label'=>'Manage QrQuestion', 'url'=>array('admin')),
);
?>

<h1>Qr Questions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
