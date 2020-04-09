<?php
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="form-admin">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-type-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note-admin">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'name'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'name'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-2"><?php echo $form->labelEx($model,'desc'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'desc',array('size'=>25,'maxlength'=>45)); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'desc'); ?></div>
	</div>

	<div class="row" <?php if($model->idqr_type){ ?> style="display: none;" <? } ?> />
		<div class="col-md-2"><?php echo $form->labelEx($model,'type'); ?></div>

		<div class="col-md-4">
		<?php echo $form->dropDownList(
        $model,
        'type',
        CHtml::listData(QrType::model()->findAll('idqr_type > 0'),'type','type')
		); ?>
			
		<input type="text" id= "type_type" name="QrType[type]" style="display: none;">
		</div>
		<div class="col-md-6"><?php echo $form->error($model,'type'); ?></div>
	</div>

	<div class="row" style="display: none;">
		<div class="col-md-2"><?php echo $form->labelEx($model,'check_img'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model,'check_img'); ?></div>
		<div class="col-md-6"><?php echo $form->error($model,'check_img'); ?></div>
	</div>

	<div class="row center">
	
		 <?php echo CHtml::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?> 
	
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
$("#QrType_type").change(function(){  
if($("#QrType_type").val() == 'P'){
   $("#type_type").css("display","");
}

}
);

</script>