<?php
/* @var $this QrAnswerController */
/* @var $model QrAnswer */
/* @var $form CActiveForm */
?>

<div class="form-admin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-answer-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note-admin">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'answer'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'answer',array('size'=>45,'maxlength'=>45)); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'answer'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'idqr_question'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'idqr_question'); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'idqr_question'); ?></div>
	</div>

	<div class="row center">
		 <?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?> 
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->