<?php
/* @var $this QrAnswerController */
/* @var $model QrAnswer */

$this->breadcrumbs=array(
	'Qr Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QrAnswer', 'url'=>array('index')),
	array('label'=>'Manage QrAnswer', 'url'=>array('admin')),
);
?>

<h1>Create QrAnswer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>