$(document).ready(function(){
    get_school_list();

    //
    //
    //

    $("#school_nm_filter").on("autocompleteselect", function (e, ui){
        $("#school_nm_filter").val(ui.item.value);
        get_school_list();
    });

    //
    //
    //

    $(`#searchSchoolnmBtn, #searchPrincipalBtn, #school_searchReg_idBtn, #mobileScBtn,
        #sc_phone_btn, #sc_address_btn, #sc_city_btn, #sc_state_btn, #sc_pin_btn, #sc_email_btn`).on("click", function(){
        get_school_list();
        return false;
    });

    //
    //
    //

    $(`#school_nm_filterForm, #school_reg_idFilterForm, #principal_nm_filterForm,
        #mobile_sc_filterForm, #sc_phone_filter_form, #sc_address_filter_form,
        #sc_city_filter_form, #sc_state_filter_form, #sc_pin_filter_form, #sc_email_filter_form`).on("submit", function(){
        get_school_list();
        return false;
    });

});


//**************************************************************** */
// function to reset school list
//**************************************************************** */

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



//**************************************************************** */
// function to get school list
//**************************************************************** */

function get_school_list() {
    $("#schoolLoadingGif").show();
    $("#school_msg").html("");
    $("#school_tbody").html("");

    $.get(base_url+"admin/get_school_list", {
            reg_id: $("#school_reg_id").val(), school_name: $("#school_nm_filter").val(), principal_name: $("#principal_nm_filter").val(),
            mobile: $("#mobile_sc_filter").val(),phone: $("#sc_phone_filter").val(), address: $("#sc_address_filter").val(),
            city: $("#sc_city_filter").val(),state: $("#sc_state_filter").val(), pincode: $("#sc_pin_filter").val(),
            email_id: $("#sc_email_filter").val()},
        function(data){
            result = $.parseJSON(data);

            var msg = "";
            if(result.status == "success") {
                var school_list = result.school_list;
                if (school_list.length === 0) {
                    $("#school_msg").html("<center>No record.</center>");
                    $("#exportSchoolDiv").html("");
                } else {
                    var school_html = "";
                    for(var i in school_list) {
                        var school_id = school_list[i].school_id;
                        school_html += "<tr";

                        if(school_list[i].is_active == '0'){
                          school_html += " style='background-color:rgba(255, 0, 0, 0.35)'";
                        }

                        school_html += "><td class=\"nowrap\">";
                        school_html += school_list[i].reg_id + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].name + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].pr_name + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].pr_mob + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].phone + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].address + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].city + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].state + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].pin + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].sm_email + "</td>";
                        school_html += "<td class=\"nowrap\">" + school_list[i].reg_on + "</td>";
                        school_html += "<td class=\"ignore-heading\"><button style=\"background-color:#384044 !important;\" type=\"button\" ";
                        school_html += "onclick=\"edit_school_record(" + school_id + ");\" ";
                        school_html += "class=\"w3-btn w3-theme w3-round w3-tiny\" ";
                        school_html += "><i class=\"fa fa-pencil\"></i>  Edit</button> </td>\"";

                        if(school_list[i].is_active == '0'){
                          school_html += "<td style=\"text-align:center;\"><button type=\"button\" ";
                          school_html += "onclick=\"activate_school_record(" + school_id + ");\" ";
                          school_html += "class=\"w3-btn w3-theme-1 w3-round w3-tiny\" ";
                          school_html += " style='background-color:#eeeeee !important; color:#000000 !important;'>Activate</button></td>";
                        }else{
                          school_html += "<td style=\"text-align:center;\"><button type=\"button\" ";
                          school_html += "onclick=\"dactivate_school_record(" + school_id + ");\" ";
                          school_html += "class=\"w3-btn w3-theme w3-round w3-tiny\" ";
                          school_html += ">De-Activate</button></td>";
                        }


                        school_html += "</tr>";
                    }
                    $("#school_tbody").html(school_html);

                    bindTableExport($("#school_table"), "School_List");
                    var totRecords = school_list.length;
                    var totRecordsHtml = "<span class=\"w3-right totRecords\">Total Record";
                    if(totRecords > 1) {
                        totRecordsHtml += "s";
                    }
                    totRecordsHtml += ": " + totRecords + "</span>";
                    $("#exportSchoolDiv").html(totRecordsHtml);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#school_msg").html(msg);
            }
            $("#schoolLoadingGif").hide();
    });
}

//**************************************************************** */
// Delete School record
//**************************************************************** */

function dactivate_school_record(school_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("De-Activate School Record");
    $(".resLoadingGif").show();

    $.post(base_url+"admin/school/delete/", {school_id: school_id}, function(result){

        result = $.parseJSON(result);
        var msg = "";
        if(result.status == "success") {
            msg = "Record De-Activated successfully.";
            $("#resSpan").html(msg);
            get_school_list();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();

        return false;
    });
    return false;
}

//**************************************************************** */
// Activate School record
//**************************************************************** */

function activate_school_record(school_id) {
    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Activate School Record");
    $(".resLoadingGif").show();

    $.post(base_url+"admin/school/activate/", {school_id: school_id}, function(result){

        result = $.parseJSON(result);
        var msg = "";
        if(result.status == "success") {
            msg = "Record Activated successfully.";
            $("#resSpan").html(msg);
            get_school_list();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();

        return false;
    });
    return false;
}


//**************************************************************** */
// edit School
//**************************************************************** */

function edit_school_record(school_id){

  $.post(base_url+"admin/school/id/", {school_id:school_id}, function(data){
    data = $.parseJSON(data);
    $("#school_name").val(data["name"]);
    $("#principal_name").val(data["pr_name"]);
    $("#address").val(data["address"]);
    $("#mobile_number").val(data["pr_mob"]);
    $("#phone_number").val(data["phone"]);
    $("#city").val(data["city"]);
    $("#state").val(data["state"]);
    $("#pincode").val(data["pin"]);
    $("#email").val(data["sm_email"]);
    $("#school_id").val(school_id);

    $("#editModal").modal('show');
  });

}
