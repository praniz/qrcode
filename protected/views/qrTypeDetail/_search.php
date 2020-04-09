<?php
/* @var $this QrTypeDetailController */
/* @var $model QrTypeDetail */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idqr_type_detail'); ?>
		<?php echo $form->textField($model,'idqr_type_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'value_type'); ?>
		<?php echo $form->textField($model,'value_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ans_type'); ?>
		<?php echo $form->textField($model,'ans_type',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->