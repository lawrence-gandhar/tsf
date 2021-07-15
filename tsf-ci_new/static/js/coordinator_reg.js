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

// Function to post coordinator registration data
function post_coord_reg_data() {
    $(".resLoadingGif").show();
    $("#submitBtn").prop("disabled", true);
    $("#msg_div").html("");
    $("#resSpan").html("");
    $.ajax({
        url: "post_coordinator_reg.php",
        type: "POST",
        data:  new FormData($("#coordinator_reg_form")[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function(result){
            var msg = "";
            if(result.status == "success"){
                document.getElementById("coordinator_reg_form").reset();
                msg = "You are registered successfully as a coordinator.";
                showMsgInModal(msg);
                $("#resModal").modal("hide");
                $("#detailModal").modal("show");
                $("#reg_id_span").html(result.coordinator_reg_id);
                $("#name_span").html(result.name);
                $("#qualification_span").html(result.qualification);
                $("#profession_span").html(result.profession);
                $("#email_span").html(result.email);
                $("#phone_span").html(result.mobile_no);
                if (result.gender == 1) {
                    var gender = "Male";
                } else {
                    var gender = "Female";
                }
                $("#gender_span").html(gender);
                $("#age_span").html(result.age);
                $("#address_span").html(result.address);
                $("#city_span").html(result.coord_city);
                $("#state_span").html(result.state_name);
                $("#pincode_span").html(result.pincode);
                var coord_img_html = "";
                if(result.coord_img) {
                    coord_img_html = "<img src=\"" + result.coord_img + "\" "
                        + "alt=\"Image\" style=\"width: 80px; height: 100px;\">";
                }
                $("#coord_img").html(coord_img_html);
                genPDF(result.coordinator_reg_id, result.name, result.qualification,
                    result.profession, gender, result.mobile_no, result.email,
                    result.age, result.address, result.coord_city, result.state_name,
                    result.pincode, result.coord_img);
            } else if(result.status == "error"){
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }
            $("#submitBtn").prop("disabled", false);
        },
        error: function() {
            showErrMsgInModal("Error in request...");
            $("#submitBtn").prop("disabled", false);
        }
    });
}

$(document).ready(function (e) {
    $("#coordinator_reg_form").on("submit", function(e) {
        $("#resModal").modal("show");
        $(".resLoadingGif").hide();
        $("#resClose").hide();
        $("#msg_div").html("");
        e.preventDefault();
        var confirmDialog = "<p class=\"text-warning\">If you once submit this "
            + "registration form, you will not be able to modify it again."
            + " Are you sure, you want to submit?</p>"
            + "<hr style=\"margin-top:8px;margin-bottom:8px;\">"
            + "<button type=\"button\" class=\"btn btn-default w3-right\""
            + " data-dismiss=\"modal\">No</button>"
            + "<button type=\"button\" class=\"btn btn-primary w3-right "
            + "w3-margin-right\" onclick=\"post_coord_reg_data();\">Yes</button>";
        $("#resSpan").html(confirmDialog);
        return false;
    });
});

function genPDF(reg_id, name, qualification, profession, gender, mobile_no, email,
                age, address, coord_city, state_name, pincode, coord_img) {
    var coordHref = "coordinator_pdf.php?reg_id=" + reg_id + "&name=" + name
        + "&qualification=" + qualification + "&profession=" + profession
        + "&gender=" + gender + "&mobile_no=" + mobile_no + "&email=" + email
        + "&age=" + age + "&address=" + address + "&city=" + coord_city
        + "&state=" + state_name + "&pincode=" + pincode + "&coord_img=" + coord_img;
    $("#downloadBtn").attr("href", coordHref);
}
