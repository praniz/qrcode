<?php
/* @var $this QrAnswerController */
/* @var $data QrAnswer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_answer')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idqr_answer), array('view', 'id'=>$data->idqr_answer)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer')); ?>:</b>
	<?php echo CHtml::encode($data->answer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_question')); ?>:</b>
	<?php echo CHtml::encode($data->idqr_question); ?>
	<br />


</div>