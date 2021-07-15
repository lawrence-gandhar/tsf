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

// Function to post school registration data
function post_school_reg_data() {
    $(".resLoadingGif").show();
    $("#submitBtn").prop("disabled", true);
    $("#resSpan").html("");
    $.ajax({
        url: "post_school_reg.php",
        type: "POST",
        data:  new FormData($("#school_reg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success"){
                document.getElementById("school_reg_form").reset();
                msg = "School is registered successfully.";
                showMsgInModal(msg);
                $("#resModal").modal("hide");
                $("#detailModal").modal("show");
                $("#reg_id_span").html(result.school_reg_id);
                $("#school_name_span").html(result.school_name);
                $("#principal_name_span").html(result.principal_name);
                $("#principal_con_span").html(result.principal_con_no);
                $("#email_span").html(result.school_email);
                $("#school_phone_span").html(result.school_phone_no);
                $("#address_span").html(result.address);
                $("#city_span").html(result.school_city);
                $("#state_span").html(result.state_name);
                $("#pincode_span").html(result.pincode);
                genPDF(result.school_reg_id, result.school_name, result.principal_name,
                    result.principal_con_no, result.school_email, result.school_phone_no,
                    result.address, result.school_city, result.state_name, result.pincode);
            } else if(result.status == "error"){
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }
            $("#submitBtn").prop("disabled", false);
        },
        error: function(responseRes, textStatus, errorThrown) {
            showErrMsgInModal("Error in request...");
            $("#submitBtn").prop("disabled", false);
        }
    });
}

function genPDF(reg_id, school_name, principal_name, principal_con_no, school_email,
    school_phone_no, address, city, state, pincode) {
    var schHref = "school_pdf.php?reg_id=" + reg_id + "&school_name=" + school_name
        + "&principal_name=" + principal_name + "&principal_con_no=" + principal_con_no
        + "&school_email=" + school_email + "&school_phone_no=" + school_phone_no
        + "&address=" + address + "&city=" + city + "&state=" + state
        + "&pincode=" + pincode;
    $("#downloadBtn").attr("href", schHref);
}

$(document).ready(function (e) {
    $("#school_reg_form").on("submit", function(e) {
        $("#resModal").modal("show");
        $(".resLoadingGif").hide();
        $("#msg_div").html("");
        $("#resClose").hide();
        e.preventDefault();
        var confirmDialog = "<p class=\"text-warning\">If you once submit this "
            + "registration form, you will not be able to modify it again."
            + " Are you sure, you want to submit?</p>"
            + "<hr style=\"margin-top:8px;margin-bottom:8px;\">"
            + "<button type=\"button\" class=\"btn btn-default w3-right\""
            + " data-dismiss=\"modal\">No</button>"
            + "<button type=\"button\" class=\"btn btn-primary w3-right "
            + "w3-margin-right\" onclick=\"post_school_reg_data();\">Yes</button>";
        $("#resSpan").html(confirmDialog);
        return false;
    });
});
