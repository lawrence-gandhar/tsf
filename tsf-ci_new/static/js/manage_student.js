$(document).ready(function(){

    get_student_list();

    //
    //
    //

    $("#class_filter").on("change", function(){
        get_student_list();
    });

    //
    //
    //

    $("#gender_filter").on("change", function(){
        get_student_list();
    });

    //
    //
    //

    $("#school_filter").on("autocompleteselect", function(e, ui){
        $("#school_filter").val(ui.item.value);
        get_student_list();
    });

    //
    //
    //

    $(`#searchSchoolBtn, #searchReg_idBtn, #st_name_btn, #cr_name_btn,
        #f_name_btn, #st_phone_btn, #st_email_btn, #st_address_btn, #st_city_btn,
        #st_state_btn, #st_pin_btn`).on("click", function(){
        get_student_list();
        return false;
    });


    $(`#school_filterForm, #reg_idFilterForm, #st_name_filter_form, #cr_name_filter_form,
        #f_name_filter_form, #st_phone_filter_form, #st_email_filter_form, #st_address_filter_form,
        #st_city_filter_form, #st_state_filter_form, #st_pin_filter_form`).on("submit", function() {
        get_student_list();
        return false;
    });



});


//**************************************************************** */
// function to get student list
//**************************************************************** */
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

//**************************************************************** */
// function to get student list
//**************************************************************** */

function get_student_list() {

    $("#studLoadingGif").show();
    $("#student_msg").html("");
    $("#student_tbody").html("");

    $.get(base_url+"admin/student/list", {
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
        }, function(result){
            result = $.parseJSON(result);

            var msg = "";
            if(result.status == "success") {
                var student_list = result.student_list;
                if (student_list.length === 0) {
                    $("#student_msg").html("<center>No record.</center>");
                    $("#exportStudDiv").html("");
                } else {
                    var student_html = "";
                    for(var i in student_list){
                        var stud_id = student_list[i].student_id;
                        var img_path = student_list[i].image_path;
                        var name = student_list[i].student_name;
                        var address = removeLineBreak(student_list[i].address);

                        student_html += "<tr";

                        console.log(student_list[i]);

                        if(student_list[i].is_active == '0'){
                          student_html += " style='background-color:rgba(255, 0, 0, 0.35)'";
                        }

                        student_html += "><td class=\"nowrap\">"
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
                                    + "<span onclick=\"show_image('" + base_url+img_path + "', '"
                                    + name.toUpperCase() + "');\" role=\"button\">Show</span></td>";
                            }
                            student_html += "<td class=\"ignore-heading\"><button style=\"background-color:#384044 !important;\" type=\"button\" "
                            + "onclick=\"edit_student_record(" + stud_id + ");\" "
                            + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                            + "><i class=\"fa fa-pencil\"></i>  Edit</button></td>";

                            if(student_list[i].is_active == '1'){
                              student_html += "<td class=\"ignore-heading\"><button type=\"button\" "
                              + "onclick=\"deactivate_student_record(" + stud_id + ");\" "
                              + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                              + "> Deactivate</button></td></tr>";
                            }else{
                              student_html += "<td class=\"ignore-heading\"><button type=\"button\" "
                              + "onclick=\"activate_student_record(" + stud_id + ");\" "
                              + "class=\"w3-btn w3-theme w3-round w3-tiny\" "
                              + " style='background-color:#eeeeee !important; color:#000000 !important;'>Activate</button></td></tr>";
                            }
                    }

                    $("#student_tbody").html(student_html);
                    bindTableExport($("#student_table"), "Student_List");
                    var totRecords = student_list.length;
                    var totRecordsHtml = "<span class=\"w3-right totRecords\">Total Record";
                    if(totRecords > 1) {
                        totRecordsHtml += "s";
                    }
                    totRecordsHtml += ": " + totRecords + "</span>";
                    $("#exportStudDiv").html(totRecordsHtml);
                }
            } else if(result.status == "error") {
                msg = result.msg;
                $("#student_msg").html(msg);
            }
            $("#studLoadingGif").hide();
        });
    return false;
}


//********************************************************************/
// DEACTIVATE STUDENT RECORD
//********************************************************************/

function deactivate_student_record(stud_id) {

    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("De-Activate Student Record");
    $(".resLoadingGif").show();

    $.post(base_url+"admin/student/deactivate", {"student_id": stud_id}, function(data){
        result = $.parseJSON(data);

        var msg = "";
        if(result.status == "success") {
            msg = "Record deactivated successfully.";
            $("#resSpan").html(msg);
            get_student_list();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();
        return false;
    });
    return false;
}


//********************************************************************/
// ACTIVATE STUDENT RECORD
//********************************************************************/

function activate_student_record(stud_id){

    $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
    $("#resTitle").html("Activate Student Record");
    $(".resLoadingGif").show();

    $.post(base_url+"admin/student/activate", {"student_id": stud_id}, function(data){
        result = $.parseJSON(data);

        var msg = "";
        if(result.status == "success") {
            msg = "Record activated successfully.";
            $("#resSpan").html(msg);
            get_student_list();
        } else if(result.status == "error") {
            msg = result.msg;
            $("#resSpan").html(msg);
        }
        $(".resLoadingGif").hide();
        return false;
    });
    return false;
}


function edit_student_record(stud_id){

  $("#editStudentModal").modal('show');

  $.post(base_url+"admin/get_student_data", {"student_id": stud_id}, function(data){
    result = $.parseJSON(data);

    console.log(result);

    student_image = result["image_path"];

    if(student_image !== null){
      $("#student_image").prop("src", base_url+student_image);
    }else{
      $("#student_image").prop("src", base_url+"static/img/student_image.jpg");
    }

    $("#student_name").val(result["student_name"]);
    $("#school_name").val(result["school_name"]);
    $("#father_name").val(result["father_name"]);
    $("#coordinator_id").val(result["fk_coordinator_id"]);
    $("#class_id").val(result["fk_class_id"]);
    $("#examtype_id").val(result["fk_examtype_id"]);
    $("#address").val(result["address"]);
    $("#city").val(result["city"]);
    $("#state").val(result["fk_state"]);
    $("#pincode").val(result["pincode"]);
    $("#phone").val(result["parents_contact_no"]);
    $("#email").val(result["stud_email"]);



  });
}
