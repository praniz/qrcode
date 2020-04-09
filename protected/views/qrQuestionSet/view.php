<?php

 $path = Yii::app()->request->baseUrl;

?>

<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrQuestionSet/admin">จัดการชุดแบบประเมิน</a></li>
  <li class="active"><?php echo $model->idqr_question_set ?></li>
</ol>

</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	/*	'idqr_question_set',*/
		'title',
		'insert_name',
		'insert_date',
	/*	'use_yn',*/
	/*	'qrcode',*/
	),
)); ?>

<div class="detail-view">
<a data-toggle="modal" href="#qrQuestionCreate"  class="btn btn-primary">สร้างคำถาม</a>
<a href="<?php echo $path ?>/qrQuestionSet/preview?id=<?php echo $model->idqr_question_set ?>"  class="btn btn-primary">แสดงตัวอย่าง</a>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-question-grid',
	'dataProvider'=>$model1->search(),
	//'filter'=>$model1,

	'columns'=>array(
		'idqr_question',
		'title',
		'seq',
		/*'idqr_question_set',*/
		'ans_type',
		       array(
                'class' => 'CButtonColumn',
                'template' => '{ans} {update} {delete} ',
                'buttons'=>array(
                        'ans' => array(
                                //'label'=>'Copy', // text label of the button
                                'url'=>"CHtml::normalizeUrl(array('QrAnswer/admin', 'id'=>\$data->idqr_question))",
                             /*  'url'=>"qrAnswer/admin",*/
                                'imageUrl'=>'/qrcode/assets/c4e814f4/gridview/view.png',  // image URL of the button. If not set or false, a text link is used
                             //   'options' => array('class'=>'ans'), // HTML options for the button
                        ),
                          'update' => array(
                                //'label'=>'Copy', // text label of the button
                                'url'=>"CHtml::normalizeUrl(array('QrQuestion/update', 'id'=>\$data->idqr_question))",
                             /*  'url'=>"qrAnswer/admin",*/
                                'imageUrl'=>'/qrcode/assets/c4e814f4/gridview/update.png',  // image URL of the button. If not set or false, a text link is used
                             //   'options' => array('class'=>'ans'), // HTML options for the button
                        ),
                         'delete' => array(
                              
                                'url'=>"CHtml::normalizeUrl(array('QrQuestion/delete', 'id'=>\$data->idqr_question,'idM'=>\$data->idqr_question_set))",
                            
                        ),
                ),
        ),
	),
)); ?>
</div>

<!-- MODEL -->

 <div class="modal fade" id="qrQuestionCreate" role="dialog">
    <div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
   <button type="button" class="close" data-dismiss="modal">X</button>
        </div>
        <div class="modal-body">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'qr-question-form',
	'action'=>Yii::app()->createUrl('qrQuestion/create'),
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note-admin">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model2); ?>

	<div class="row">
		<div class="col-md-4"><?php echo $form->labelEx($model2,'title'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model2,'title',array('size'=>45,'maxlength'=>45)); ?></div>
		<div class="col-md-3"><?php echo $form->error($model2,'title'); ?></div>
	</div>

	<div class="row">
		<div class="col-md-4"><?php echo $form->labelEx($model2,'seq'); ?></div>
		<div class="col-md-4"><?php echo $form->textField($model2,'seq'); ?></div>
		<div class="col-md-3"><?php echo $form->error($model2,'seq'); ?></div>
	</div>
<input name="QrQuestion[idqr_question_set]" id="QrQuestion_idqr_question_set" type="hidden" value="<?php echo $model->idqr_question_set ?>">
	<!--<div class="row">
		<div class="col-md-4"> echo $form->labelEx($model2,'idqr_question_set'); ?></div>
		<div class="col-md-4">
		  echo $form->dropDownList(
        $model2,
        'idqr_question_set',
        CHtml::listData(QrQuestionSet::model()->findAll('use_yn > 0'),'idqr_question_set','title')
		); ?> 
		 echo $form->textField($model2,'idqr_question_set'); ?>


		</div>
		<div class="col-md-3">
		 echo $form->error($model2,'idqr_question_set'); ?>
		</div>
	</div>-->

	<div class="row">
		<div class="col-md-4"><?php echo $form->labelEx($model2,'ans_type'); ?></div>
		<div class="col-md-4">
	<?php echo $form->dropDownList(
        $model2,
        'ans_type',
        CHtml::listData(QrType::model()->findAll('idqr_type > 1'),'name','name')
	); ?>

		</div>
		<div class="col-md-3">
		<?php echo $form->error($model2,'ans_type'); ?>
		</div>
		   <div class="row center">
	<?php echo CHtml::submitButton($model2->isNewRecord ? 'สร้าง' : 'แก้ไข'); ?>
	
	</div>
	</div>

	
<?php $this->endWidget(); ?>
</div>

 </div>

  </div>
</div>