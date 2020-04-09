<?php 
$pathTheme = Yii::app()->theme->baseUrl . '/assets';
$directoryView = Yii::app()->theme->baseUrl . '/views';
$pathImg = Yii::app()->theme->baseUrl . '/assets/images';

$session=new CHttpSession;
$session->open();

$path = Yii::app()->request->baseUrl;
/*Yii::app()->clientScript->registerCoreScript('jquery');*/

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="keywords" content="ทำเว็บไซต์, Praniz" />  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="en">

 <!-- Bootstrap -->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body>


<div class="container">
  <div class="page bg-white">
 <!--  if(Yii::app()->user->getState('isRule') == '1' ) { ?> -->
  <?php Yii::import('application.views.*');
    require_once('site/header.php'); ?>

<!--      } ?> -->
  <?php echo $content; ?>

   <?php Yii::import('application.views.*');
    require_once('site/footer.php'); ?>
  </div>
  </div>

 



</body>

  



</html>
