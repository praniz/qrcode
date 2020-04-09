<?php
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="form-admin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note-admin">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'title'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'title'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'seq'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'seq'); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'seq'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'idqr_question_set'); ?></div>
		<div class="col-md-4">
		<?php echo $form->dropDownList(
        $model,
        'idqr_question_set',
        CHtml::listData(QrQuestionSet::model()->findAll('use_yn > 0'),'idqr_question_set','title')
		); ?>



		</div>
		<div class="col-md-6">
		<?php echo $form->error($model,'idqr_question_set'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'ans_type'); ?></div>
		<div class="col-md-4">
<?php echo $form->dropDownList(
        $model,
        'ans_type',
        CHtml::listData(QrType::model()->findAll('idqr_type > 1'),'name','name')
); ?>

		</div>
		<div class="col-md-6">
		<?php echo $form->error($model,'ans_type'); ?>
		</div>
	</div>

	<div class="row center">
	<?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?>
	
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->