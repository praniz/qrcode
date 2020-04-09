<?php
$path = Yii::app()->request->baseUrl;

?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrQuestionSet/admin">จัดการชุดแบบประเมิน</a></li>
  <li class="active">สร้างแบบประเมิน</li>
</ol>

</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>