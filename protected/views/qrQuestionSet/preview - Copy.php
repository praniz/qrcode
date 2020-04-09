<?php
Yii::app()->clientScript->registerCoreScript('jquery');
 $path = Yii::app()->request->baseUrl;
  $pathImg = Yii::app()->theme->baseUrl . '/assets/images';
?>
<br><br>
<div class="detail-view">
    <div class="panel-group" id="accordion">

    <?php  $idx = 0; foreach($modelQues as $row): $idx++;?> 
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" 
                    href="#collapse<?=$idx?>"><?=$idx .'. '. $row['title'];?></a>
                </h4>
            </div>
            <div id="collapse<?=$idx?>" class="panel-collapse collapse">
                <div class="panel-body" id="panel-body">
                <?php $modelAns = QrAnswer::model()->findAll('idqr_question='.$row['idqr_question']."");
            foreach($modelAns as $row1):?> 
            
         <?php if ($row['ans_type'] == 'RT1') { ?>
     <?php if ($row1['detail'] == 'R' && $row1['detail_check'] == '0') { ?>           
    <p>
    <label for="chkYes">
    <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" />
    <?=$row1['answer']; ?>
    </label>
    </p>
    <?php }?>
    <?php if ($row1['detail'] == 'R' && $row1['detail_check'] == '1') { ?>    
    <p>
    <label for="chkNo">
    <input type="radio" id="chkNo" name="chk" onclick="ShowHideDiv()" />
     <?=$row1['answer']; ?>
    </label>
    </p>
    <?php } elseif ($row1['detail'] == 'T') { ?> 
    <div id="dvtext" style="display: none">
     <?=$row1['answer']; ?>
    <input type="text" id="txtBox" />
    </div>
    <?php } }elseif ($row['ans_type'] == 'RT2') { ?>
    <?php if ($row1['detail'] == 'R') { ?> 
    <p><label for="chkYes">
    <input type="radio" id="chkYes" name="chk" onclick="ShowHideDiv()" />
    <?=$row1['answer']; ?>
    </label></p>
    <?php }elseif ($row1['detail'] == 'T') { ?> 
    <div id="dvtext" >
    <?=$row1['answer']; ?>
    <input type="text" id="txtBox" />
    </div>
    <?php }
    }elseif ($row['ans_type'] == 'R') {?>
    <p><label for="chkYes">
    <input type="radio" id="chkYes" name="chk"" />
    <?=$row1['answer']; ?>
    </label></p>
     <?php }elseif ($row['ans_type'] == 'C') { ?>
    <p><label for="chkYes">
    <input type="checkbox" id="chkYes" name="chk"" />
    <?=$row1['answer']; ?>
    </label></p>
     <?php   }elseif ($row['ans_type'] == 'T') { ?>
    <?=$row1['answer']; ?> : <input type="text" id="txtBox" />
       <?php  }?>  
           <?php  endforeach;?>
           <?php if ($row['ans_type'] =='P') { ?>
        <?php $modelPic = QrTypeDetail::model()->findAll("ans_type='".$row['ans_type']."'");
            foreach($modelPic as $pic):?> 
            <a href=""><img class="img-max" src="<?php echo $pathImg ?>/<?php echo $pic['image'] ?>"></a>
              <?php endforeach;?>
              <?php  } ?>
        <input type="hidden" id="test<?=$idx?>" class="button" onclick="here($idx)">
                </div>
            </div>
        </div>
    <?php endforeach;?>

    </div>
</div>
<script type="text/javascript">
/*panel-collapse collapse
    panel-collapse collapse in*/
   $( document ).ready(function() {
    var element = document.getElementById("collapse1");
    element.classList.add("in");
    });

   document.getElementById("panel-body").onclick = function(){
    alert("HERE");
    var i = 1; 
    while (i <= <?=$sizeModel?>) {
    var element = document.getElementById("collapse"+i);

   
    if(element.classList.contains("in")){
        element.classList.remove("in"); //HAVE
        i++;
        var elementNext = document.getElementById("collapse"+i);
        elementNext.classList.add("in");

        break;
    }

    } 

   }

    function ShowHideDiv() {
        var chkNo = document.getElementById("chkNo");
        var dvtext = document.getElementById("dvtext");
        dvtext.style.display = chkNo.checked ? "block" : "none";
    }
</script>