<?php
/* @var $this QrQuestionSetController */
/* @var $data QrQuestionSet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_question_set')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idqr_question_set), array('view', 'id'=>$data->idqr_question_set)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_name')); ?>:</b>
	<?php echo CHtml::encode($data->insert_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('use_yn')); ?>:</b>
	<?php echo CHtml::encode($data->use_yn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qrcode')); ?>:</b>
	<?php echo CHtml::encode($data->qrcode); ?>
	<br />


</div>