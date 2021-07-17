$(document).ready(function(){
    get_coordinator_list();

    //
    //
    //

    $("#class_filter").on("change", function(){
        get_coordinator_list();
    });

    //
    //
    //

    $("#gender_filter").on("change", function(){
        get_coordinator_list();
    });

    //
    //
    //

    $(`#cord_reg_idBtn, #coord_name_idBtn, #coord_mobile_idBtn, #coord_email_idBtn, 
        #coord_age_idBtn, #coord_gender_idBtn, #coord_qual_idBtn, #coord_prof_idBtn, #coord_addr_idBtn, 
        #coord_district_idBtn, #coord_state_idBtn,#coord_pin_idBtn`).on("click", function(){
            get_coordinator_list();
        return false;
    });


    $(`#coord__reg_idFilterForm, #coord_name_idFilterForm, #coord_mobile_idFilterForm, #coord_email_idFilterForm, 
        #coord_age_idFilterForm, #coord_gender_idFilterForm, #coord_qual_idFilterForm, #coord_prof_idFilterForm, 
        #coord_addr_idFilterForm, #coord_district_idFilterForm, 
        #coord_state_idFilterForm,#coord_pin_idFilterForm`).on("submit", function() {
            get_coordinator_list();
        return false;
    });


});


function get_coordinator_list() {
    $("#coordLoadingGif").show();
    $("#coordinator_msg").html("");

    $.get(base_url+"admin/coordinator/list", {
        reg_id : $("#cord_reg_id").val(),
        coord_name : $("#coord_name").val(),
        coord_mobile : $("#coord_mobile").val(),
        coord_email : $("#coord_email").val(),
        coord_age : $("#coord_age").val(),
        coord_gender : $("#coord_gender").val(),
        coord_qual : $("#coord_qual").val(),
        coord_prof : $("#coord_prof").val(),
        coord_addr : $("#coord_addr").val(),
        coord_district : $("#coord_district").val(),
        coord_state : $("#coord_state").val(),
        coord_pin : $("#coord_pin").val()
    }, function(data){
        result = $.parseJSON(data);

        var msg = "";
        if(result.status == "success"){
            var coordinator_list = result.coordinator_list;
            if (coordinator_list.length === 0){
                $("#coordinator_msg").html("<center>No record.</center>");
            }else{
                var coordinator_html = "";
                for(var i in coordinator_list) {
                    var img_path = coordinator_list[i].image_path;
                    var coord_id = coordinator_list[i].coord_id;
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
                        + "</td>";
                        coordinator_html += "<td class=\"ignore-heading\"><button style=\"background-color:#384044 !important;\" type=\"button\" "
                            + "onclick=\"edit_student_record(" + coord_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                            + "><i class=\"fa fa-pencil\"></i>  Edit</button></td>"
                            +"<td class=\"ignore-heading\"><button type=\"button\" "
                            + "onclick=\"delete_coordinator_record(" + coord_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                            + "><i class=\"fa fa-trash\"></i>  Delete</button></td></tr>";
                    
                }
                $("#coordinator-body").html(coordinator_html);
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
    });

    return false
}


//********************************************************************/
// DELETE COORDINATOR RECORD
//********************************************************************/

function delete_coordinator_record(coord_id) {

    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Delete Coordinator Record");
    $(".resLoadingGif").show();

    $.post(base_url+"admin/coordinator/delete", {"coord_id": coord_id}, function(data){
        result = $.parseJSON(data);

        var msg = "";
        if(result.status == "success"){
            msg = "Record deleted successfully.";
            $("#resSpan").html(msg);
            get_coordinator_list();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();
        return false;
    });
    return false;
}