<?php
 $path = Yii::app()->request->baseUrl;


?>

<div class="header-admin">

<ol class="breadcrumb">

  <li><a href="<?php echo $path ?>/qrQuestionSet/view?id=<?php echo $model1->idqr_question ?>">จัดการคำถาม</a></li>
  <li class="active">จัดการคำตอบ <?php echo $model->idqr_answer ?></li>
</ol>

</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model1,
	'attributes'=>array(
		'title',
		'idqr_type',
		/*'idqr_question',*/
	),
)); ?>
