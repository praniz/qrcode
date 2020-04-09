<?php
Yii::app()->clientScript->registerCoreScript('jquery');
 $path = Yii::app()->request->baseUrl;
  $pathImg = Yii::app()->theme->baseUrl . '/assets/images';
?>

<img class="img-max" src="<?php echo $pathImg ?>/<?php echo $pic['image'] ?>">