<?php
 $path = Yii::app()->request->baseUrl;

?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrType/admin">จัดการรูปแบบ</a></li>
  <li class="active">สร้างรูปแบบ</li>
</ol>

</div>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>