<?php
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="form-admin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-question-set-form',
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
		<div class="col-md-2"><?php echo $form->labelEx($model,'insert_name'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'insert_name',array('size'=>20,'maxlength'=>20)); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'insert_name'); ?></div>
	</div>

	<div class="row">

		<div class="col-md-2"><?php echo $form->labelEx($model,'insert_date'); ?></div>
		<div class="col-md-4"><p><?php echo date("Y-m-d"); ?></p></div>
		<div class="col-md-6"><?php echo $form->error($model,'insert_date'); ?></div>
	</div>
<input name="QrQuestionSet[insert_date]"  type="hidden" 
 value="<?php echo date("Y-m-d"); ?>"/>
<input name="QrQuestionSet[use_yn]"  type="hidden" 
	value="1">
	
<?php 
$stamp = date("Ymdhis");
$ip = $_SERVER['REMOTE_ADDR'];
$orderid = "$stamp-$ip";
$orderid = str_replace(".", "", "$orderid");
?>
	<div class="row">
	
		 <div class="col-md-2"><?php echo $form->labelEx($model,'qrcode'); ?></div>
		<div class="col-md-4">
		<p><?= $orderid ?>
		<input name="QrQuestionSet[qrcode]"  type="hidden" 
	value="<?= $orderid ?>">
	</p>
	</div>
		<div class="col-md-6"><?php echo $form->error($model,'qrcode'); ?></div>
	</div>

	<div class="row center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->