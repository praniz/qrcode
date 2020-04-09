<?php
 $path = Yii::app()->request->baseUrl;


?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrType/admin">จัดการรูปแบบ</a></li>
  <li class="active">แก้ไขรูปแบบ <?php echo $model->idqr_type ?></li>
</ol>

</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>