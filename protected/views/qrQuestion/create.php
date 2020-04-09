<?php
 $path = Yii::app()->request->baseUrl;


?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrQuestion/admin">หน้าสร้างคำถาม</a></li>
  <li class="active">สร้างคำถาม</li>
</ol>

</div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>