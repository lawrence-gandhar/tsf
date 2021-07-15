<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>static/img/logo.png">
    <title>student | Talent Scholarship Foundation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/css/w3.css?v=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/css/w3-theme-color.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/css/w3-theme-color-1.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/css/w3-theme-color-2.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>static/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Aclonica|Alfa+Slab+One|Mako|Shrikhand|Ultra" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="<?php echo base_url() ?>static/css/style.css?v=5" rel="stylesheet" type="text/css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .w3-table td {
            padding: 0 16px!important;
        }
    </style>
</head>

<body>
    <div class="w3-main animate-bottom" id="myDiv">
        <!-- Header Section Start -->
        <?php include "header.php"; ?>
        <script>
            var p = document.getElementById("ActiveAdmin");
            p.className += " w3-border-theme-1 w3-text-theme-1";
        </script>
        <!-- Services section Start -->
        <section>
            <div class="w3-container" style="padding:0; position:relative;">
                <div class="w3-col m2 w3-hide-small w3-theme-d2">&nbsp;</div>
                <div id="Side-menu-bar" class="w3-col m2 w3-theme-d2 side-menu-bar" 
                    style="position:fixed; height:100%; z-index: +3;"
                >
                    <div class="w3-bar-block sideMenuDiv">
                        <a class="cursor-pointer w3-bar-item w3-theme-d2 w3-hover-theme-d2 w3-hover-none w3-xlarge" onclick="ShowHideSideBar();">&nbsp;<span class="w3-right w3-xxlarge  w3-hide-large w3-hide-medium w3-text-white"> &times; &nbsp;&nbsp;</span></a>
                        <div id="side-menu-1" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>student" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >Dashboard<i id="side-menu-triangle-1" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-2" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>student/Examinations" style="color:#FFFFFF;">    
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >Examination<i id="side-menu-triangle-2" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w3-rest" style="position:relative;">
                    <div class="overlay-div w3-theme-l3 w3-opacity-max"></div>
                     
                    <!--- About School List section start -->
                    <div id="content-container-1" class="w3-col content-container w3-animate-opacity" style="position:relative; display:block;">
                        <div class="w3-col w3-center w3-theme content-container-admin">
                            <a href="javascript:void(0)" class="w3-xlarge w3-left w3-hide-large w3-hide-medium w3-text-white" style="margin-top:5px;" onclick="ShowHideSideBar()"><i class="fa fa-bars"></i></a>
                            <span class="w3-xlarge">Question Sheet</span><br>
                            <div>Time <span id="time"><?php echo $time[0]['time'].':'.'00';?></span> minutes!</div>
                        </div>
                        <div class="panel" style="margin:5%">
                            <form name="frm" id="frm" method="post" action="check_question">
                                <input type="hidden" name="eid" value="<?php echo $_GET['eid'];?>">
                       <?php
                            //echo'<pre>';print_r($data);
                            $sn=1;
                            foreach ($data as $key => $rows) {
                       ?> 
                            
                            <!--<form action="update.php?q=quiz&step=2&eid='.$eid.'&n=<?php echo $sn;?>&t='.<?php echo $rows['total'];?>.'&qid=<?php echo $rows['id'];?>" method="POST"  class="form-horizontal"><br />-->
                                <input type="hidden" name="qid[]" value="<?php echo $rows['id'];?>">
                                <b>Question &nbsp;<?php echo $sn;?>&nbsp;::<br /><?php echo $rows['qns_title'];?></b><br>
                                <?php
                                foreach($rows['option'] as $key=>$op){
                                    ?>
                                
                                <input type="radio" name="ans<?php echo $rows['id'];?>[]" value="<?php echo $op['optionid'];?>">&nbsp;&nbsp;<?php echo $op['option'];?><br />
                                <?php
                                    }
                                 ?>   
                                <br />
                         <?php
                                $sn++;
                                }
                           ?>            
                                <button id="submitid" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true">
                                    
                                </span>&nbsp;Submit</button>
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <div class="modal res-modal" id="resModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header w3-padding-8">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="resTitle"></h4>
                    </div>
                    <div class="modal-body" id="resModalBody">
                        <div id="resContent"></div>
                        <img src="<?php echo base_url() ?>static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
                        <span id="resSpan"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Section Start -->
        <div class="w3-col w3-theme-d5">
            <div class="w3-col w3-padding-12 padding-left-right w3-center" style="background:#035767 !important; position:fixed; bottom:0px;">
                <span class="w3-small">Copyright © 2020, &nbsp; Talent Scholarship Foundation. &nbsp; All Rights Reserved</span>
            </div>
        </div>
        <!-- Footer Section End -->
    </div>
    <div hidden id="hiddenClassDiv"></div>
    <div hidden id="hiddenExamDiv"></div>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.6/xls.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/2.0.20171115/Blob.min.js"></script>
    <script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/admin.js?v=23"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/manage_school.js"></script>
    <script>
        var base_url = "<?php echo base_url() ?>";

        function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var c=0;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {
            timer = 0;
            c++;
            if(c==1){
             $('#submitid').css('display','none');
             alert('your Exam time is over. please submit the from');
            $('#frm').submit();
            }
        }
    }, 1000);

}

jQuery(function ($) {
    var fiveMinutes = 60 * <?php echo 1//$time[0]['time'];?>,
        display = $('#time');
    startTimer(fiveMinutes, display);
});
    </script>

</body>
</html>