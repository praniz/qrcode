<?php
Yii::app()->clientScript->registerCoreScript('jquery');

?>
 <div class="row">
      <section class="well well2">
        <div class="container">

<?php if (Yii::app()->user->getState('isRule') == '1') { ?>

<h2>
          ขั้นตอนการสร้าง
          <small>
             แบบประเมินความพึงพอใจ
          </small>
        </h2>
          <div class="row offs1">
            <div class="col-md-6 col-sm-12">
              <ul class="link-list wow fadeInLeft" data-wow-duration='3s'>
                <li>

                  <a href="#">เลือกเมนูจัดการชุดแบบประเมิน</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">กดปุ่ม สร้าง เพื่อใส่หัวข้อชุดการประเมิน</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                 <li>

                  <a href="#">กดภาพ รูปแว่น เพื่อใส่ คำถาม</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">กดภาพ รูปแว่น เพื่อใส่ คำตอบ</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
               
              </ul>
            </div>
        
          </div>

  <?php } ?>   

  <?php if (Yii::app()->user->getState('isRule') == '2') { ?>

 <h2>
          ขั้นตอนการประเมิน
          <small>
             แบบประเมินความพึงพอใจ
          </small>
        </h2>
          <div class="row offs1">
            <div class="col-md-6 col-sm-12">
              <ul class="link-list wow fadeInLeft" data-wow-duration='3s'>
                <li>

                  <a href="#">เลือกเมนูจัดการชุดแบบประเมิน</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                <li>

                  <a href="#">กดภาพรูป QR code เพื่อสแกนเข้าสู่แบบประเมิน</a>

                  <a href="#" class="btn-link l-h1 fa-angle-right"></a>
                </li>
                
               
              </ul>
            </div>
        
          </div>


    <?php } ?> 

      </div>
    </section>
</div> 

