<?php
/* @var $this QrQuestionController */
/* @var $model QrQuestion */

$this->breadcrumbs=array(
	'Qr Questions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List QrQuestion', 'url'=>array('index')),
	array('label'=>'Create QrQuestion', 'url'=>array('create')),
	array('label'=>'Update QrQuestion', 'url'=>array('update', 'id'=>$model->idqr_question)),
	array('label'=>'Delete QrQuestion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idqr_question),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QrQuestion', 'url'=>array('admin')),
);
?>

<h1>View QrQuestion #<?php echo $model->idqr_question; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idqr_question',
		'title',
		'seq',
		'idqr_question_set',
		'ans_type',
	),
)); ?>
