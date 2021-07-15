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
        <section id="main-body">
            <div class="w3-container" style="padding:0;">
                <div class="w3-col m2 w3-hide-small w3-theme-d2">&nbsp;</div>
                <div id="Side-menu-bar" class="w3-col m2 w3-theme-d2 side-menu-bar"
                    style="position:fixed; z-index: +3; height:100%;overflow:auto;"
                >
                    <div class="w3-bar-block sideMenuDiv" style="margin-bottom:100px;">
                        <a class="cursor-pointer w3-bar-item w3-theme-d2 w3-hover-theme-d2 w3-hover-none w3-xlarge" onclick="ShowHideSideBar();">&nbsp;<span class="w3-right w3-xxlarge  w3-hide-large w3-hide-medium w3-text-white"> &times; &nbsp;&nbsp;</span></a>
                        <div id="side-menu-1" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span >School List<i id="side-menu-triangle-1" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
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
                            <span class="w3-xlarge">School List</span>
                        </div>
                        <img src="<?php echo base_url() ?>static/img/loading.gif" class="loading" alt="Loading..." id="schoolLoadingGif">
                        <div class="w3-col w3-padding w3-padding-12 w3-white">
                          <a href="#" class="w3-btn w3-block w3-theme-1 w3-round w3-padding" data-target="#addSchoolModal" data-toggle="modal" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-plus"></i> Add School
                          </a>&nbsp;&nbsp;
                          <a href="#" class="w3-text-theme-2 w3-btn w3-round w3-padding" onclick="return reset_school_list();" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-undo"></i> Reset List
                          </a>&nbsp;&nbsp;
                          <a href="#" class="w3-text-theme-2 w3-btn w3-round w3-padding" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-download"></i> Download XLS
                          </a>
                            <div class="w3-col w3-responsive w3-responsive-sm" style="padding: 10px 0px 15px 0px; height:auto !important">
                                <table class="w3-table-all w3-table-sm" id="school_table">
                                    <thead>
                                        <tr class="w3-theme" id="school_table_th">
                                            <th class="nowrap">Registartion ID</th>
                                            <th class="nowrap">School Name</th>
                                            <th class="nowrap">Principal Name</th>
                                            <th class="nowrap">Mobile no</th>
                                            <th class="nowrap">School Phone No</th>
                                            <th class="nowrap">Address</th>
                                            <th class="nowrap">City</th>
                                            <th class="nowrap">State</th>
                                            <th class="nowrap">Pincode</th>
                                            <th class="nowrap">Email-id</th>
                                            <th class="nowrap">Registered on</th>
                                            <th class="nowrap"></th>
                                            <th class="nowrap"></th>
                                        </tr>
                                        <tr class="w3-theme-2 ignore-heading" id="student_table_filter">
                                            <td>
                                                <form id="school_reg_idFilterForm">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Registartion ID"
                                                            id="school_reg_id"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:120px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                            id="school_searchReg_idBtn"
                                                        >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="school_nm_filterForm">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="School name"
                                                            id="school_nm_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="searchSchoolnmBtn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="principal_nm_filterForm">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Principal name"
                                                            id="principal_nm_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:120px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="searchPrincipalBtn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="mobile_sc_filterForm">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Mobile No"
                                                            id="mobile_sc_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:75px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="mobileScBtn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_phone_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Phone No"
                                                            id="sc_phone_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:100px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_phone_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_address_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Address"
                                                            id="sc_address_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:150px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_address_btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_city_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="City"
                                                            id="sc_city_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:75px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_city_Btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_state_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="State"
                                                            id="sc_state_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:60px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_state_Btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_pin_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Pin code"
                                                            id="sc_pin_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:75px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_pin_Btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <form id="sc_email_filter_form">
                                                    <div class="input-group input-group-sm">
                                                        <input type="text" placeholder="Email"
                                                            id="sc_email_filter"
                                                            class="w3-white w3-text-theme form-control"
                                                            style="width:170px;"
                                                        >
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-info" type="submit"
                                                                id="sc_email_Btn"
                                                            >
                                                                <span class="fa fa-search"></span>
                                                            </button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </td>
                                            <td></td><td></td><td></td>
                                        </tr>
                                    </thead>
                                    <tbody id="school_tbody"></tbody>
                                </table>
                                <div id="school_msg"></div>
                            </div>
                            <div id="exportSchoolDiv" class=""></div>
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

        <!-- Add School Modal -->

        <div class="modal res-modal" id="addSchoolModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
                <div class="modal-content">
                  <form action="<?php echo base_url()?>admin/school/add" method="POST">
                      <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                          <h5 class="modal-title" style="display: inline;">Add School</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" style="display:flow-root;">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
                            <div class="col-md-12">
                                <input name="school_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Principal Name</label>
                            <div class="col-md-12">
                                <input name="principal_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                            <div class="col-md-12">
                                <input name="address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile Number</label>
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone Number</label>
                            <div class="col-md-6">
                                <input name="mobile_number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input name="phone_number" class="form-control">
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
                                <input type="email" name="email" class="form-control">
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

        <div class="modal res-modal" id="editModal" data-backdrop="static">
            <div class="modal-dialog res-modal-dialog" role="document">
                <div class="modal-content">
                  <form action="<?php echo base_url()?>admin/school/edit" method="POST">
                      <input type="hidden" name="school_id" id="school_id" value="">
                      <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                          <h5 class="modal-title" style="display: inline;">Edit School</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body" style="display:flow-root;">
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">School Name</label>
                            <div class="col-md-12">
                                <input name="school_name" id="school_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Principal Name</label>
                            <div class="col-md-12">
                                <input name="principal_name" id="principal_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Address</label>
                            <div class="col-md-12">
                                <input name="address" id="address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Mobile Number</label>
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">Phone Number</label>
                            <div class="col-md-6">
                                <input name="mobile_number" id="mobile_number" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <input name="phone_number" id="phone_number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">City</label>
                            <label class="col-md-6 control-label" for="desc" style="margin-top:10px;">State</label>
                            <div class="col-md-6">
                                <input name="city" id="city" class="form-control">
                            </div>
                            <div class="col-md-6">
                              <select name="state" class="form-control" id="state">
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
                                <input type="email" name="email" id="email" class="form-control">
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
