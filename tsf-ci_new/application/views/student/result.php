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

<div class="panel">
	<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">
	<?php
    //echo'<pre>';print_r($data);
	foreach($data as $k=>$row)
	{
	$s=$row['score'];
	$w=$row['wrong'];
	$r=$row['sahi'];
	$qa=$row['level'];
    ?>
	<tr style="color:#66CCFF"><td></td><td></td><td colspan="2"></td><td>Total Questions</td><td><?php echo $qa;?></td></tr>
	      <tr style="color:#99cc32"><td></td><td></td><td  colspan="2"></td><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td><?php echo $r;?></td></tr> 
		  <tr style="color:red"><td></td><td></td><td  colspan="2"></td><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td><?php echo $w;?></td></tr>
		  <tr style="color:#66CCFF"><td></td><td></td><td  colspan="2"></td><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td><?php echo $s;?></td></tr>
     <?php     
	}
	
	foreach($rank as $r=>$rows)
	{
	$s=$rows['score'];
    ?>
	<tr style="color:#990000"><td></td><td></td><td  colspan="2"></td><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td><?php echo $s;?></td></tr>
    <?php
	}
	echo '</table></div>';
	?>
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
    </script>

</body>
</html>