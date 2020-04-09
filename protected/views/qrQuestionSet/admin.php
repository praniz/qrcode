<?php
/* @var $this QrQuestionSetController */
/* @var $model QrQuestionSet */
 $path = Yii::app()->request->baseUrl;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#qr-question-set-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<style type="text/css">


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #ffffff;
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 200px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<div class="header-admin">
<p>
	จัดการชุดแบบประเมิน
</p>
</div>
<?php if (Yii::app()->user->getState('isRule') == '1') { ?>
<a href="<?php echo $path ?>/qrQuestionSet/create"  class="btn btn-primary">สร้าง</a>

<?php } ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'qr-question-set-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idqr_question_set',
		'title',
		'insert_name',
		'insert_date',
		'use_yn',
		'qrcode',
		array(
			'class'=>'CButtonColumn',
			'template' => '{qrcode} {view} {update} {delete} ',
			'buttons'=>array(
                        'qrcode' => array(
                        	   'label'=>'<i class="fa fa-qrcode"></i>',
                                'imageUrl'=>false,   
                               'click' => "function(){
                               	var title = $(this).parent().parent().children(':nth-child(2)').text();
                               	var img = $(this).parent().parent().children(':nth-child(6)').text();
								modal.style.display = 'block';
								modalImg.src = '/qrcode/images/uploads/'+img+'.png';
								captionText.innerHTML = title;
								}",
                              
                            /*  'click'=>'js:function(){alert($(this).parent().parent().children(":nth-child(2)").text());return false;}'*/

                        	 ),
                        'view' => array(
                        	   'label'=>'<i class="fa fa-search"></i>',
                                        'imageUrl'=>false,
                        	 ),
                        'update' => array(
                        	   'label'=>'<i class="fa fa-pencil-square-o"></i>',
                                        'imageUrl'=>false,
                        	 ),
                        'delete' => array(
                        	   'label'=>'<i class="fa fa-times-circle-o"></i>',
                                        'imageUrl'=>false,
                        	 ),
                         ),
		),
	),
)); ?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content img-qrcode" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script type="text/javascript">
	
	// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption

var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>



