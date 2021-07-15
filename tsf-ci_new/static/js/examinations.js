$(document).ready(function(){


    //
    //
    //

    $("span.image_container").hover(

        function(){
            $(this).find('.btn').show();
            var bgcolor = $(this).css('background');

            console.log(bgcolor);

            opacity_set = 'linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8))';
            org_val = 'linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0))';

            bgcolor = bgcolor.replace(org_val, opacity_set);
            console.log(bgcolor);

            $(this).css("background", bgcolor);

        },
        function(){
            $(this).find('.btn').hide();

            var bgcolor = $(this).css('background');

            console.log(bgcolor);

            org_val = 'linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8))';
            opacity_set = 'linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0))';

            bgcolor = bgcolor.replace(org_val, opacity_set);
            console.log(bgcolor);

            $(this).css("background", bgcolor);
        }
    );

    //
    //
    //


});


//********************************************************************* */
//
//********************************************************************* */

function edit_exam_record(exam_id, eid){
    $("#EditExamModal").modal('show');

    $("#exam_eid").text(eid.toUpperCase());

    $.post(base_url+"admin/examinations/get-details",{"exam_id":exam_id}, function(data){
        data = $.parseJSON(data);

        result = data[0];

        $("#name").val(result.title);
        $("#total_questions").val(result.total_questions);
        $("#total_marks").val(result.total_marks);
        $("#time").val(result.time);
        $("#tag").val(result.tag);
        $("#desc").val(result.intro);
        $("#status").val(result.is_active);
        $("#exam_id").val(exam_id);
        $("#start_date").val(result.start_date);
        $("#end_date").val(result.end_date);
    });

}

//********************************************************************* */
//
//********************************************************************* */

function add_option_row(row_id){

    var xx = 1+($("div.m_row_"+row_id).length/3);

    html = '<div class="col-md-9 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding:0px; padding-top:5px;">';
    html += '<input type="text" placeholder="Enter option details here" class="form-control" name="option_'+row_id+'[]">';
    html += '</div>';
    html += '<div class="col-md-2 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding-top:5px;">';
    html += '<select class="form-control" name="correct_ans_'+row_id+'[]">';
    html += '<option value="">Is correct option</option>';
    html += '<option value="1">Yes</option>';
    html += '<option value="0">No</option>';
    html += '</select>';
    html += '</div>';
    html += '<div class="col-md-1 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding-top:5px;">';
    html += '<button type="button" class="btn btn-danger" onclick="remove_option_row('+row_id+','+xx+')">Remove</button>';
    html += '</div>';

    $("#opt_div_"+row_id).append(html);
}


//********************************************************************* */
//
//********************************************************************* */

function add_option_row_edit(row_id){

    var xx = 2+($("div.m_row_"+row_id).length/3);

    html = '<div class="col-md-9 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding:0px; padding-top:5px;">';
    html += '<input type="text" placeholder="Enter option details here" class="form-control" name="option[]">';
    html += '</div>';
    html += '<div class="col-md-2 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding-top:5px;">';
    html += '<select class="form-control" name="correct_ans[]">';
    html += '<option value="">Is correct option</option>';
    html += '<option value="1">Yes</option>';
    html += '<option value="0">No</option>';
    html += '</select>';
    html += '</div>';
    html += '<div class="col-md-1 m_row_'+row_id+' created_row_'+row_id+'_'+xx+'" style="padding-top:5px;">';
    html += '<button type="button" class="btn btn-danger" onclick="remove_option_row('+row_id+','+xx+')">Remove</button>';
    html += '</div>';

    $("#opt_div_"+row_id).append(html);

}


//********************************************************************* */
//
//********************************************************************* */

function remove_option_row(row_id, xx){
    $("div.created_row_"+row_id+"_"+xx).remove();
}


//********************************************************************* */
//
//********************************************************************* */

function remove_option_row_delete(row_id, xx, option_id){

    rr = confirm('This operation will delete the option from the question permanently. Do you want to proceed?');

    if(rr){

        $.post(base_url+"admin/examinations/options/delete",{"option_id":option_id}, function(data){
            if(data == 1){
                $("div.created_row_"+row_id+"_"+xx).remove();
            }else{
                alert("Operation Failed! Try again later.");
            }
        });
    }
}
