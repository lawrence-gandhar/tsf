<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>static/img/logo.png">
    <title>Admin | Talent Scholarship Foundation</title>
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
    <link href="<?php echo base_url() ?>static/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
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
        <!-- Services section Start -->
        <section>
            <div class="w3-container" style="padding:0; position:relative;">
                <div class="w3-col m2 w3-hide-small w3-theme-d2">&nbsp;</div>
                <div id="Side-menu-bar" class="w3-col m2 w3-theme-d2 side-menu-bar"
                    style="position:fixed; z-index: +3; height:100%;overflow:auto;"
                >
                    <div class="w3-bar-block sideMenuDiv" style="margin-bottom:100px;">
                        <a class="cursor-pointer w3-bar-item w3-theme-d2 w3-hover-theme-d2 w3-hover-none w3-xlarge" onclick="ShowHideSideBar();">&nbsp;<span class="w3-right w3-xxlarge  w3-hide-large w3-hide-medium w3-text-white"> &times; &nbsp;&nbsp;</span></a>
                        <div id="side-menu-1" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >School List<i id="side-menu-triangle-1" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-2" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/student" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >Student List<i id="side-menu-triangle-2" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-3" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/coordinator" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Co-ordinator List<i id="side-menu-triangle-3" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-4" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/notifications" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Notifications<i id="side-menu-triangle-4" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-5" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Carousel Image<i id="side-menu-triangle-5" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                        </div>
                        <div id="side-menu-6" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                          <a href="<?php echo base_url()?>admin/gallery" style="color:#FFFFFF;">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Gallery Images<i id="side-menu-triangle-6" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                          </a>
                        </div>
                        <div id="side-menu-7" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Quick Contact<i id="side-menu-triangle-7" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                        </div>
                        <div id="side-menu-8" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Exam Syllabus<i id="side-menu-triangle-8" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                        </div>
                        <div id="side-menu-9" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Mock Test Paper<i id="side-menu-triangle-9" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                        </div>
                        <div id="side-menu-10" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                            <span>Send Message<i id="side-menu-triangle-10" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                        </div>
                        <div id="side-menu-10" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/examinations" style="color:#FFFFFF">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Examinations<i id="side-menu-triangle-10" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w3-rest" style="position:relative;">
                    <div class="overlay-div w3-theme-l3 w3-opacity-max"></div>
                    <div id="content-container-4" class="w3-col content-container w3-animate-opacity" style="position:relative; display:block;">
                        <div class="w3-col w3-center w3-theme content-container-admin">
                                    <a href="javascript:void(0)" class="w3-xlarge w3-left w3-hide-large w3-hide-medium w3-text-white" style="margin-top:5px;" onclick="ShowHideSideBar()"><i class="fa fa-bars"></i></a>
                                    <span class="w3-xlarge">Edit/Add Questions & Options</span>
                                </div>
                            <div class="w3-col w3-padding w3-padding-16 w3-white" style="margin-bottom:40px;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php for($x = 1; $x <= $new_sec; $x++): ?>
                                        <fieldset style="margin-bottom:10px; background-color:#eee">
                                            <div class="form-group" style="display:flow_root">
                                                <label class="col-md-12 control-label" for="total" style="margin:10px 0px;">Question <?php echo $x; ?></label>
                                                <div class="col-md-12">
                                                    <textarea name="qns_title[]" required class="form-control input-md" placeholder="Enter Question details"></textarea>
                                                </div>
                                                <div class="col-md-12 pull-right" style="padding-top:10px;">
                                                    <input type="file" multiple name="img_<?php echo $x?>[]">
                                                </div>
                                                <div class="col-md-12" style="padding-top:10px;" id="opt_div_<?php echo $x; ?>">
                                                    <div class="col-md-9" style="padding:0px;">
                                                        <input type="text" placeholder="Enter option details here" class="form-control" name="option_<?php echo $x ?>[]">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <select class="form-control" name="correct_ans_<?php echo $x ?>[]">
                                                            <option value="">Is correct option</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-primary" onclick="add_option_row(<?php echo $x ?>)">Add Row</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    <?php endfor; ?>
                                    <fieldset style="margin-bottom:20px; text-align:center; background-color:#eee">
                                        <input type="submit" value="Submit" name="submit" class="btn btn-success">
                                        <input type="reset" value="Reset" class="btn btn-warning">
                                    </fieldset>
                                </form>
                            </div>
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
                        <img src="/static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
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
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/examinations.js"></script>
    <script>
        var base_url = "<?php echo base_url() ?>";
    </script>

</body>
</html>
