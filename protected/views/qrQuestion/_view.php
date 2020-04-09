<?php
/* @var $this QrQuestionController */
/* @var $data QrQuestion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_question')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idqr_question), array('view', 'id'=>$data->idqr_question)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seq')); ?>:</b>
	<?php echo CHtml::encode($data->seq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_question_set')); ?>:</b>
	<?php echo CHtml::encode($data->idqr_question_set); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ans_type')); ?>:</b>
	<?php echo CHtml::encode($data->ans_type); ?>
	<br />


</div>