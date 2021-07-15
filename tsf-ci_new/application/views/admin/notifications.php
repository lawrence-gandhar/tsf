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
                        <div id="side-menu-4" class="w3-col w3-padding w3-padding-12 w3-bar-item w3-border w3-leftbar w3-border-theme-l1 w3-hover-theme-l1 w3-theme-l1 side-menu">
                            <a href="<?php echo base_url()?>admin/notifications" style="color:#FFFFFF;">
                                <img src="<?php echo base_url() ?>static/img/bg/bg1.png" class="overlay-div" />
                                <span>Notifications<i id="side-menu-triangle-4" class="fa fa-caret-left fa-4x w3-right w3-text-white side-menu-triangle" style="display:block;"></i></span>
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

                    <div id="content-container-4" class="w3-col content-container w3-animate-opacity" style="position:relative; display:block;">
                        <div class="w3-col w3-center w3-theme content-container-admin">
                            <span class="w3-xlarge">Notifications List</span>
                        </div>
                        <div class="w3-col w3-padding w3-padding-12 w3-white">
                          <a href="#" class="w3-btn w3-block w3-theme-1 w3-round w3-padding" data-target="#addNotificationModal" data-toggle="modal" style="background-color:#a5a1a1; color:#ffffff !important;">
                            <i class="fa fa-plus"></i> Add Notification
                          </a>
                          <div class="w3-col w3-responsive w3-responsive-sm" style="padding: 10px 0px 15px 0px; height:auto !important">
                            <table class="w3-table-all w3-table-sm">
                                <thead>
                                    <tr class="w3-theme">
                                        <th>Notification</th>
                                        <th>Link</th>
                                        <th>Updated On</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="notification_tbody">
                                    <?php
                                      $i = 0;
                                      foreach($notification_list as $_row):
                                    ?>
                                      <tr
                                        <?php if($_row["is_active"] == 0): ?>
                                          style='background-color:rgba(255, 0, 0, 0.28)'
                                        <?php endif; ?>
                                      >
                                        <td style="width:30%"><?php echo $_row["notification_text"]; ?></td>
                                        <td><?php echo $_row["link"]; ?></td>
                                        <td><?php echo $_row["updated_on"]; ?></td>
                                        <td class="ignore-heading" style="width:50px">
                                          <button onclick="edit_notification(<?php echo $_row["id"]; ?>)" style="background-color:#384044 !important;" class="w3-btn w3-theme w3-round w3-tiny">
                                            <i class="fa fa-pencil"></i> Edit
                                          </button>
                                        </td>
                                        <td class="ignore-heading" style="width:50px">
                                          <a href="<?php echo base_url() ?>admin/notifications/delete/<?php echo $_row["id"] ?>" style="background-color:#ef1515 !important;" class="w3-btn w3-theme w3-round w3-tiny btn">
                                            <i class="fa fa-trash"></i> Delete
                                          </button>
                                        </td>
                                        <td class="ignore-heading" style="width:50px">
                                          <?php if($_row["is_active"] == 1): ?>
                                          <a href="<?php echo base_url() ?>admin/notifications/deactivate/<?php echo $_row["id"] ?>" class="w3-btn w3-theme w3-round w3-tiny btn">
                                              Deactivate
                                            </button>
                                          <?php else: ?>
                                            <a href="<?php echo base_url() ?>admin/notifications/activate/<?php echo $_row["id"] ?>" style='background-color:#eeeeee !important; color:#000000 !important;' class="w3-btn w3-theme w3-round w3-tiny btn">
                                              Activate
                                            </button>
                                          <?php endif; ?>
                                        </td>
                                      </tr>
                                    <?php
                                      $i++;
                                      endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="exportStudDiv">
                          <?php if($i > 0) : ?>
                            <span class="w3-right totRecords" style="margin-bottom:100px;">Total Records: <?php echo $i; ?></span>
                          <?php else: ?>
                            <span class="w3-right totRecords" style="margin-bottom:100px;">No Records Found</span>
                          <?php endif; ?>
                        </div>
                    </div>
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

        <!-- Add Notifications Modal -->

        <div class="modal res-modal" id="addNotificationModal" data-backdrop="static">
          <div class="modal-dialog res-modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php echo base_url()?>admin/notifications/add" method="POST" enctype="multipart/form-data">
                <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                    <h5 class="modal-title" style="display: inline;">Add Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display:flow-root;">
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Details</label>
                      <div class="col-md-12">
                          <input name="ntfy_details" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Link</label>
                      <div class="col-md-12">
                          <input name="ntfy_link" class="form-control">
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

        <!-- Edit Notifications Modal -->

        <div class="modal res-modal" id="editNotificationModal" data-backdrop="static">
          <div class="modal-dialog res-modal-dialog" role="document">
            <div class="modal-content">
              <form action="<?php echo base_url()?>admin/notifications/edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="ntfy_id">
                <div class="modal-header" style="background-color:#035767; color:#ffffff;">
                    <h5 class="modal-title" style="display: inline;">Edit Notification</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display:flow-root;">
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Details</label>
                      <div class="col-md-12">
                          <input name="ntfy_details" id="ntfy_details" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-md-12 control-label" for="desc" style="margin-top:10px;">Link</label>
                      <div class="col-md-12">
                          <input name="ntfy_link" id="ntfy_link" class="form-control">
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
    <script type="text/javascript" src="<?php echo base_url() ?>static/js/manage_notifications.js"></script>
    <script>
        var base_url = "<?php echo base_url() ?>";

        var notification_list = $.parseJSON('<?php echo json_encode($notification_list); ?>');

    </script>

</body>
</html>
