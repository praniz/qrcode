<?php

 $path = Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qr-type-detail-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="header-admin">
<p>
	หน้าจัดการรูปภาพ ที่จะใช้ในการประเมินของรูปแบบรูปภาพ
</p>
</div>
<a href="<?php echo $path ?>/qrTypeDetail/create"  class="btn btn-primary">สร้าง</a>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-type-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idqr_type_detail',
		'image',
		/*'idqr_type',*/
		'value_type',
		'ans_type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
