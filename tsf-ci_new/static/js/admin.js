function bindTableExport(el, file_name) {
    var table = el.tableExport();
    table.update({
        headings: true,
        bootstrap: true,
        formats: ["xls"],
        separator: "\t",
        filename: file_name
    });
    el.find(".xls").hide();
    return table;
}

function downloadStudXLS() {
    $("#student_table .xls").click();
}
function downloadSchoolXLS() {
    $("#school_table .xls").click();
}
function downloadCoordXLS() {
    $("#coordinator_table .xls").click();
}

// Function to open modal for adding notification
function open_add_ntf_modal() {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Add New Notification");
    var add_ntf_html = "<form name=\"add_ntf_form\" id=\"add_ntf_form\">"
        + "<label class=\"w3-text-teal w3-text-theme\">Notification Text "
        + "<span class=\"w3-text-red\" title=\"Required Field\">*</span></label>"
        + "<input id=\"ntf_text\" name=\"ntf_text\" class=\"w3-input w3-white "
        + "w3-round w3-border w3-padding w3-text-theme\" type=\"text\" "
        + "placeholder=\"Notification text\" required=\"required\" maxlength=\"500\""
        + " minlength=\"3\"><div class=\"w3-padding\"></div>"
        + "<label class=\"w3-text-teal w3-text-theme\">Notification Link </label>"
        + "<input class=\"w3-input w3-white w3-round w3-border w3-padding w3-text-theme\""
        + " placeholder=\"Notification Link (Optional)\" name=\"ntf_link\" id=\"ntf_link\""
        + " maxlength=\"1024\" type=\"text\" /><hr style=\"margin-bottom:8px;\">"
        + "<input type=\"hidden\" value=\"1\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"ntfAddSubmit\" name=\"ntfAddSubmit\""
        + "onclick=\"return add_notification();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button></form>";
    $("#resContent").html(add_ntf_html);
}

// Function for adding new notification
function add_notification() {
    $("#resSpan").html("");
    $("#ntfAddSubmit").prop("disabled", true);
    $(".resLoadingGif").show();

    fdata = $("#add_ntf_form").serialize()

    $.post(base_url+"ass", fdata, function(data){

        result = $.parseJSON(data);

        var msg = "";
        if(result.status == "success") {
            msg = "Notification added successfully.";
            $("#resSpan").html(msg);
            get_notification_list();
            document.getElementById("add_ntf_form").reset();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();
        $("#ntfAddSubmit").prop("disabled", false);
    });
    return false;
}

//**************************************************************** */
// function to get student list
//**************************************************************** */
  /*
function get_student_list() {
    $("#studLoadingGif").show();
    $("#student_msg").html("");
    $("#student_tbody").html("");

    $.get(base_url+"get_student_list", {}, function(result){});

    $.ajax({
        url: "get_student_list.php",
        type: "GET",
        data: {
            reg_id: $("#stud_reg_id").val(),
            student_name: $("#st_name_filter").val(),
            school_name: $("#school_filter").val(),
            coordinator: $("#cr_name_filter").val(),
            class: $("#class_filter").val(),
            gender: $("#gender_filter").val(),
            f_name: $("#f_name_filter").val(),
            phone_no: $("#st_phone_filter").val(),
            email: $("#st_email_filter").val(),
            address: $("#st_address_filter").val(),
            city: $("#st_city_filter").val(),
            state: $("#st_state_filter").val(),
            pincode: $("#st_pin_filter").val()
        },
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var student_list = result.student_list;
                if (student_list.length === 0) {
                    $("#student_msg").html("<center>No record.</center>");
                    $("#exportStudDiv").html("");
                } else {
                    var student_html = "";
                    for(var i in student_list) {
                        var stud_id = student_list[i].student_id;
                        var img_path = student_list[i].image_path;
                        var name = student_list[i].student_name;
                        var address = removeLineBreak(student_list[i].address);
                        student_html += "<tr><td class=\"nowrap\">"
                            + student_list[i].reg_id + "</td>"
                            + "<td class=\"nowrap\">" + name + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].school_name + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].coordinator + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].class + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].exam_type + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].fname + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].phone_no + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].dob + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].gender + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].email + "</td>"
                            + "<td class=\"nowrap\">" + address + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].city + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].state + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].pincode + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].fee + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].payment_medium + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].is_paid + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].transaction_id + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].paid_on + "</td>"
                            + "<td class=\"nowrap\">" + student_list[i].reg_on + "</td>";
                            if(img_path == null || img_path == "") {
                                student_html += "<td class=\"ignore-heading\"></td>";
                            } else {
                                student_html += "<td class=\"ignore-heading w3-text-theme\">"
                                    + "<span onclick=\"show_image('" + img_path + "', '"
                                    + name + "');\" role=\"button\">Show</span></td>";
                            }
                            + "<td class=\"ignore-heading\"><button type=\"button\" "
                            + "onclick=\"delete_student_record(" + stud_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                            + "><i class=\"fa fa-trash\"></i>  Delete</button></td></tr>";
                    }
                    $("#student_tbody").html(student_html);
                    bindTableExport($("#student_table"), "Student_List");
                    var totRecords = student_list.length;
                    var totRecordsHtml = "<span class=\"w3-right totRecords\">Total Record";
                    if(totRecords > 1) {
                        totRecordsHtml += "s";
                    }
                    totRecordsHtml += ": " + totRecords + "</span>";
                    var reportBtnHtml = "<button type=\"button\" class=\"xls w3-btn "
                        + "w3-theme \" onclick=\"downloadStudXLS();\">"
                        + "Export to xls</button>";
                    $("#exportStudDiv").html(reportBtnHtml + totRecordsHtml);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#student_msg").html(msg);
            }
            $("#studLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#student_msg").html("Error in request...");
            $("#studLoadingGif").hide();
        }
    });
    return false;
}

/*
// Delete Student record
function delete_student_record(stud_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete Student Record");
    $(".resLoadingGif").show();
    $.ajax({
        url: "get_student_list.php",
        type: "POST",
        data: {
            stud_id: stud_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Record deleted successfully.";
                $("#resSpan").html(msg);
                get_student_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}

// --------------------------------------------------------------------
// function to get coordinator list
function get_coordinator_list() {
    $("#coordLoadingGif").show();
    $("#coordinator_msg").html("");
    $.ajax({
        url: "get_coordinator_list.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var coordinator_list = result.coordinator_list;
                if (coordinator_list.length === 0) {
                    $("#coordinator_msg").html("<center>No record.</center>");
                } else {
                    var coordinator_html = "";
                    for(var i in coordinator_list) {
                        var img_path = coordinator_list[i].image_path;
                        var name = coordinator_list[i].name;
                        var address = removeLineBreak(coordinator_list[i].address);
                        coordinator_html += "<tr><td class=\"nowrap\">"
                            + coordinator_list[i].reg_id + "</td>"
                            + "<td class=\"nowrap\">" + name + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].mob_no + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].email + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].age + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].gender + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].qualification + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].profession + "</td>"
                            + "<td class=\"nowrap\">" + address + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].city + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].state + "</td>"
                            + "<td class=\"nowrap\">" + coordinator_list[i].pin + "</td>";
                        if(img_path == null || img_path == "") {
                            coordinator_html += "<td class=\"ignore-heading\"></td>";
                        } else {
                            coordinator_html += "<td class=\"ignore-heading w3-text-theme\">"
                                + "<span onclick=\"show_image('" + img_path + "', '"
                                + name + "');\" role=\"button\">Show</span></td>";
                        }
                        coordinator_html += "<td class=\"nowrap\">" + coordinator_list[i].reg_on
                            + "</td></tr>";
                    }
                    $("#coordinator_table_th").after(coordinator_html);
                    bindTableExport($("#coordinator_table"), "Coordinator_List");
                    var totRecords = coordinator_list.length;
                    var totRecordsHtml = "<span class=\"w3-right totRecords\">Total Record";
                    if(totRecords > 1) {
                        totRecordsHtml += "s";
                    }
                    totRecordsHtml += ": " + totRecords + "</span>";
                    var reportBtnHtml = "<button type=\"button\" class=\"xls w3-btn "
                        + "w3-theme \" onclick=\"downloadCoordXLS();\">"
                        + "Export to xls</button>";
                    $("#exportCoordDiv").html(reportBtnHtml + totRecordsHtml);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#coordinator_msg").html(msg);
            }
            $("#coordLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#coordinator_msg").html("Error in request...");
            $("#coordLoadingGif").hide();
        }
    });
}
// ---------------------------------------------------------------------
// function to get notification list
function get_notification_list() {
    $("#notificationLoadingGif").show();
    $("#notification_msg").html("");
    $("#notification_tbody").html("");
    $.ajax({
        url: "notification.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var notification_list = result.notification_list;
                if (notification_list.length === 0) {
                    $("#notification_msg").html("<center>No record.</center>");
                } else {
                    var notification_html = "";
                    for(var i in notification_list) {
                        var ntf_id = notification_list[i].pk_id;
                        var ntf_text = notification_list[i].notification;
                        var ntf_link = notification_list[i].link;
                        notification_html += "<tr><td>" + ntf_text + "</td>"
                            + "<td>" + ntf_link + "</td>"
                            + "<td><button type=\"button\" id=\"ntfEditBtn\" "
                            + "onclick=\"open_edit_ntf_modal(" + ntf_id + ", '"
                            + ntf_text + "', '" + ntf_link + "');\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"ntfDeleteBtn\" "
                            + "onclick=\"delete_notification(" + ntf_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#notification_tbody").html(notification_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#notification_msg").html(msg);
            }
            $("#notificationLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#notification_msg").html("Error in request...");
            $("#notificationLoadingGif").hide();
        }
    });
}

// Function to delete notification
function delete_notification(ntf_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete Notification");
    $(".resLoadingGif").show();
    $.ajax({
        url: "notification.php",
        type: "POST",
        data: {
            ntf_id: ntf_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Notification deleted successfully.";
                $("#resSpan").html(msg);
                get_notification_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}

// Function for updating notification
function open_edit_ntf_modal(ntf_id, ntf_text, ntf_link) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit Notification");
    var edit_ntf_html = "<form name=\"edit_ntf_form\" id=\"edit_ntf_form\">"
        + "<label class=\"w3-text-teal w3-text-theme\">Notification Text "
        + "<span class=\"w3-text-red\" title=\"Required Field\">*</span></label>"
        + "<input id=\"ntf_text\" name=\"ntf_text\" class=\"w3-input w3-white "
        + "w3-round w3-border w3-padding w3-text-theme\" type=\"text\" "
        + "placeholder=\"Notification text\" required=\"required\" maxlength=\"500\""
        + " minlength=\"3\" value=\"" + ntf_text + "\"><div class=\"w3-padding\"></div>"
        + "<label class=\"w3-text-teal w3-text-theme\">Notification Link </label>"
        + "<input class=\"w3-input w3-white w3-round w3-border w3-padding w3-text-theme\""
        + " placeholder=\"Notification Link (Optional)\" name=\"ntf_link\" id=\"ntf_link\""
        + " maxlength=\"1024\" type=\"text\" value=\"" + ntf_link
        + "\"/><hr style=\"margin-bottom:8px;\">"
        + "<input type=\"hidden\" value=\"" + ntf_id + "\" name=\"ntf_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"ntfRecEditBtn\" name=\"ntfRecEditBtn\""
        + "onclick=\"return edit_notification();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button></form>";
    $("#resContent").html(edit_ntf_html);
}

// Function for adding new notification
function edit_notification() {
    $("#resSpan").html("");
    $("#ntfRecEditBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "notification.php",
        type: "POST",
        data:  new FormData($("#edit_ntf_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Notification updated successfully.";
                $("#resSpan").html(msg);
                get_notification_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#ntfRecEditBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#ntfRecEditBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}


// ---------------------------------------------------------------------
// function to get carousel image list
function get_carousel_img_list() {
    $("#carouselImgLoadingGif").show();
    $("#carousel_img_msg").html("");
    $("#carousel_img_tbody").html("");
    $.ajax({
        url: "carousel_img.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var carousel_image_list = result.carousel_image_list;
                if (carousel_image_list.length === 0) {
                    $("#carousel_img_msg").html("<center>No record.</center>");
                } else {
                    var carousel_html = "";
                    for(var i in carousel_image_list) {
                        var carousel_id = carousel_image_list[i].pk_id;
                        var image_path = carousel_image_list[i].image_path;
                        carousel_html += "<tr><td>" + image_path + "</td>"
                            + "<td><button type=\"button\" id=\"carouselEditBtn\" "
                            + "onclick=\"open_edit_carousel_modal(" + carousel_id
                            + ");\" class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"carouselDeleteBtn\" "
                            + "onclick=\"delete_carousel_img(" + carousel_id + ");\""
                            + " class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#carousel_img_tbody").html(carousel_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#carousel_img_msg").html(msg);
            }
            $("#carouselImgLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#carousel_img_msg").html("Error in request...");
            $("#carouselImgLoadingGif").hide();
        }
    });
}

// Function to open modal for updating carousel image
function open_edit_carousel_modal(carousel_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit carousel image");
    var edit_cimg_html = "<form name=\"edit_cimg_form\" id=\"edit_cimg_form\" "
        + "enctype=\"multipart/form-data\">"
        + "<input id=\"carousel_image\" name=\"carousel_image\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload Carousel image\" required=\"required\" "
        + "accept=\"image/*\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"" + carousel_id + "\" name=\"carousel_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"cimgEditBtn\" name=\"cimgEditBtn\""
        + "onclick=\"return edit_carousel_img();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> Image Max-size: 400 KB</span></form>";
    $("#resContent").html(edit_cimg_html);
}

// Function for updating carousel image
function edit_carousel_img() {
    $("#resSpan").html("");
    $("#cimgEditBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "carousel_img.php",
        type: "POST",
        data:  new FormData($("#edit_cimg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Image uploaded successfully.";
                $("#resSpan").html(msg);
                get_carousel_img_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#cimgEditBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#cimgEditBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to open modal for adding carousel image
function open_add_cimg_modal() {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Upload New Carousel Image");
    var add_cimg_html = "<form name=\"add_cimg_form\" id=\"add_cimg_form\" "
        + "enctype=\"multipart/form-data\">"
        + "<input id=\"carousel_image\" name=\"carousel_image\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload Carousel image\" required=\"required\" "
        + "accept=\"image/*\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"1\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"cimgAddBtn\" name=\"cimgAddBtn\""
        + "onclick=\"return add_carousel_img();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> Image Max-size: 400 KB</span></form>";
    $("#resContent").html(add_cimg_html);
}

// Function for adding new carousel image
function add_carousel_img() {
    $("#resSpan").html("");
    $("#cimgAddBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "carousel_img.php",
        type: "POST",
        data:  new FormData($("#add_cimg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Image uploaded successfully.";
                $("#resSpan").html(msg);
                get_carousel_img_list();
                document.getElementById("add_cimg_form").reset();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#cimgAddBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#cimgAddBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to delete carousel image
function delete_carousel_img(carousel_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete carousel image");
    $(".resLoadingGif").show();
    $.ajax({
        url: "carousel_img.php",
        type: "POST",
        data: {
            carousel_id: carousel_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Carousel image deleted successfully.";
                $("#resSpan").html(msg);
                get_carousel_img_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}
// ---------------------------------------------------------------------
// function to get gallery image list
function get_gallery_img_list() {
    $("#galleryImgLoadingGif").show();
    $("#gallery_img_msg").html("");
    $("#gallery_img_tbody").html("");
    $.ajax({
        url: "gallery.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var gallery_image_list = result.gallery_image_list;
                if (gallery_image_list.length === 0) {
                    $("#gallery_img_msg").html("<center>No record.</center>");
                } else {
                    var gallery_html = "";
                    for(var i in gallery_image_list) {
                        var gallery_id = gallery_image_list[i].pk_id;
                        var image_path = gallery_image_list[i].image_path;
                        gallery_html += "<tr><td>" + image_path + "</td>"
                            + "<td><button type=\"button\" id=\"galleryEditBtn\" "
                            + "onclick=\"open_edit_gallery_modal(" + gallery_id
                            + ");\" class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"galleryDeleteBtn\" "
                            + "onclick=\"delete_gallery_img(" + gallery_id + ");\""
                            + " class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#gallery_img_tbody").html(gallery_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#gallery_img_msg").html(msg);
            }
            $("#galleryImgLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#gallery_img_msg").html("Error in request...");
            $("#galleryImgLoadingGif").hide();
        }
    });
}

// Function to open modal for editing gallery image
function open_edit_gallery_modal(gallery_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit gallery image");
    var edit_gimg_html = "<form name=\"edit_gallery_form\" id=\"edit_gallery_form\" "
        + "enctype=\"multipart/form-data\">"
        + "<input id=\"gallery_image\" name=\"gallery_image\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload gallery image\" required=\"required\" "
        + "accept=\"image/*\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"" + gallery_id + "\" name=\"gallery_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"gimgEditBtn\" name=\"cimgEditBtn\""
        + "onclick=\"return edit_gallery_img();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> Image Max-size: 400 KB</span></form>";
    $("#resContent").html(edit_gimg_html);
}

// Function for updating gallery image
function edit_gallery_img() {
    $("#resSpan").html("");
    $("#gimgEditBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "gallery.php",
        type: "POST",
        data:  new FormData($("#edit_gallery_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Image uploaded successfully.";
                $("#resSpan").html(msg);
                get_gallery_img_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#gimgEditBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#gimgEditBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to open modal for adding gallery image
function open_add_gallery_modal() {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Upload New Gallery Image");
    var add_cimg_html = "<form name=\"add_gallery_form\" id=\"add_gallery_form\" "
        + "enctype=\"multipart/form-data\">"
        + "<input id=\"gallery_image\" name=\"gallery_image\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload gallery image\" required=\"required\" "
        + "accept=\"image/*\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"1\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"gimgAddBtn\" name=\"gimgAddBtn\""
        + "onclick=\"return add_gallery_img();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> Image Max-size: 400 KB</span></form>";
    $("#resContent").html(add_cimg_html);
}

// Function for adding new gallery image
function add_gallery_img() {
    $("#resSpan").html("");
    $("#gimgAddBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "gallery.php",
        type: "POST",
        data:  new FormData($("#add_gallery_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Image uploaded successfully.";
                $("#resSpan").html(msg);
                get_gallery_img_list();
                document.getElementById("add_gallery_form").reset();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#gimgAddBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#gimgAddBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to delete gallery image
function delete_gallery_img(gallery_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete gallery image");
    $(".resLoadingGif").show();
    $.ajax({
        url: "gallery.php",
        type: "POST",
        data: {
            gallery_id: gallery_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Gallery image deleted successfully.";
                $("#resSpan").html(msg);
                get_gallery_img_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}

// ---------------------------------------------------------------------
// function to get quick contact list
function get_quick_contact_list() {
    $("#quickImgLoadingGif").show();
    $("#quick_contact_msg").html("");
    $("#quick_contact_tbody").html("");
    $.ajax({
        url: "quick_contact.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var quick_contact_list = result.quick_contact_list;
                if (quick_contact_list.length === 0) {
                    $("#quick_contact_msg").html("<center>No record.</center>");
                } else {
                    var quick_contact_html = "";
                    for(var i in quick_contact_list) {
                        var qc_id = quick_contact_list[i].pk_id;
                        var admin_response = quick_contact_list[i].admin_response;
                        quick_contact_html += "<tr><td class=\"nowrap\">"
                            + quick_contact_list[i].name + "</td>"
                            + "<td class=\"nowrap\">" + quick_contact_list[i].email_id
                            + "</td><td class=\"nowrap\">"
                            + quick_contact_list[i].contact_no + "</td>"
                            + "<td>" + quick_contact_list[i].message + "</td>"
                            + "<td class=\"nowrap\">" + quick_contact_list[i].enquiry_on
                            + "</td><td>" + admin_response + "</td>"
                            + "<td class=\"nowrap\">"
                            + quick_contact_list[i].admin_responded_on + "</td>"
                            + "<td><button type=\"button\" id=\"qcEditBtn\" "
                            + "onclick=\"open_edit_quick_contact_modal("
                            + qc_id + ", '" + admin_response + "');\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"qcDeleteBtn\" "
                            + "onclick=\"delete_quick_contact(" + qc_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#quick_contact_tbody").html(quick_contact_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#quick_contact_msg").html(msg);
            }
            $("#quickImgLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#quick_contact_msg").html("Error in request...");
            $("#quickImgLoadingGif").hide();
        }
    });
}

// Function to delete quick_contact
function delete_quick_contact(qc_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete Record");
    $(".resLoadingGif").show();
    $.ajax({
        url: "quick_contact.php",
        type: "POST",
        data: {
            qc_id: qc_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Record deleted successfully.";
                $("#resSpan").html(msg);
                get_quick_contact_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}

// Function for updating quick_contact
function open_edit_quick_contact_modal(qc_id, admin_response) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit Response");
    var edit_qc_html = "<form name=\"edit_qc_form\" id=\"edit_qc_form\">"
        + "<label class=\"w3-text-teal w3-text-theme\">Admin Response "
        + "<span class=\"w3-text-red\" title=\"Required Field\">*</span></label>"
        + "<input id=\"admin_response\" name=\"admin_response\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"text\" "
        + "placeholder=\"Give your response\" required=\"required\" maxlength=\"1000\""
        + " minlength=\"3\" value=\"" + admin_response + "\"><div class=\"w3-padding\">"
        + "</div><input type=\"hidden\" value=\"" + qc_id + "\" name=\"qc_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"qcRecEditBtn\" name=\"qcRecEditBtn\""
        + "onclick=\"return edit_quick_contact();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button></form>";
    $("#resContent").html(edit_qc_html);
}

// Function for adding new quick_contact
function edit_quick_contact() {
    $("#resSpan").html("");
    $("#qcRecEditBtn").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "quick_contact.php",
        type: "POST",
        data:  new FormData($("#edit_qc_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Response updated successfully.";
                $("#resSpan").html(msg);
                get_quick_contact_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#qcRecEditBtn").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#qcRecEditBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}
// ---------------------------------------------------------------------
// function to get syllabus list
function get_syllabus_list() {
    $("#syllabusLoadingGif").show();
    $("#syllabus_msg").html("");
    $("#syllabus_tbody").html("");
    $.ajax({
        url: "exam_syllabus.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var syllabus_file_list = result.syllabus_file_list;
                if (syllabus_file_list.length === 0) {
                    $("#syllabus_msg").html("<center>No record.</center>");
                } else {
                    var syllabus_html = "";
                    for(var i in syllabus_file_list) {
                        var syllabus_id = syllabus_file_list[i].pk_id;
                        var file_path = syllabus_file_list[i].file_path;
                        var class_name = syllabus_file_list[i].class;
                        var exam_type = syllabus_file_list[i].exam_type;
                        syllabus_html += "<tr><td>" + exam_type + "</td>"
                            + "<td>" + class_name + "</td>"
                            + "<td>" + file_path + "</td>"
                            + "<td><button type=\"button\" id=\"syllabusEditBtn\" "
                            + "onclick=\"open_edit_syllabus_modal(" + syllabus_id
                            + ");\" class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"syllabusDeleteBtn\" "
                            + "onclick=\"delete_syllabus(" + syllabus_id + ");\""
                            + " class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#syllabus_tbody").html(syllabus_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#syllabus_msg").html(msg);
            }
            $("#syllabusLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#syllabus_msg").html("Error in request...");
            $("#syllabusLoadingGif").hide();
        }
    });
}

// Function to open modal for editing syllabus
function open_edit_syllabus_modal(syllabus_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit Syllabus");
    var edit_syllabus_html = "<form name=\"edit_syllabus_form\" "
        + "id=\"edit_syllabus_form\" enctype=\"multipart/form-data\">"
        + "<input id=\"syllabus_file\" name=\"syllabus_file\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload syllabus file\" required=\"required\" "
        + "accept=\"*\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"" + syllabus_id
        + "\" name=\"syllabus_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"syllabusEditSubmit\" "
        + "name=\"syllabusEditSubmit\" onclick=\"return edit_syllabus();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> File Max-size: 2 MB</span></form>";
    $("#resContent").html(edit_syllabus_html);
}

// Function for updating syllabus
function edit_syllabus() {
    $("#resSpan").html("");
    $("#syllabusEditSubmit").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "exam_syllabus.php",
        type: "POST",
        data:  new FormData($("#edit_syllabus_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "File uploaded successfully.";
                $("#resSpan").html(msg);
                get_syllabus_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#syllabusEditSubmit").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#syllabusEditSubmit").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to open modal for adding syllabus
function open_add_syllabus_modal() {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Upload New Syllabus");
    var add_syllabus_html = "<form name=\"add_syllabus_form\" "
        + "id=\"add_syllabus_form\" enctype=\"multipart/form-data\">"
        + "<div class=\"w3-row\"><div class=\"w3-half w3-padding\">"
        + "<select class=\"w3-select w3-white w3-round w3-border w3-padding "
        + "w3-text-theme\" name=\"exam_type\" id=\"exam_type_sel\"></select>"
        + "</div><div class=\"w3-half w3-padding\">"
        + "<select class=\"w3-select w3-white w3-round w3-border w3-padding "
        + "w3-text-theme\" name=\"class\" id=\"classSelect\"></select>"
        + "</div></div><div class=\"w3-padding\">"
        + "<input id=\"syllabus_file\" name=\"syllabus_file\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload syllabus file\" required=\"required\" "
        + "></div><div class=\"w3-padding\">"
        + "<input type=\"hidden\" value=\"1\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"syllabusAddSubmit\" "
        + "name=\"syllabusAddSubmit\" onclick=\"return add_syllabus();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> File Max-size: 2 MB</span></div></form>";
    $("#resContent").html(add_syllabus_html);
    $("#classSelect").html($("#hiddenClassDiv").html());
    $("#exam_type_sel").html($("#hiddenExamDiv").html());
}

// Function for adding new syllabus
function add_syllabus() {
    $("#resSpan").html("");
    $("#syllabusAddSubmit").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "exam_syllabus.php",
        type: "POST",
        data:  new FormData($("#add_syllabus_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "File uploaded successfully.";
                $("#resSpan").html(msg);
                get_syllabus_list();
                document.getElementById("add_syllabus_form").reset();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#syllabusAddSubmit").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#syllabusAddSubmit").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to delete syllabus
function delete_syllabus(syllabus_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete syllabus file");
    $(".resLoadingGif").show();
    $.ajax({
        url: "exam_syllabus.php",
        type: "POST",
        data: {
            syllabus_id: syllabus_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Record deleted successfully.";
                $("#resSpan").html(msg);
                get_syllabus_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}

// ---------------------------------------------------------------------
// function to get mock test paper list
function get_test_paper_list() {
    $("#testPaperLoadingGif").show();
    $("#test_paper_msg").html("");
    $("#test_paper_tbody").html("");
    $.ajax({
        url: "mock_test_paper.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var test_paper_list = result.test_paper_list;
                if (test_paper_list.length === 0) {
                    $("#test_paper_msg").html("<center>No record.</center>");
                } else {
                    var test_paper_html = "";
                    for(var i in test_paper_list) {
                        var test_paper_id = test_paper_list[i].pk_id;
                        var file_path = test_paper_list[i].file_path;
                        var class_name = test_paper_list[i].class;
                        var exam_type = test_paper_list[i].exam_type;
                        test_paper_html += "<tr><td>" + exam_type + "</td>"
                            + "<td>" + class_name + "</td>"
                            + "<td>" + file_path + "</td>"
                            + "<td><button type=\"button\" id=\"paperEditBtn\" "
                            + "onclick=\"open_edit_paper_modal(" + test_paper_id
                            + ");\" class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            + "<td><button type=\"button\" id=\"paperDeleteBtn\" "
                            + "onclick=\"delete_test_paper(" + test_paper_id + ");\""
                            + " class=\"w3-btn w3-theme w3-round w3-tiny\">"
                            + "<i class=\"fa fa-trash\"></i>  Delete</button></td>"
                            + "</tr>";
                    }
                    $("#test_paper_tbody").html(test_paper_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#test_paper_msg").html(msg);
            }
            $("#testPaperLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#test_paper_msg").html("Error in request...");
            $("#testPaperLoadingGif").hide();
        }
    });
}

// Function to open modal for editing test_paper
function open_edit_paper_modal(test_paper_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Edit Mock Test Paper");
    var edit_test_paper_html = "<form name=\"edit_test_paper_form\" "
        + "id=\"edit_test_paper_form\" enctype=\"multipart/form-data\">"
        + "<input id=\"test_file\" name=\"test_file\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload test paper file\" required=\"required\" "
        + "><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"" + test_paper_id
        + "\" name=\"test_paper_id\">"
        + "<input type=\"hidden\" value=\"2\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"test_file_edit_Submit\" "
        + "name=\"test_file_edit_Submit\" onclick=\"return edit_test_paper();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> File Max-size: 2 MB</span></form>";
    $("#resContent").html(edit_test_paper_html);
}

// Function for updating test_paper
function edit_test_paper() {
    $("#resSpan").html("");
    $("#test_file_edit_Submit").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "mock_test_paper.php",
        type: "POST",
        data:  new FormData($("#edit_test_paper_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "File uploaded successfully.";
                $("#resSpan").html(msg);
                get_test_paper_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#test_file_edit_Submit").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#test_file_edit_Submit").prop("disabled", false);
            return false;
        }
    });
    return false;
}

// Function to open modal for adding test_paper
function open_add_test_paper_modal() {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Upload New Mock Test Paper");
    var add_test_paper_html = "<form name=\"add_test_paper_form\" "
        + "id=\"add_test_paper_form\" enctype=\"multipart/form-data\">"
        + "<div class=\"w3-row\"><div class=\"w3-half w3-padding\">"
        + "<select class=\"w3-select w3-white w3-round w3-border w3-padding "
        + "w3-text-theme\" name=\"exam_type\" id=\"exam_type_sel\"></select>"
        + "</div><div class=\"w3-half w3-padding\">"
        + "<select class=\"w3-select w3-white w3-round w3-border w3-padding "
        + "w3-text-theme\" name=\"class\" id=\"classSelect\"></select>"
        + "</div></div><div class=\"w3-padding\">"
        + "<input id=\"test_file\" name=\"test_file\" class=\"w3-input "
        + "w3-white w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Upload test paper file\" required=\"required\" "
        + "></div><div class=\"w3-padding\">"
        + "<input type=\"hidden\" value=\"1\" name=\"actionType\">"
        + "<button type=\"submit\" id=\"test_paperAddSubmit\" "
        + "name=\"test_paperAddSubmit\" onclick=\"return add_test_paper();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button>"
        + "<span class=\"w3-text-teal\"> File Max-size: 2 MB</span></div></form>";
    $("#resContent").html(add_test_paper_html);
    $("#classSelect").html($("#hiddenClassDiv").html());
    $("#exam_type_sel").html($("#hiddenExamDiv").html());
}

// Function for adding new test_paper
function add_test_paper() {
    $("#resSpan").html("");
    $("#test_paperAddSubmit").prop("disabled", true);
    $(".resLoadingGif").show();
    $.ajax({
        url: "mock_test_paper.php",
        type: "POST",
        data:  new FormData($("#add_test_paper_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "File uploaded successfully.";
                $("#resSpan").html(msg);
                get_test_paper_list();
                document.getElementById("add_test_paper_form").reset();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            $("#test_paperAddSubmit").prop("disabled", false);
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            $("#test_paperAddSubmit").prop("disabled", false);
            return false;
        }
    });
    return false;
}
// Function to delete test_paper
function delete_test_paper(test_paper_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete Mock Test Paper");
    $(".resLoadingGif").show();
    $.ajax({
        url: "mock_test_paper.php",
        type: "POST",
        data: {
            test_paper_id: test_paper_id,
            actionType: "-1",
        },
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Record deleted successfully.";
                $("#resSpan").html(msg);
                get_test_paper_list();
            } else if(result.status == "error") {
                msg = result.msg;
                $("#resSpan").html(msg);
            }
            $(".resLoadingGif").hide();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#resSpan").html("Error in request...");
            $(".resLoadingGif").hide();
            return false;
        }
    });
    return false;
}
// -----------------------------------------------------------------------
function set_class_option() {
    $.ajax({
        url: "/get_class.php",
        type: "GET",
        success: function(result) {
            var class_html = "";
            if(result.status == "success") {
                for(var i in result.class_list) {
                    class_html += "<option value=\""
                        + result.class_list[i].class_value
                        + "\">" + result.class_list[i].class_name + "</option>";
                }
            }
            $("#hiddenClassDiv").html(class_html);
        },
        error: function(responseRes, textStatus, errorThrown) {
            return false;
        }
    });
}

function set_exam_type_option() {
    $.ajax({
        url: "/get_exam_type.php",
        type: "GET",
        success: function(result) {
            var exam_html = "";
            if(result.status == "success") {
                for(var i in result.exam_list) {
                    exam_html += "<option value=\"" + result.exam_list[i].value
                        + "\">" + result.exam_list[i].exam_type + "</option>";
                }
            }
            $("#hiddenExamDiv").html(exam_html);
        },
        error: function(responseRes, textStatus, errorThrown) {
            return false;
        }
    });
}
// ----------------------------------------------------------------
// Function for sending messages
function send_message() {
    $("#msg_div").html("");
    $("#send_mesageBtn").prop("disabled", true);
    $(".msgLoadingGif").show();
    $.ajax({
        url: "send_msg.php",
        type: "POST",
        data:  new FormData($("#send_mesage_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                msg = "Message sent successfully.";
                $("#msg_div").html(msg);
                $("#contact_no").val("");
            } else if(result.status == "error") {
                msg = result.msg;
                $("#msg_div").html(msg);
            }
            $(".msgLoadingGif").hide();
            $("#send_mesageBtn").prop("disabled", false);
            get_sent_msg_list();
            return false;
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#msg_div").html("Error in request...");
            $(".msgLoadingGif").hide();
            $("#send_mesageBtn").prop("disabled", false);
            return false;
        }
    });
    return false;
}
// Get sent Message List
function get_sent_msg_list() {
    $("#get_message_msg").html("");
    $("#msgLoadingGif").show();
    $("#message_tbody").html("");
    $.ajax({
        url: "send_msg.php",
        type: "GET",
        cache: false,
        success: function(result){
            var msg = "";
            if(result.status == "success") {
                var msg_list = result.msg_list;
                if (msg_list.length === 0) {
                    $("#get_message_msg").html("<center>No record.</center>");
                } else {
                    var msg_html = "";
                    for(var i in msg_list) {
                        msg_html += "<tr><td>" + msg_list[i].mob_no + "</td>"
                            + "<td>" + inserLineBreak(msg_list[i].msg_body) + "</td>"
                            + "<td class=\"nowrap\">" + msg_list[i].sent_on + "</td>"
                            + "</tr>";
                    }
                    $("#message_tbody").html(msg_html);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#get_message_msg").html(msg);
            }
            $("#msgLoadingGif").hide();
        },
        error: function(responseRes, textStatus, errorThrown) {
            $("#get_message_msg").html("Error in request...");
            $("#msgLoadingGif").hide();
        }
    });
}
function inserLineBreak(string) {
    var line = string.split('\n');
    var ret = "", i, l = line.length;
    for(i = 0; i < l-1; i++) {
        ret += line[i] + "<br>";
    }
    ret += line[i];
    return ret;
}

$(document).ready(function (e) {
    // table export settings
    TableExport.prototype.bootstrapConfig = ["btn", "btn-info", "pb-0"];
    TableExport.prototype.ignoreCSS = "ignore-heading";
    // TableExport.prototype.ignoreRows = [1];
    var hashParam = getUrlParameter("tab");
    if (hashParam != -1) {
        $("#side-menu-"+hashParam).click();
    }
    get_school_list();
    get_student_list();
    get_coordinator_list();
    get_notification_list();
    get_carousel_img_list();
    get_gallery_img_list();
    get_quick_contact_list();
    get_syllabus_list();
    get_test_paper_list();
    set_class_option();
    set_exam_type_option();
    get_sent_msg_list();
    // autocomplete for school list
    $("#school_nm_filter").on("focusin keydown", function(){
        var len = $("#school_nm_filter").val().trim().length;
        if(len === 0){
            $("#school_nm_filter").autocomplete({
                source : "/auto_school.php",
                minLength : 0,
                autoFocus: true,
            }).bind('focus', function(){ $(this).autocomplete("search"); });
        } else{
            $("#school_nm_filter").autocomplete({
                source: "/auto_school.php",
                minLength: 1,
                autoFocus: true,
            });
        }
    });
    $("#school_filter").on("focusin keydown", function(){
        var len = $("#school_filter").val().trim().length;
        if(len === 0){
            $("#school_filter").autocomplete({
                source : "/auto_school.php",
                minLength : 0,
                autoFocus: true,
            }).bind('focus', function(){ $(this).autocomplete("search"); });
        } else{
            $("#school_filter").autocomplete({
                source: "/auto_school.php",
                minLength: 1,
                autoFocus: true,
            });
        }
    });
    // On change filter boxes
    $("#class_filter").on("change", function() {
        get_student_list();
    });
    $("#gender_filter").on("change", function() {
        get_student_list();
    });
    $("#school_filter").on("autocompleteselect", function (e, ui) {
        $("#school_filter").val(ui.item.value);
        get_student_list();
    });
    $(
        `#searchSchoolBtn, #searchReg_idBtn, #st_name_btn, #cr_name_btn,
        #f_name_btn, #st_phone_btn, #st_email_btn, #st_address_btn, #st_city_btn,
        #st_state_btn, #st_pin_btn`
    ).on("click", function(){
        get_student_list();
        return false;
    });
    $(
        `#school_filterForm, #reg_idFilterForm, #st_name_filter_form, #cr_name_filter_form,
        #f_name_filter_form, #st_phone_filter_form, #st_email_filter_form, #st_address_filter_form,
        #st_city_filter_form, #st_state_filter_form, #st_pin_filter_form`
    ).on("submit", function() {
        get_student_list();
        return false;
    });
    // ------------------------------------------------
    $("#school_nm_filter").on("autocompleteselect", function (e, ui) {
        $("#school_nm_filter").val(ui.item.value);
        get_school_list();
    });
    $(
        `#searchSchoolnmBtn, #searchPrincipalBtn, #school_searchReg_idBtn, #mobileScBtn,
        #sc_phone_btn, #sc_address_btn, #sc_city_btn, #sc_state_btn, #sc_pin_btn, #sc_email_btn`
    ).on("click", function(){
        get_school_list();
        return false;
    });
    $(
        `#school_nm_filterForm, #school_reg_idFilterForm, #principal_nm_filterForm,
        #mobile_sc_filterForm, #sc_phone_filter_form, #sc_address_filter_form,
        #sc_city_filter_form, #sc_state_filter_form, #sc_pin_filter_form, #sc_email_filter_form`
    ).on("submit", function() {
        get_school_list();
        return false;
    });
    $("#send_mesage_form").on("submit", function() {
        send_message();
        return false;
    });
});

//------ Function to show submenu content
function ShowContent(id) {
    var i, x, tablinks;
    x = document.getElementsByClassName("side-menu-triangle");
    y = document.getElementsByClassName("content-container");
    tablinks = document.getElementsByClassName("side-menu");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
        y[i].style.display = "none";
        tablinks[i].className = tablinks[i].className.replace(" w3-theme-l1", "");
    }

    document.getElementById("side-menu-triangle-"+id).style.display = "block";
    document.getElementById("content-container-"+id).style.display = "block";
    $("#side-menu-"+id).addClass("w3-theme-l1");
    $("#Side-menu-bar").toggleClass("side-menu-bar");
    window.location.hash = "tab="+id;
}

//-- Function to show hide side menu bar
function ShowHideSideBar(){
    $("#Side-menu-bar").toggleClass("side-menu-bar");
}

// Get URL filter parameter value
function getUrlParameter(sParam) {
    var hash = window.location.hash;
    sPageURL = decodeURIComponent(hash.substring(1));
    sURLVariables = sPageURL.split('&');
    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? -1 : sParameterName[1];
        }
    }
    return -1;
};
function reset_student_list() {
    $("#stud_reg_id").val("");
    $("#school_filter").val("");
    $("#class_filter").val("");
    $("#gender_filter").val("");
    $("#st_name_filter, #st_phone_filter, #st_email_filter").val("");
    $("#cr_name_filter, #st_address_filter, #st_city_filter").val("");
    $("#f_name_filter, #st_state_filter, #st_pin_filter").val("");
    get_student_list();
}
function reset_school_list() {
    $("#school_reg_id").val("");
    $("#school_nm_filter").val("");
    $("#principal_nm_filter").val("");
    $("#mobile_sc_filter").val("");
    $("#sc_phone_filter").val("");
    $("#sc_address_filter").val("");
    $("#sc_city_filter").val("");
    $("#sc_state_filter").val("");
    $("#sc_pin_filter").val("");
    $("#sc_email_filter").val("");
    get_school_list();
}
*/

String.prototype.ucwords = function() {
    str = this.toLowerCase();
    return str.replace(/(^([a-zA-Z\p{M}]))|([ -][a-zA-Z\p{M}])/g,
        function($1){
            return $1.toUpperCase();
        });
}

function show_image(image_path, name) {
    $("#resModal").modal("show");
    var imgHTML = "<img src=\"" + image_path + "\" style='height:250px; width:auto;' class='img img-responsive'>";
    $("#resContent").html(imgHTML);
    $("#resSpan").html("");
    $("#resTitle").html(name.ucwords());
    $(".resLoadingGif").hide();
}

function removeLineBreak(string) {
    var line = string.split('\r\n');
    var ret = "", i, l = line.length;
    for(i = 0; i < l-1; i++) {
        ret += line[i] + " ";
    }
    ret += line[i];
    return ret;
}
