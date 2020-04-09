<?php
/* @var $this QrTypeDetailController */
/* @var $model QrTypeDetail */
/* @var $form CActiveForm */
?>

<div class="form-admin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-type-detail-form',
	'htmlOptions' => array('enctype' => 'multipart/form-data'), // upload img
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note-admin">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
	<div class="col-md-3 col-sm-6"><?php echo $form->labelEx($model,'image'); ?></div>
	<?php echo CHtml::form('','post',array('enctype'=>'multipart/form-data')); ?>
	<?php echo CHtml::activeFileField($model, 'image'); ?>
	<?php if($model) {?>
	<p><?= $model->image ?></p>
	<?php }?>
	</div>

	<div class="row">
		<div class="col-md-3 col-sm-6"><?php echo $form->labelEx($model,'value_type'); ?></div>
		<div class="col-md-3 col-sm-6"><?php echo $form->textField($model,'value_type'); ?></div>
		<div class="col-md-3 col-sm-6"><?php echo $form->error($model,'value_type'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-3 col-sm-6">
			<?php echo $form->labelEx($model,'ans_type'); ?>
		</div>
		<div class="col-md-3 col-sm-6">
			<?php echo $form->dropDownList(
        $model,
        'ans_type',
        CHtml::listData(QrType::model()->findAll('type LIKE "P%"'),'type','name')
		); ?>
		</div>
			<?php echo $form->error($model,'ans_type'); ?>
	</div>
	<div class="row center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->