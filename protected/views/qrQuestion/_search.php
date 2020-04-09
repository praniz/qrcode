<?php
/* @var $this QrQuestionController */
/* @var $model QrQuestion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idqr_question'); ?>
		<?php echo $form->textField($model,'idqr_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seq'); ?>
		<?php echo $form->textField($model,'seq'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idqr_question_set'); ?>
		<?php echo $form->textField($model,'idqr_question_set'); ?>
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