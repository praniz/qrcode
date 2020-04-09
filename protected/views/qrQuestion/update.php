<?php
/* @var $this QrQuestionController */
/* @var $model QrQuestion */

$this->breadcrumbs=array(
	'Qr Questions'=>array('index'),
	$model->title=>array('view','id'=>$model->idqr_question),
	'Update',
);

$this->menu=array(
	array('label'=>'List QrQuestion', 'url'=>array('index')),
	array('label'=>'Create QrQuestion', 'url'=>array('create')),
	array('label'=>'View QrQuestion', 'url'=>array('view', 'id'=>$model->idqr_question)),
	array('label'=>'Manage QrQuestion', 'url'=>array('admin')),
);
?>

<h1>Update QrQuestion <?php echo $model->idqr_question; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>