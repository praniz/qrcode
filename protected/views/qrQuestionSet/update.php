<?php
 $path = Yii::app()->request->baseUrl;
?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrQuestionSet/admin">จัดการชุดแบบประเมิน</a></li>
  <li class="active">แก้ไขขุดแบบประเมิน <?php echo $model->idqr_question_set ?></li>
</ol>

</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>