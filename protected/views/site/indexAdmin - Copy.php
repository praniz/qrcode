<?php $pathTheme = Yii::app()->theme->baseUrl . '/assets';
$directoryView = Yii::app()->theme->baseUrl . '/views';
$session=new CHttpSession;
$session->open();
$http = new CHttpRequest;
Yii::app()->user->returnUrl=$http->getUrl();
Yii::app()->clientScript->registerCoreScript('jquery.ui');
 ?>
 <div class="row">
      <section class="well well2">
        <div class="container">
        <h2>
          ขั้นตอน
          <small>
            การสร้างแบบประเมินความพึงพอใจ
          </small>
        </h2>
          <div class="row offs1">
            <div class="col-md-6 col-sm-12">
              <ul class="link-list wow fadeInLeft" data-wow-duration='3s'>
                <li>

                  <a href="#">สร้างคำถามและเลือกรูปแบบที่จะให้แสดง</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">สร้างคำตอบ</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
               
              </ul>
            </div>
        
          </div>
        </div>
      </section>
</div>
 