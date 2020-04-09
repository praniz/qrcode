
     <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/bootstrap.css">
    <!-- Links -->
    <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/camera.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/search.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/google-map.css">
  <!-- BBS -->
  <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/bbsCss.css">

  <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/li-scroller.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/jquery.fancybox.css">
 
  <link rel="stylesheet" type="text/css" href="<?php echo $pathTheme;?>/css/qrCode.css">
 <header>  
  <?php if (Yii::app()->user->getState('isRule')) { ?>
      <div id="stuck_container" class="stuck_container">
        <div class="container bgNav">   
        <nav class="navbar navbar-default navbar-static-top pull-left">            

            <div class="">  
              <ul class="nav navbar-nav sf-menu" data-type="navbar">
                <li>
                 <a href="<?php echo $path ?>/index">หน้าแรก</a>
               
                </li>
               <?php if (Yii::app()->user->getState('isRule') == '1') { ?>
               <li class="dropdown">
                  <a href="#">จัดการรูปแบบประเมิน</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="<?php echo $path ?>/qrType/admin">กำหนดรูปแบบ</a>
                    </li>
                    <li>
                      <a href="<?php echo $path ?>/qrTypeDetail/admin">กำหนดรูปภาพ</a>                      
                    </li>
                   
                  </ul>
                </li> 
                <?php } ?>   
                <li>
                 <a href="<?php echo $path ?>/qrQuestionSet/admin">จัดการชุดแบบประเมิน</a> 
               
                </li>       
               
               <?php if (Yii::app()->user->getState('isRule') == '1') { ?>
             
                 <li>
                  <a href="index-3.html">สรุปผลคะแนน</a>
                </li>
             <?php } ?>
                <?php if (!Yii::app()->user->getState('isRule')) { ?>
                  <li>
                  <a href="<?php echo $path ?>/login">login</a>
                  </li>
                  <?php } ?>
                  <?php if (Yii::app()->user->getState('isRule')) { ?>
                  <li>
                  <a href="<?php echo $path ?>/logout">Logout <span style="color: white;"><?php echo Yii::app()->user->name ?> </a>
                </span></li>
                <?php } ?>
              </ul>                           
            </div>
        </nav>   
       
             
        </div>

      </div>  
    </header>
     <?php } ?>