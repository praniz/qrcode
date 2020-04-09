<?php
Yii::app()->clientScript->registerCoreScript('jquery');
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idqr_type')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idqr_type), array('view', 'id'=>$data->idqr_type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('check_img')); ?>:</b>
	<?php echo CHtml::encode($data->check_img); ?>
	<br />


</div>