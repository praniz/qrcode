<?php
/* @var $this QrQuestionSetController */
/* @var $model QrQuestionSet */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idqr_question_set'); ?>
		<?php echo $form->textField($model,'idqr_question_set'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insert_name'); ?>
		<?php echo $form->textField($model,'insert_name',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'insert_date'); ?>
		<?php echo $form->textField($model,'insert_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'use_yn'); ?>
		<?php echo $form->textField($model,'use_yn'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qrcode'); ?>
		<?php echo $form->textField($model,'qrcode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->