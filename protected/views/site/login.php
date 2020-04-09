<?php $pathTheme = Yii::app()->theme->baseUrl . '/assets';
$directoryView = Yii::app()->theme->baseUrl . '/views';
$session=new CHttpSession;
$session->open();
$http = new CHttpRequest;
Yii::app()->user->returnUrl=$http->getUrl();
Yii::app()->clientScript->registerCoreScript('jquery.ui');
 ?>
 <div class="form" align="center">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<br><br>
<div class="container">
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
</div>
	<div class="row rememberMe">
		<?php echo CHtml::submitButton('Login'); ?>
		</div>

	</div>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->
 