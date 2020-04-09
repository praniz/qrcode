<?php

$path = Yii::app()->request->baseUrl;


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qr-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>


<div class="header-admin">
<p>
หน้าจัดการรูปแบบการประเมิน รูปแบบที่จะใช้ในคำถามแต่ละข้อ จะกำหนดจากหน้านี้
</p>
</div>

<a href="<?php echo $path ?>/qrType/create"  class="btn btn-primary">สร้าง</a>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idqr_type',
		'name',
		'desc',
		'type',
		/*'check_img',*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
