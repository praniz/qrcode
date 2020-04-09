<?php

 $path = Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qr-answer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrQuestionSet/view?id=<?php echo $model->idqr_question?>"/>จัดการชุดแบบประเมิน</a></li>
  <li class="active">สร้างคำตอบ</li>
</ol>

</div>
<div class="header-admin">
<p>
	หน้าสร้างคำตอบ
</p>
</div>
<a href="<?php echo $path ?>/qrAnswer/create"  class="btn btn-primary">สร้าง</a>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-answer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idqr_answer',
		'answer',
		'detail',
		/*'detail_check',*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
