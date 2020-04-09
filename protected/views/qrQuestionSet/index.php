<?php
/* @var $this QrQuestionSetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Qr Question Sets',
);

$this->menu=array(
	array('label'=>'Create QrQuestionSet', 'url'=>array('create')),
	array('label'=>'Manage QrQuestionSet', 'url'=>array('admin')),
);
?>

<h1>Qr Question Sets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
