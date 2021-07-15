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
                  style="position:absolute; z-index: +3; height:100%;"
              >
                    <div class="w3-bar-block sideMenuDiv">
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
                        <div id="side-menu-3" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/coordinator" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Co-ordinator List<i id="side-menu-triangle-3" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
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
                    <!--- About Coordinator List section start -->

                    <div id="content-container-1" class="w3-col content-container w3-animate-opacity" style="position:relative; display:block;">
                        <div class="w3-col w3-center w3-theme content-container-admin">
                            <span class="w3-xlarge">Coordinator List</span>
                        </div>
                        <img src="<?php echo base_url() ?>/static/img/loading.gif" class="loading" alt="Loading..." id="coordLoadingGif">
                        <div class="w3-col w3-padding w3-padding-12 w3-white">
                          <a href="#" class="w3-btn w3-block w3-theme-1 w3-round w3-padding" data-target="#addCoordinatorModal" data-toggle="modal" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-plus"></i> Add Corrdinator
                          </a>&nbsp;&nbsp;
                          <a href="#" class="w3-text-theme-2 w3-btn w3-round" onclick="return reset_coordinator_list();" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-undo"></i> Reset List
                          </a>
                          &nbsp;&nbsp;
                          <a href="#" onclick="return get_coordinator_list();" class="w3-text-theme-2 w3-btn w3-round" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-download"></i> Download XLS
                          </a>
                          <div class="w3-col w3-responsive w3-responsive-sm" style="padding: 10px 0px 15px 0px; height:auto !important">
                            <table class="w3-table-all w3-table-sm" id="coordinator_table">
                                    <tr class="w3-theme" id="coordinator_table_th">
                                        <th class="nowrap">Registartion ID</th>
                                        <th class="nowrap">Name</th>
                                        <th class="nowrap">Mobile No</th>
                                        <th class="nowrap">Email-id</th>
                                        <th class="nowrap">Date Of Birth</th>
                                        <th class="nowrap">Gender</th>
                                        <th class="nowrap">Qualification</th>
                                        <th class="nowrap">Profession</th>
                                        <th class="nowrap">Address</th>
                                        <th class="nowrap">City</th>
                                        <th class="nowrap">State</th>
                                        <th class="nowrap">Pincode</th>
                                        <th class="nowrap">Registered on</th>
                                        <th class="nowrap ignore-heading">Image</th>
                                        <th class="nowrap"></th>
                                        <th class="nowrap"></th>
                                        <th class="nowrap"></th>
                                    </tr>
                                    <tr class="w3-theme-2 ignore-heading" id="coord_table_filter">
                                        <td>
                                            <form id="coord__reg_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Registartion ID"
                                                        id="cord_reg_id"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="cord_reg_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_name_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Name"
                                                        id="coord_name"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_name_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_mobile_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Mobile No"
                                                        id="coord_mobile"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_mobile_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_email_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Email ID"
                                                        id="coord_email"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="display:inline"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_email_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_age_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="date" placeholder="dob"
                                                        id="coord_dob"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_age_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_gender_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Gender"
                                                        id="coord_gender"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_gender_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_qual_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Qualification"
                                                        id="coord_qual"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_qual_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_prof_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Profession"
                                                        id="coord_prof"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_prof_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_addr_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Address"
                                                        id="coord_addr"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="display:inline"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_addr_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_district_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="District"
                                                        id="coord_district"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_district_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_state_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="State"
                                                        id="coord_state"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_state_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="coord_pin_idFilterForm">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" placeholder="Pincode"
                                                        id="coord_pin"
                                                        class="w3-white w3-text-theme form-control"
                                                        style="width:120px;"
                                                    >
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-info" type="submit"
                                                        id="coord_pin_idBtn"
                                                    >
                                                            <span class="fa fa-search"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </td>
                                        <td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    </thead>
                                    <tbody id="coordinator-body"></tbody>
                                </table>
                                <div id="coordinator_msg"></div>
                            </div>
                            <div id="exportCoordDiv" class=""></div>
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

        <!-- Add Coordinator Modal -->

        <div class="modal res-modal" id="addCoordinatorModal" data-backdrop="static">
          <div class="modal-dialog res-modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php echo base_url()?>admin/coordinator/add" method="POST" enctype="multipart/form-data">
                <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                    <h5 class="modal-title" style="display: inline;">Add Coordinator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display:flow-root;">
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Coordinator Name</label>
                      <div class="col-md-12">
                          <input name="coordinator_name" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile No</label>
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email ID</label>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6">
                          <input name="mobile_no" class="form-control">
                      </div>
                      <div class="col-md-6">
                          <input type="email" name="email_id" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                      <div class="col-md-12">
                          <input name="address" class="form-control">
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
                          <input class="form-check-input" type="radio" name="gender" value="1" id="inlineRadio1">
                          <label class="form-check-label" for="inlineRadio1" style="padding:0px 5px;">Male</label>
                        </div>
                        <div class="form-check form-check-inlin col-md-6" style="padding:0px;">
                          <input class="form-check-input" type="radio" name="gender" value="0" id="inlineRadio2">
                          <label class="form-check-label" for="inlineRadio2" style="padding:0px 5px;">Female</label>
                        </div>
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
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Image</label>
                      <div class="col-md-6">
                          <input name="pincode" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="file" name="photo" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Qualification</label>
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Profession</label>
                      <div class="col-md-6">
                          <input name="qualification" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="profession" class="form-control">
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

        <div class="modal res-modal" id="editCoordinatorModal" data-backdrop="static">
          <div class="modal-dialog res-modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php echo base_url()?>admin/coordinator/edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="coord_id" name="coord_id">
                <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                    <h5 class="modal-title" style="display: inline;">Edit Coordinator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display:flow-root;">
                  <div class="col-md-8" style="padding:0px;">
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Coordinator Name</label>
                        <div class="col-md-12">
                            <input name="coordinator_name" id="coordinator_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                        <div class="col-md-12">
                            <input name="address" id="address" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img id="coord_image" class="img img-responsive" style="height:143px;border:1px solid #eeeeee; width:100%" alt="Coordinator Photo">
                  </div>
                  <div class="form-group">
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile No</label>
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Email ID</label>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6">
                          <input name="mobile_no" id="mobile_no" class="form-control">
                      </div>
                      <div class="col-md-6">
                          <input type="email" name="email_id" id="email_id" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Date of Birth</label>
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Gender</label>
                  </div>
                  <div class="col-md-12" style="padding:0px;">
                      <div class="col-md-6" style="padding:0px;">
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
                            <select name="dob_year" class="form-control" id="dob_year">
                              <?php for($i=date('Y'); $i>=1947; $i--): ?>
                                <option><?php echo $i; ?></option>
                              <?php endfor; ?>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-6" style="padding:5px 10px;">
                        <div class="form-check form-check-inline col-md-6">
                          <input class="form-check-input" type="radio" name="gender" id="gender1" value="1">
                          <label class="form-check-label" for="gender1" style="padding:0px 5px;">Male</label>
                        </div>
                        <div class="form-check form-check-inlin col-md-6" style="padding:0px;">
                          <input class="form-check-input" type="radio" name="gender" id="gender2" value="0">
                          <label class="form-check-label" for="gender2" style="padding:0px 5px;">Female</label>
                        </div>
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
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Edit Image</label>
                      <div class="col-md-6">
                          <input name="pincode" id="pincode" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="file" name="photo" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Qualification</label>
                      <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Profession</label>
                      <div class="col-md-6">
                          <input name="qualification" id="qualification" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="profession" id="profession" class="form-control">
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
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/manage_coordinator.js"></script>
    <script>
        var base_url = "<?php echo base_url() ?>";
    </script>

</body>
</html>
