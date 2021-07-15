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

        <section>
            <div class="w3-container" style="padding:0; position:relative;">
                <div class="w3-col m2 w3-hide-small w3-theme-d2">&nbsp;</div>
                <div id="Side-menu-bar" class="w3-col m2 w3-theme-d2 side-menu-bar"
                    style="position:fixed; z-index: +3; height:100%; overflow:auto;"
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
                                    <span class="w3-xlarge">Notifications</span>
                                </div>
                            <div class="w3-col w3-padding w3-padding-16 w3-white" style="min-height:561px;">
                                <a href="<?php echo base_url()?>admin/examinations/add" class="w3-btn w3-block w3-theme-1 w3-round w3-padding">
                                <i class="fa fa-plus"></i>  Add Examination/Quiz</a>
                                <br><p></p>
                                <div class="w3-col w3-responsive w3-responsive-sm">
                                    <table class="w3-table-all w3-table-sm">
                                        <thead>
                                            <tr class="w3-theme">
                                                <th>Title</th>
                                                <th>Tag</th>
                                                <th>Status</th>
                                                <th>Details</th>
                                                <th>Time (In Minutes)</th>
                                                <th>Total Questions</th>
                                                <th>Total Marks</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr class="w3-theme-2 ignore-heading" id="examinations_table_filter">
                                                <td>
                                                    <form id="exam_title_idFilterForm">
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" placeholder="Examination Title"
                                                                id="exam_title"
                                                                class="w3-white w3-text-theme form-control"
                                                                style="display:inline;">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-info" type="submit" id="exam_title_idBtn">
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form id="exam_tag_idFilterForm">
                                                        <div class="input-group input-group-sm">
                                                            <input type="text" placeholder="Examination Tag"
                                                                id="exam_tag"
                                                                class="w3-white w3-text-theme form-control"
                                                                style="display:inline;">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-info" type="submit" id="exam_tag_idBtn">
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form id="exam_status_idFilterForm">
                                                        <div class="input-group input-group-sm">
                                                            <select class="w3-white w3-round w3-border w3-text-theme form-control" id="exam_status" style="padding: 4px;">
                                                                <option value="">Any</option>
                                                                <option value="1">Active</option>
                                                                <option value="0">In-Active</option>
                                                            </select>
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-info" type="submit" id="exam_title_idBtn">
                                                                    <span class="fa fa-search"></span>
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                            </tr>
                                        </thead>
                                        <tbody id="exam_tbody">


                                        </tbody>
                                    </table>
                                </div>
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
                        <img src="<?php echo base_url() ?>/static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
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

    <!-- EDIT MODAL -->

    <div class="modal" tabindex="-1" role="dialog" id="EditExamModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?php echo base_url()?>admin/examinations/edit" method="POST">
                    <input type="hidden" name="id" id="exam_id" value="">
                    <div class="modal-header">
                        <h5 class="modal-title" style="display: inline;">Edit Examination - <span id="exam_eid"></span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="display:flow-root;">
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-12 control-label" for="name">Name/Title</label>
                            <div class="col-md-12">
                                <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text" required>
                            </div>
                        </div>
                        <div class="form-group" style="padding-top:10px;">
                            <label class="col-md-12 control-label" for="name" style="margin-top:10px;">Status</label>
                            <div class="col-md-12">
                                <select class="form-control" name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="0">In-Active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="total" style="margin-top:10px;">Enter total number of questions</label>
                            <div class="col-md-12">
                                <input id="total_questions" name="total_questions" placeholder="Enter total number of questions" class="form-control input-md" type="number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="total_marks" style="margin-top:10px;">Enter total marks</label>
                            <div class="col-md-12">
                                <input id="total_marks" name="total_marks" placeholder="Enter total marks" class="form-control input-md" min="0" type="number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="time" style="margin-top:10px;">Enter time limit for test in minute</label>
                            <div class="col-md-12">
                                <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="tag" style="margin-top:10px;">Enter #tag which is used for searching</label>
                            <div class="col-md-12">
                                <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Write description here</label>
                            <div class="col-md-12">
                                <textarea id="desc" rows="3" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Start Date</label>
                                <input type="text" class="form-control form_datetime" name="start_date" id="start_date">
                            </div>

                            <div class="col-md-6">
                                <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">End Date</label>
                                <input type="text" class="form-control form_datetime" name="end_date" id="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL END -->



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

        $(document).ready(function(){
          get_examinations_list();

          //
          //
          //

          $(`#exam_title_idBtn,#exam_tag_idBtn,#exam_title_idBtn`).on("click", function(){
              get_examinations_list();
              return false;
          });

          //
          //
          //

          $(`#exam_tag_idFilterForm, #exam_title_idFilterForm, #exam_status_idFilterForm`).on("submit", function(){
              get_examinations_list();
              return false;
          });

          //
          //
          //

          $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
        });



        //********************************************************************* */
        //
        //********************************************************************* */

        function get_examinations_list(){

            $("#examLoadingGif").show();
            $("#exam_msg").html("");
            $("#exam_tbody").html("");

            e_title = $("#exam_title").val();
            e_tag = $("#exam_tag").val();
            e_status = $("#exam_status").val();

            $.get(base_url+"admin/examinations/list", {"e_title": e_title, "e_tag":e_tag, "e_status":e_status}, function(data){
                result = $.parseJSON(data);

                var msg = "";
                if(result.status == "success") {
                    var exam_list = result.examinations_list;

                    if (exam_list.length === 0) {
                        $("#exam_msg").html("<center>No record.</center>");
                        $("#exportExamDiv").html("");
                    } else {
                        var exam_html = "";

                        for(var i in exam_list) {
                            var exam_id = exam_list[i].id;
                            exam_html += "<tr><td class=\"nowrap\">"
                                + exam_list[i].title + "</td>"
                                + "<td class=\"nowrap\">" + exam_list[i].tag + "</td>"

                                if(exam_list[i].is_active == 1){
                                    exam_html += "<td class=\"nowrap\">Active</td>"
                                }else{
                                    exam_html += "<td class=\"nowrap\">In-Active</td>"
                                }


                                exam_html += "<td style=\"width:100px; word-wrap:break\">" + exam_list[i].intro + "</td>"
                                + "<td class=\"nowrap\">" + exam_list[i].time + "</td>"
                                + "<td class=\"nowrap\">" + exam_list[i].total_questions + "</td>"
                                + "<td class=\"nowrap\">" + exam_list[i].total_marks + "</td>"

                                if(exam_list[i].start_date !== null){
                                    exam_html += "<td class=\"nowrap\">" + exam_list[i].start_date  + "</td>"
                                }else{
                                    exam_html += "<td class=\"nowrap\"></td>"
                                }

                                if(exam_list[i].end_date !== null){
                                    exam_html += "<td class=\"nowrap\">" + exam_list[i].end_date  + "</td>"
                                }else{
                                    exam_html += "<td class=\"nowrap\"></td>"
                                }

                                exam_html +=  "<td class=\"ignore-heading text-center\"><button style=\"background-color:#384044 !important;\" type=\"button\" "
                                + "onclick=\"edit_exam_record(" + exam_id +", '"+exam_list[i].eid+"');\" "
                                + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                                + "><i class=\"fa fa-pencil\"></i>  Edit</button> </td>"
                                + "<td class=\"ignore-heading text-center\"><button style=\"background-color:#FF0000 !important;\" type=\"button\" class=\"w3-btn w3-theme w3-round w3-tiny\" "
                                + "onclick=\"delete_exam_record("+exam_id+")\"><i class=\"fa fa-trash\"></i> "
                                + "Delete</button></td>"
                                + "<td class=\"ignore-heading text-center\"><a href=\""+base_url+"admin/examinations/"+exam_id+"/questions/edit\" class=\"w3-btn w3-theme w3-round w3-tiny\"><i class=\"fa fa-border-all\"></i> Questions</a></td>"
                                +"</tr>";
                        }

                        $("#exam_tbody").html(exam_html);

                        bindTableExport($("#exam_table"), "examList");
                        var totRecords = exam_list.length;
                        var totRecordsHtml = "<span class=\"w3-right totRecords\">Total Record";
                        if(totRecords > 1) {
                            totRecordsHtml += "s";
                        }
                        totRecordsHtml += ": " + totRecords + "</span>";
                        var reportBtnHtml = "<button type=\"button\" class=\"xls w3-btn "
                            + "w3-theme \" onclick=\"downloadSchoolXLS();\">"
                            + "Export to xls</button>";
                        $("#exportExamDiv").html(reportBtnHtml + totRecordsHtml);

                    }
                }

            });
            return false;

        }
    </script>

</body>
</html>
