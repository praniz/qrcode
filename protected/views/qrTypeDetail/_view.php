<?php
/* @var $this QrTypeDetailController */
/* @var $data QrTypeDetail */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_type_detail')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idqr_type_detail), array('view', 'id'=>$data->idqr_type_detail)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
	<?php echo CHtml::encode($data->image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_type')); ?>:</b>
	<?php echo CHtml::encode($data->value_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ans_type')); ?>:</b>
	<?php echo CHtml::encode($data->ans_type); ?>
	<br />


</div>