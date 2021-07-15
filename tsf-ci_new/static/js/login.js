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

$(document).ready(function (e) {
    $("#login_form").on("submit", function(e) {
        $("#resModal").modal("show");
        $(".resLoadingGif").show();
        $("#submitBtn").prop("disabled", true);
        $("#msg_div").html("");
        e.preventDefault();

        data = $("#login_form").serialize();

        $.post(base_url+"/post_login/", data, function(result){

            result = $.parseJSON(result);

            if(result.status == "success"){
                msg = "Loggedin successfully.";
                showMsgInModal(msg);
                window.location = result.response_url;
            }else{
                document.getElementById("login_form").reset();
                msg = result.msg;
                showErrMsgInModal(msg);
                $("#msg_div").html(msg);
            }

            $("#submitBtn").prop("disabled", false);
        });
        return false;
    });
});