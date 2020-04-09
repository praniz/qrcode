<?php
Yii::app()->clientScript->registerCoreScript('jquery');
 $path = Yii::app()->request->baseUrl;
  $pathImg = Yii::app()->theme->baseUrl . '/assets/images';
?>
<div class="header-admin">

<ol class="breadcrumb">
  <li><a href="<?php echo $path ?>/qrType/admin">จัดการรูปแบบ</a></li>
  <li class="active"><?php echo $model->idqr_type ?></li>
</ol>

</div>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idqr_type',
		'name',
		'desc',
		'type',
		//'check_img',
	),
)); ?>

<?php if ($model->type == 'RT1'): ?>
	

<div class="detail-view pos-edit">
<p>คุณชอบสีแดงใช่หรือไม่</p>
 <label for="chkYes">
    <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" />
    ใช่
</label>
<br>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk" onclick="ShowHideDiv()" />
    ไม่ใช่
</label>
<div id="dvtext" style="display: none">
    แล้วชอบสีอะไร :
    <input type="text" id="txtBox" />
</div>
</div>
<?php endif ?>
<?php if ($model->type == 'RT2'): ?>
<div class="detail-view pos-edit">
<p>คุณชอบสีแดงใช่หรือไม่</p>
 <label for="chkYes">
    <input type="radio" id="chkYes" name="chk"  />
    ใช่
</label>
<br>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk"  />
    ไม่ใช่
</label>
<div id="dvtext" >
    แล้วชอบสีอะไร :
    <input type="text" id="txtBox" />
</div>
</div>
<?php endif ?>

<?php if ($model->type == 'R'): ?>
	<div class="detail-view pos-edit">
<p>คุณชอบสีอะไรมากที่สุด</p>
 <label for="chkYes">
    <input type="radio" id="chkYes" name="chk"  />
    แดง
</label>
<br>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk"  />
    น้ำเงิน
</label>
<br>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk"  />
    ม่วง
</label>
<br>
<label for="chkNo">
    <input type="radio" id="chkNo" name="chk"  />
    ฟ้า
</label>
</div>
<?php endif ?>

<?php if ($model->type == 'T'): ?>
<div class="detail-view pos-edit">
<p>คุณชอบสีอะไร</p>
 
    <input type="text" id="txtBox" />

</div>
<?php endif ?>

<?php if (strpos($model->type, 'P') !== false ): ?>
<div class="detail-view pos-edit">
<?php $modelPic = QrTypeDetail::model()->findAll("ans_type='".$model->type."'");
            foreach($modelPic as $pic):?> 
            <a href=""><img class="img-max" src="<?php echo $pathImg ?>/<?php echo $pic['image'] ?>"></a>
              <?php endforeach;?>
</div>
<?php endif ?>

<?php if ($model->type == 'C'): ?>
	<div class="detail-view pos-edit">
<p>คุณชอบสีอะไร</p>
 <label for="chkYes">
    <input type="checkbox" id="chkYes" name="chk"  />
    แดง
</label>
<br>
<label for="chkNo">
    <input type="checkbox" id="chkNo" name="chk"  />
    น้ำเงิน
</label>
<br>
<label for="chkNo">
    <input type="checkbox" id="chkNo" name="chk"  />
    ม่วง
</label>
<br>
<label for="chkNo">
    <input type="checkbox" id="chkNo" name="chk"  />
    ฟ้า
</label>
</div>
<?php endif ?>

<script type="text/javascript">
	
	function ShowHideDiv() {
        var chkNo = document.getElementById("chkNo");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkNo.checked ? "block" : "none";
    }
</script>