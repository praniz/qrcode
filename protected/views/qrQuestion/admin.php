<?php

 $path = Yii::app()->request->baseUrl;


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qr-question-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="header-admin">
<p>
	หน้าสร้างคำถาม
</p>
</div>
<a href="<?php echo $path ?>/qrQuestion/create"  class="btn btn-primary">สร้าง</a>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-question-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idqr_question',
		'title',
		'seq',
		'idqr_question_set',
		'idqr_type',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
