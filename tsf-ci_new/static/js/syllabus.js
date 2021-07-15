function open_add_syllabus_modal(){

     $("#resModal").modal("show");
    //$("#resContent").html("");
    //$("#resSpan").html("");
     $("#resTitle").html("Add New Syllabus");
}


function add_syllabus(){
    urlpath = base_url+"admin/syllabus/add";
    //alert(urlpath);
    var form = $('form')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    console.log(formData);
    $.ajax({
    url: urlpath,
    data: formData,
    type: 'POST',
    cache: false,
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success:function(res){
        alert(res);
        location.reload();
    }
    // ... Other options like success and etc
});
}

function delete_syllabus(id){
    var urlpath = base_url+"admin/syllabus/delete?id="+id;
    $.ajax({
    url: urlpath,
    type: 'GET',
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success:function(res){
        alert(res);
        location.reload();
    }
    // ... Other options like success and etc
});
}