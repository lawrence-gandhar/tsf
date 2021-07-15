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
            <div class="w3-container" style="padding:0;">
                <div class="w3-col m2 w3-hide-small w3-theme-d2">&nbsp;</div>
                <div id="Side-menu-bar" class="w3-col m2 w3-theme-d2 side-menu-bar"
                    style="position:fixed; z-index: +3; height:100%; overflow:auto;"
                >
                    <div class="w3-bar-block sideMenuDiv" style="margin-bottom:100px;">
                        <a class="cursor-pointer w3-bar-item w3-theme-d2 w3-hover-theme-d2 w3-hover-none w3-xlarge" onclick="ShowHideSideBar();">&nbsp;<span class="w3-right w3-xxlarge  w3-hide-large w3-hide-medium w3-text-white"> &times; &nbsp;&nbsp;</span></a>
                        <div id="side-menu-1" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1  side-menu">
                            <a href="<?php echo base_url()?>admin" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >School List<i id="side-menu-triangle-1" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                        <div id="side-menu-2" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/student" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >Student List<i id="side-menu-triangle-2" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
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
                        <div id="side-menu-10" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/examinations">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Examinations<i id="side-menu-triangle-10" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w3-rest" style="position:relative;">
                    <div class="overlay-div w3-theme-l3 w3-opacity-max"></div>


                    <!--- About School List section start -->
                    <div id="content-container-1" class="w3-col content-container w3-animate-opacity" style="position:relative; display:block;">
                        <div class="w3-col w3-center w3-theme content-container-admin">
                            <span class="w3-xlarge">Student List</span>
                        </div>
                        <img src="<?php echo base_url() ?>/static/img/loading.gif" class="loading" alt="Loading..." id="studLoadingGif">
                        <div class="w3-col w3-padding w3-padding-12 w3-white">
                          <a href="#" class="w3-btn w3-block w3-theme-1 w3-round w3-padding" data-target="#addStudentModal" data-toggle="modal" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-plus"></i> Add Student
                          </a>&nbsp;&nbsp;
                          <a href="#" class="w3-text-theme-2 w3-btn w3-round" onclick="return reset_student_list();" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-undo"></i> Reset List
                          </a>
                          &nbsp;&nbsp;
                          <a href="#" onclick="return get_student_list();" class="w3-text-theme-2 w3-btn w3-round" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-download"></i> Download XLS
                          </a>

                            <div class="w3-col w3-responsive w3-responsive-sm" style="padding: 10px 0px 15px 0px; height:auto !important">
                            <table class="w3-table-all w3-table-sm" id="student_table">
                                    <thead>
                                        <tr class="w3-theme" id="student_table_th">
                                            <th class="nowrap">Registartion ID</th>
                                            <th class="nowrap">Student Name</th>
                                            <th class="nowrap">School Name</th>
                                            <th class="nowrap">Coordinator Name</th>
                                            <th class="nowrap">Class</th>
                                            <th class="nowrap">Exam Type</th>
                                            <th class="nowrap">Father's Name</th>
                                            <th class="nowrap">Phone No</th>
                                            <th class="nowrap">DOB</th>
                                            <th class="nowrap">Gender</th>
                                            <th class="nowrap">Email-id</th>
                                            <th class="nowrap">Address</th>
                                            <th class="nowrap">District</th>
                                            <th class="nowrap">State</th>
                                            <th class="nowrap">Pincode</th>
                                            <th class="nowrap">Fee</th>
                                            <th class="nowrap">Payment Medium</th>
                                            <th class="nowrap">Is Paid</th>
                                            <th class="nowrap">Transaction ID</th>
                                            <th class="nowrap">Paid On</th>
                                            <th class="nowrap">Registered on</th>
                                            <th class="nowrap ignore-heading">Image</th>
                                            <th class="nowrap"></th>
                                            <th class="nowrap"></th>
                                            <th class="nowrap"></th>
                                        </tr>
                                        <tr class="w3-theme-2 ignore-heading" id="student_table_filter" style="background-color:#024b61 !important;">
                                            <td>
                                              <form id="reg_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input name="reg_id" type="text" placeholder="Registartion ID" id="stud_reg_id" class="w3-white w3-text-theme form-control" style="width:130px;">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit" id="searchReg_idBtn">
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                              </form>
                                            </td>
                                            <td>
                                                <form id="st_name_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="student_name" type="text"
                                                            placeholder="Student name"
                                                            id="st_name_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:130px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_name_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="school_filterForm">
                                                <div class="input-group input-group-sm">
                                                    <input name="school_name" type="text"
                                                        placeholder="School name"
                                                        id="school_filter"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:150px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                            id="searchSchoolBtn"
                                                        >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="cr_name_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input nmae="coordinator" type="text"
                                                            placeholder="Co-ordinator name"
                                                            id="cr_name_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="cr_name_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <select name="class" class="w3-white w3-round w3-border w3-text-theme" id="class_filter" style="padding: 4px;">
                                                    <option value="" selected>All Class</option>
                                                    <?php foreach($class_list as $row) : ?>
                                                        <option value="<?php echo $row["class_value"] ?>"><?php echo $row["class_name"] ?></option>';
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td></td>
                                            <td>
                                                <form id="f_name_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="f_name" type="text"
                                                            placeholder="Father's name"
                                                            id="f_name_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="f_name_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="st_phone_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="phone_no" type="text"
                                                            placeholder="Phone no"
                                                            id="st_phone_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_phone_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td></td>
                                            <td>
                                                <select name="gender" class="w3-white w3-round w3-border w3-text-theme" id="gender_filter" style="padding: 4px;">
                                                    <option value="" selected>Select</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </td>
                                            <td>
                                                <form id="st_email_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="email" type="text"
                                                            placeholder="Email"
                                                            id="st_email_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_email_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="st_address_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="address" type="text"
                                                            placeholder="Address"
                                                            id="st_address_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:140px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_address_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="st_city_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="city" type="text"
                                                            placeholder="City"
                                                            id="st_city_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:80px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_city_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="st_state_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="state" type="text"
                                                            placeholder="State"
                                                            id="st_state_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:70px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info"
                                                                type="submit" id="st_state_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="st_pin_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input name="pincode" type="text" placeholder="Pincode" id="st_pin_filter" class="w3-white w3-text-theme form-control" style="width:70px;">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit" id="st_pin_btn">
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td colspan="11"></td>
                                        </tr>
                                    </thead>
                                    <tbody id="student_tbody"></tbody>
                                </table>
                                <div id="student_msg"></div>
                            </div>
                            <div id="exportStudDiv"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Loading Modal -->

        <div class="modal res-modal" id="resModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header w3-padding-8" style="background-color:#035767; color:#ffffff;">
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

        <div class="modal res-modal" id="imgModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header w3-padding-8" style="background-color:#035767; color:#ffffff;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" id="imgTitle"></h4>
                    </div>
                    <div class="modal-body" id="resModalBody">
                        <div id="imgModalContent" style="text-align:center"></div>
                        <img src="<?php echo base_url() ?>static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
                        <span id="imgSpan"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->

        <div class="modal res-modal" id="addStudentModal" data-backdrop="static">
          <div class="modal-dialog res-modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php echo base_url()?>admin/student/add" method="POST" enctype="multipart/form-data">
                  <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                      <h5 class="modal-title" style="display: inline;">Add Student</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body" style="display:flow-root;">
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Student Name</label>
                        <div class="col-md-12">
                            <input name="student_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
                        <div class="col-md-12">
                            <input name="school_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Father's Name</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Coordinator</label>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input name="father_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <select name="coordinator_id" class="form-control">
                              <?php foreach($coord_list as $coord): ?>
                                <option value="<?php echo $coord["id"]; ?>">
                                  <?php echo ucwords(strtolower($coord["name"]))." (".$coord["registration_id"].")"?>
                                </option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Class</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Exam Type</label>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6" style="padding:0px 14px 0px 0px;">
                          <select class="form-control" name="class_id">
                            <?php foreach($class_list as $row): ?>
                              <option value="<?php echo $row["id"] ?>"><?php echo $row["class_name"]; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                        <div class="col-md-6" style="padding:0px 0px 0px 14px;">
                          <select class="form-control" name="examtype_id">
                            <?php foreach($examtype_list as $examtype): ?>
                              <option value="<?php echo $examtype["id"] ?>"><?php echo $examtype["exam_type"]; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Date of Birth</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Gender</label>
                    </div>
                    <div class="col-md-12" style="padding:0px;">
                        <div class="col-md-6" style="padding:0px;">
                            <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                              <select name="dob_date" class="form-control">
                              <?php for($i=1; $i<=31; $i++): ?>
                                <option><?php echo $i; ?></option>
                              <?php endfor; ?>
                              </select>
                            </div>
                            <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                              <select class="form-control" name="dob_month">
                                <option value="1">Jan</option>
                                <option value="1">Feb</option>
                                <option value="1">Mar</option>
                                <option value="1">Apr</option>
                                <option value="1">May</option>
                                <option value="1">Jun</option>
                                <option value="1">Jul</option>
                                <option value="1">Aug</option>
                                <option value="1">Sep</option>
                                <option value="1">Oct</option>
                                <option value="1">Nov</option>
                                <option value="1">Dec</option>
                              </select>
                            </div>
                            <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                              <select name="dob_year" class="form-control">
                                <?php for($i=date('Y'); $i>=1947; $i--): ?>
                                  <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding:5px 10px;">
                          <div class="form-check form-check-inline col-md-6">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Radio1" value="1">
                            <label class="form-check-label" for="Radio1" style="padding:0px 5px;">Male</label>
                          </div>
                          <div class="form-check form-check-inlin col-md-6" style="padding:0px;">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Radio2" value="0">
                            <label class="form-check-label" for="Radio2" style="padding:0px 5px;">Female</label>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                        <div class="col-md-12">
                            <input name="address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
                        <div class="col-md-6">
                            <input name="city" class="form-control">
                        </div>
                        <div class="col-md-6">
                          <select name="state" class="form-control">
                            <?php foreach($states as $state): ?>
                              <option value="<?php echo $state["id"] ?>"><?php echo $state["state"] ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Pincode</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email</label>
                        <div class="col-md-6">
                            <input type="text" name="pincode" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone</label>
                        <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Passport Size Photo</label>
                        <div class="col-md-6">
                            <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <input type="file" name="photo" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Edit Modal -->

          <div class="modal res-modal" id="editStudentModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
              <div class="modal-content">
                <form action="<?php echo base_url()?>admin/student/edit" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="student_id" name="student_id">
                    <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                        <h5 class="modal-title" style="display: inline;">Edit Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="display:flow-root;">

                      <div class="col-md-8" style="padding:0px;">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Student Name</label>
                            <div class="col-md-12">
                                <input name="student_name" id="student_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
                            <div class="col-md-12">
                                <input name="school_name" id="school_name" class="form-control">
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <img id="student_image" class="img img-responsive" style="height:143px;border:1px solid #eeeeee; width:100%" alt="Student Photo">
                      </div>

                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Father's Name</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Coordinator</label>
                      </div>
                      <div class="form-group">
                          <div class="col-md-6">
                              <input name="father_name" id="father_name" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <select name="coordinator_id" id="coordinator_id" class="form-control">
                                <?php foreach($coord_list as $coord): ?>
                                  <option value="<?php echo $coord["id"]; ?>">
                                    <?php echo ucwords(strtolower($coord["name"]))." (".$coord["registration_id"].")"?>
                                  </option>
                              <?php endforeach; ?>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Class</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Exam Type</label>
                      </div>
                      <div class="col-md-12">
                          <div class="col-md-6" style="padding:0px 14px 0px 0px;">
                            <select class="form-control" name="class_id" id="class_id">
                              <?php foreach($class_list as $row): ?>
                                <option value="<?php echo $row["id"] ?>"><?php echo $row["class_name"]; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-md-6" style="padding:0px 0px 0px 14px;">
                            <select class="form-control" name="examtype_id" id="examtype_id">
                              <?php foreach($examtype_list as $examtype): ?>
                                <option value="<?php echo $examtype["id"] ?>"><?php echo $examtype["exam_type"]; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Date of Birth</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Gender</label>
                      </div>
                      <div class="col-md-12" style="padding:0px;">
                          <div class="col-md-6" style="padding:0px 12px 0px 0px;">
                              <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                                <select name="dob_date" class="form-control" id="dob_date">
                                <?php for($i=1; $i<=31; $i++): ?>
                                  <option><?php echo $i; ?></option>
                                <?php endfor; ?>
                                </select>
                              </div>
                              <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                                <select class="form-control" name="dob_month" id="dob_month">
                                  <option value="1">Jan</option>
                                  <option value="2">Feb</option>
                                  <option value="3">Mar</option>
                                  <option value="4">Apr</option>
                                  <option value="5">May</option>
                                  <option value="6">Jun</option>
                                  <option value="7">Jul</option>
                                  <option value="8">Aug</option>
                                  <option value="9">Sep</option>
                                  <option value="10">Oct</option>
                                  <option value="11">Nov</option>
                                  <option value="12">Dec</option>
                                </select>
                              </div>
                              <div class="col-md-4" style="padding:0px 0px 0px 14px;">
                                <select name="dob_year" class="form-control" id="dob_year">
                                  <?php for($i=date('Y'); $i>=1947; $i--): ?>
                                    <option><?php echo $i; ?></option>
                                  <?php endfor; ?>
                                </select>
                              </div>
                          </div>
                          <div class="col-md-6" style="padding:5px 10px;">
                            <div class="form-check form-check-inline col-md-6">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender1" value="1">
                              <label class="form-check-label" for="gender1" style="padding:0px 5px;">Male</label>
                            </div>
                            <div class="form-check form-check-inlin col-md-6" style="padding:0px;">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="gender2" value="0">
                              <label class="form-check-label" for="gender2" style="padding:0px 5px;">Female</label>
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                          <div class="col-md-12">
                              <input name="address" id="address" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
                          <div class="col-md-6">
                              <input name="city" id="city" class="form-control">
                          </div>
                          <div class="col-md-6">
                            <select name="state" id="state" class="form-control">
                              <?php foreach($states as $state): ?>
                                <option value="<?php echo $state["id"] ?>"><?php echo $state["state"] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Pincode</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email</label>
                          <div class="col-md-6">
                              <input type="text" name="pincode" id="pincode" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <input type="text" name="email" id="email" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone</label>
                          <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Edit/Upload Photo</label>
                          <div class="col-md-6">
                              <input type="text" name="phone" id="phone" class="form-control">
                          </div>
                          <div class="col-md-6">
                              <input type="file" name="photo" class="form-control">
                          </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" onclick="show_payment_history()">Show Payment History</button>
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


        <!-- STUDENT PAYMENT MODAL -->

        <div class="modal" id="studentPaymentModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header w3-padding-8" style="background-color:#035767; color:#ffffff;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Payment History</h4>
                    </div>
                    <div class="modal-body" style="display:flow-root;">
                        <img src="<?php echo base_url() ?>static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
                      </hr>
                        <div class="col-md-12">
                          <form id="addStudentPaymentForm">
                            <input type="hidden" name="stud_id" id="stud_id" value="">
                          <div class="form-group">
                              <label class="col-md-4 control-label" for="desc">Fees</label>
                              <label class="col-md-3 control-label" for="desc">Payment Type</label>
                              <label class="col-md-3 control-label" for="desc">Payment Status</label>
                              <div class="col-md-4">
                                  <input type="number" name="fees" id="fees" class="form-control">
                              </div>
                              <div class="col-md-3">
                                  <select name="payment_type" id="payment_type" class="form-control">
                                    <option value="0">Offline</option>
                                    <option value="1">Online</option>
                                  </select>
                              </div>
                              <div class="col-md-3">
                                <select name="payment_status" id="payment_status" class="form-control">
                                  <option value="0">Pending</option>
                                  <option value="1">Complete</option>
                                </select>
                              </div>
                              <div class="col-md-2">
                                <button type="button" onclick="add_student_payment()" class="btn btn-success">Add Payment</button>
                              </div>
                          </div>
                        </form>
                        </div>
                      <div class="col-md-12">
                        <div id="error_div" class="col-md-12" style="display:none; color:#ff0000; margin-top:20px;"></div>
                        <div id="table_data" class="col-md-12" style="display:none; margin-top:20px; overflow:auto;"></div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- EDIT STUDENT PAYMENT MODAL -->

        <div class="modal" id="editStudentPaymentModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <form id="editStudentPaymentForm">
                    <div class="modal-header w3-padding-8" style="background-color:#035767; color:#ffffff;">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Payment</h4>
                    </div>
                    <div class="modal-body" style="display:flow-root;">
                        <img src="<?php echo base_url() ?>static/img/loading.gif" alt="Loading..." class="resLoadingGif" hidden>
                      </hr>
                        <div class="col-md-12">
                            <input type="hidden" name="sid" id="sid" value="">
                          <div class="form-group">
                            <label class="col-md-12 control-label" for="desc">Fees</label>
                            <input type="number" name="fees" id="edit_fees" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-md-12 control-label" for="desc">Payment Type</label>
                              <select name="payment_type" id="edit_payment_type" class="form-control">
                                <option value="0">Offline</option>
                                <option value="1">Online</option>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-md-12 control-label" for="desc">Payment Status</label>
                            <select name="payment_status" id="edit_payment_status" class="form-control">
                              <option value="0">Pending</option>
                              <option value="1">Complete</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" onclick="edit_student_payment()" class="btn btn-success">Save</button>
                        <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.6/xls.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/2.0.20171115/Blob.min.js"></script>
    <script src="https://fastcdn.org/FileSaver.js/1.1.20151003/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/admin.js?v=23"></script>
    <script>
        var base_url = "<?php echo base_url() ?>";
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/manage_student.js"></script>

</body>
</html>
