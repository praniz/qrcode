<?php

$pathImg = Yii::app()->theme->baseUrl . '/assets/images';
 $path = Yii::app()->request->baseUrl;
//$pathImg = 'C:/MAMP/htdocs/qrcode/themes/frontend/assets/images';
?>
<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrTypeDetail/admin">จัดการรูปภาพ</a></li>
  <li class="active"><?php echo $model->idqr_type_detail ?></li>
</ol>

</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idqr_type_detail',
		'image',
		'idqr_type',
	),
)); ?>

<div class="view-img">
  <img src="<?php echo $pathImg.'/'.$model->image ?>" >
</div>

