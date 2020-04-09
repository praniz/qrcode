<?php
 $path = Yii::app()->request->baseUrl;

?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrTypeDetail/admin">จัดการรูปภาพ</a></li>
  <li class="active">เพิ่มรูปภาพ</li>
</ol>

</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>