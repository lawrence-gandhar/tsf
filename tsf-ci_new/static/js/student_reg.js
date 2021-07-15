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

// Function to show error message in modal
function showErrMsgInModal(errMsg) {
    $(".resLoadingGif").hide();
    $("#resModalBody").removeClass("text-success");
    $("#resModalBody").addClass("text-danger");
    $("#resSpan").html(errMsg);
    $("#resClose").show();
}
// Function to show any message except error in modal
function showMsgInModal(msg) {
    $(".resLoadingGif").hide();
    $("#resModalBody").removeClass("text-danger");
    $("#resModalBody").addClass("text-success");
    $("#resSpan").html(msg);
    $("#resClose").show();
}

// Fuction to show payment div
function showPaymentDiv(student_id, fee) {
    $("#stud_reg_2").hide();
    $("#stud_reg_1").hide();
    $("#stud_reg_3").show();
    $("#feeSpan").html("Rs. " + fee);
    $("#student_id").html(student_id);
    $("#resModal").modal("hide");
}

// Submit Student registration form with offline payment
function submit_stud_reg_form_offline() {
    $("#resModal").modal("show");
    $(".resLoadingGif").show();
    $("#regOfflineBtn").prop("disabled", true);
    $("#regOnlineBtn").prop("disabled", true);
    $("#msg_div").html("");
    $("#resSpan").html("");
    $.ajax({
        url: "post_student_reg_offline.php",
        type: "POST",
        data:  new FormData($("#student_reg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success"){
                document.getElementById("student_reg_form").reset();
                msg = "Registeration form submitted.";
                showMsgInModal(msg);
                $("#resModal").modal("hide");
                $("#detailModal").modal("show");
                $("#reg_id_span").html(result.student_reg_id);
                $("#stud_name_span").html(result.student_name);
                $("#f_name_span").html(result.father_name);
                $("#dob_span").html(result.dob);
                if (result.gender == 1) {
                    var gender = "Male";
                } else {
                    var gender = "Female";
                }
                $("#gender_span").html(gender);
                $("#mob_span").html(result.mobile_no);
                $("#email_span").html(result.stud_email);
                $("#school_name_span").html(result.school_name);
                $("#class_span").html(result.class_name);
                $("#exam_span").html(result.exam_type);
                $("#address_span").html(result.address);
                $("#city_span").html(result.stud_city);
                $("#state_span").html(result.state_name);
                $("#pincode_span").html(result.stud_pincode);
                $("#fee_span").html(result.fee + " (Not Paid)");
                $("#payment_span").html(result.payment_medium);
                var stud_img_html = "";
                if(result.stud_img) {
                    stud_img_html = "<img src=\"" + result.stud_img + "\" "
                        + "alt=\"Image\" style=\"width: 80px; height: 100px;\">";
                }
                $("#stud_img").html(stud_img_html);
                genPDF(result.student_reg_id, result.student_name, result.father_name,
                    result.dob, gender, result.mobile_no, result.stud_email,
                    result.school_name, result.class_name, result.exam_type,
                    result.address, result.stud_city, result.state_name,
                    result.stud_pincode, result.fee + " (Not Paid)",
                    result.payment_medium, result.stud_img);
            } else if(result.status == "error"){
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }
            $("#regOfflineBtn").prop("disabled", false);
            // $("#regOnlineBtn").prop("disabled", false);
        },
        error: function(responseRes, textStatus, errorThrown) {
            console.log(responseRes)
            showErrMsgInModal("Error in request...");
            $("#regOfflineBtn").prop("disabled", false);
            // $("#regOnlineBtn").prop("disabled", false);
        }
    });
    return false;
}

function reg_with_offline_payment() {
    $("#student_reg_form").submit();
    $(".res-modal").modal('show');
    $(".resLoadingGif").hide();
    $("#resClose").hide();
    var confirmDialog = "<p class=\"text-warning\">If you once submit this "
        + "registration form, you will not be able to modify it again."
        + " Are you sure, you want to submit?</p>"
        + "<hr style=\"margin-top:8px;margin-bottom:8px;\">"
        + "<button type=\"button\" class=\"btn btn-default w3-right\""
        + " data-dismiss=\"modal\">No</button>"
        + "<button type=\"button\" class=\"btn btn-primary w3-right "
        + "w3-margin-right\" onclick=\"submit_stud_reg_form_offline();\">Yes</button>";
    $("#resSpan").html(confirmDialog);
    return false;
}

// Submit Student registration form with offline payment
function submit_stud_reg_form_online() {
    $("#resModal").modal("show");
    $(".resLoadingGif").show();
    $("#regOfflineBtn").prop("disabled", true);
    $("#regOnlineBtn").prop("disabled", true);
    $("#msg_div").html("");
    $("#resSpan").html("");
    $.ajax({
        url: "post_student_reg_online.php",
        type: "POST",
        data:  new FormData($("#student_reg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success"){
                // document.getElementById("student_reg_form").reset();
                msg = "Registeration form submitted.";
                showMsgInModal(msg);
                // show_reg_preview(result.student_id);
                // showPaymentDiv(result.student_id, result.fee);
            } else if(result.status == "error"){
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }
            $("#regOfflineBtn").prop("disabled", false);
            // $("#regOnlineBtn").prop("disabled", false);
        },
        error: function(responseRes, textStatus, errorThrown) {
            showErrMsgInModal("Error in request...");
            $("#regOfflineBtn").prop("disabled", false);
            // $("#regOnlineBtn").prop("disabled", false);
        }
    });
    return false;
}

function reg_with_online_payment() {
    $("#student_reg_form").submit();
    $(".res-modal").modal('show');
    $(".resLoadingGif").hide();
    $("#resClose").hide();
    var confirmDialog = "<p class=\"text-warning\">If you once submit this "
        + "registration form, you will not be able to modify it again."
        + " Are you sure, you want to submit?</p>"
        + "<hr style=\"margin-top:8px;margin-bottom:8px;\">"
        + "<button type=\"button\" class=\"btn btn-default w3-right\""
        + " data-dismiss=\"modal\">No</button>"
        + "<button type=\"button\" class=\"btn btn-primary w3-right "
        + "w3-margin-right\" onclick=\"submit_stud_reg_form_online();\">Yes</button>";
    $("#resSpan").html(confirmDialog);
    return false;
}

// Make payment
function make_payment() {
    $("#resModal").modal("show");
    $(".resLoadingGif").show();
    $("#submitPaymentBtn").prop("disabled", true);
    $("#msg_div").html("");
    $.ajax({
        url: "payment.php",
        type: "POST",
        data: new FormData($("#fee_payment_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success"){
                document.getElementById("fee_payment_form").reset();
                msg = "Student is registered successfully.";
                showMsgInModal(msg);
                // show_reg_preview(result.student_id);
            } else if(result.status == "error"){
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }
            $("#submitPaymentBtn").prop("disabled", false);
        },
        error: function(responseRes, textStatus, errorThrown) {
            showErrMsgInModal("Error in request...");
            $("#submitPaymentBtn").prop("disabled", false);
        }
    });
    return false;
}

$(document).ready(function() {
    var stage = getUrlParameter("stage");
    if(stage === "Apply") {
        $("#stud_reg_1").hide();
        $("#stud_reg_2").show();
    }
    else if(stage === "student_registration") {
        $("#stud_reg_2").hide();
        $("#stud_reg_1").show();
    }
    else {
        $("#stud_reg_2").hide();
        $("#stud_reg_1").show();
    }
    $(".stud_reg_a").on("click", function(){
        $("#stud_reg_2").hide();
        $("#stud_reg_1").show();
    });
    $(".apply_a").on("click", function(){
        $("#stud_reg_1").hide();
        $("#stud_reg_2").show();
    });
    $("#tsf_scholar").on("change", function(){
        try {
            var tsf_scholar = $("#tsf_scholar").val().trim();
            var classVal = $("#classSelect").val().trim();
            if(tsf_scholar && classVal) {
                $("#linkBtn").show();
            }
            else {
                $("#linkBtn").hide();
            }
        }
        catch(err) {}
    });
    $("#classSelect").on("change", function(){
        try {
            var tsf_scholar = $("#tsf_scholar").val().trim();
            var classVal = $("#classSelect").val().trim();
            if(tsf_scholar && classVal) {
                $("#linkBtn").show();
            }
            else {
                $("#linkBtn").hide();
            }
        }
        catch(err) {}
    });
    $("#downloadSyllabusBtn").on("click", function() {
        var tsf_scholar = $("#tsf_scholar").val().trim();
        var classVal = $("#classSelect").val().trim();
        if(tsf_scholar && classVal) {
            $.ajax({
                url: "/get_syllabus.php",
                type: "GET",
                data: {
                    class: classVal,
                    tsf_scholar: tsf_scholar,
                },
                success: function(result){
                    var msg = "";
                    if(result.status == "success"){
                        var downloadLink = $("<a href=\"" + result.syllabus_url
                            + "\" download>download</a>");
                        $("#downloadLinkSpan").html(downloadLink);
                        downloadLink[0].click();
                    } else if(result.status == "error"){
                        msg = result.msg;
                        showErrMsgInModal(msg);
                    }
                },
                error: function(responseRes, textStatus, errorThrown) {
                    showErrMsgInModal("Error in request...");
                }
            });
        }
        else {
            $("#linkBtn").hide();
        }
    });
    $("#downloadMockPaperBtn").on("click", function() {
        var tsf_scholar = $("#tsf_scholar").val().trim();
        var classVal = $("#classSelect").val().trim();
        if(tsf_scholar && classVal) {
            $.ajax({
                url: "/get_mock_test_paper.php",
                type: "GET",
                data: {
                    class: classVal,
                    tsf_scholar: tsf_scholar,
                },
                success: function(result){
                    var msg = "";
                    if(result.status == "success"){
                        var downloadLink = $("<a href=\"" + result.mock_paper_url
                            + "\" download>download</a>");
                        $("#downloadLinkSpan").html(downloadLink);
                        downloadLink[0].click();
                    } else if(result.status == "error"){
                        msg = result.msg;
                        showErrMsgInModal(msg);
                    }
                },
                error: function(responseRes, textStatus, errorThrown) {
                    showErrMsgInModal("Error in request...");
                }
            });
        }
        else {
            $("#linkBtn").hide();
        }
    });
    $("#registerTestBtn").on("click", function() {
        var tsf_scholar = $("#tsf_scholar").val().trim();
        var classVal = $("#classSelect").val().trim();
        if(tsf_scholar && classVal) {
            $("#stud_reg_1").hide();
            $("#stud_reg_2").show();
            $("#class_select_data").val($("#classSelect").val());
            $("#tsf_scholar_data").val($("#tsf_scholar").val());
            filterParam = "stage=Apply";
            filterParam = encodeURI(filterParam);
            window.location.hash = filterParam;
        }
        else {
            $("#linkBtn").hide();
        }
    });
    // autocomplete for school list
    $("#school_name").on("focusin keydown", function(){
        var len = $("#school_name").val().trim().length;
        if(len === 0){
            $("#school_name").autocomplete({
                source : "/auto_school.php",
                minLength : 0,
                autoFocus: true,
            }).bind('focus', function(){ $(this).autocomplete("search"); });
        } else{
            $("#school_name").autocomplete({
                source: "/auto_school.php",
                minLength: 1,
                autoFocus: true,
            });
        }
    });
    $("#dob").datepicker({
        dateFormat: "dd-mm-yy",
        maxDate: "today",
        changeMonth: true,
        changeYear: true
    });
    $("#student_reg_form").on("submit", function(e) {
        e.preventDefault();
    });
});

function genPDF(reg_id, student_name, father_name, dob, gender, mobile_no,
                stud_email, school_name, class_name, exam_type, address,
                stud_city, state_name, stud_pincode, fee, payment_medium, stud_img) {
    var studHref = "student_pdf.php?reg_id=" + reg_id + "&student_name=" + student_name
        + "&father_name=" + father_name + "&dob=" + dob + "&gender=" + gender
        + "&mobile_no=" + mobile_no + "&stud_email=" + stud_email
        + "&school_name=" + school_name + "&class_name=" + class_name
        + "&exam_type=" + exam_type + "&address=" + address + "&city=" + stud_city
        + "&state=" + state_name + "&pincode=" + stud_pincode + "&fee=" + fee
        + "&payment_medium=" + payment_medium + "&stud_img=" + stud_img;
    $("#downloadBtn").attr("href", studHref);
}
