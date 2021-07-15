// Function to open modal for adding notification
function open_add_carousel_modal(){

     $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
     $("#resTitle").html("Add New Carousel");
   var add_ntf_html = "<form name=\"add_carousel_form\" id=\"add_carousel_form\" action=\"/admin/carousel/add\"  enctype=\"multipart/form-data\">"
        + "<label class=\"w3-text-teal w3-text-theme\">Carousel Text "
        + "<span class=\"w3-text-red\" title=\"Required Field\">*</span></label>"
        + "<input id=\"carousel_image\" name=\"carousel_image\" class=\"w3-input w3-white "
        + "w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Carousel \" required=\"required\" maxlength=\"500\""
        + " minlength=\"3\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"add_carousel\" name=\"actionType\">"
        + "<button type=\"button\" id=\"ntfAddSubmit\" name=\"ntfAddSubmit\""
        + "onclick=\"return add_carousel();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button></form>";
    $("#resContent").html(add_ntf_html);
}


function add_carousel(){
    urlpath = base_url+"admin/carousel/add";
    //alert(urlpath);
    var form = $('form')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    $.ajax({
    url: urlpath,
    data: formData,
    type: 'POST',
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success:function(res){
        alert(res);
        location.reload();
    }
    // ... Other options like success and etc
});
}

function delete_carousel(id){
    var urlpath = base_url+"admin/carousel/delete?id="+id;
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

//function for gallery//
function open_add_gallery_modal(){

     $("#resModal").modal("show");
    $("#resContent").html("");
    $("#resSpan").html("");
     $("#resTitle").html("Add New Gallery");
   var add_ntf_html = "<form name=\"add_gallery_form\" id=\"add_gallery_form\" action=\"/admin/gallery/add\"  enctype=\"multipart/form-data\">"
        + "<label class=\"w3-text-teal w3-text-theme\">Carousel Text "
        + "<span class=\"w3-text-red\" title=\"Required Field\">*</span></label>"
        + "<input id=\"gallery_image\" name=\"gallery_image\" class=\"w3-input w3-white "
        + "w3-round w3-border w3-padding w3-text-theme\" type=\"file\" "
        + "placeholder=\"Carousel \" required=\"required\" maxlength=\"500\""
        + " minlength=\"3\"><div class=\"w3-padding\"></div>"
        + "<input type=\"hidden\" value=\"add_carousel\" name=\"actionType\">"
        + "<button type=\"button\" id=\"ntfAddSubmit\" name=\"ntfAddSubmit\""
        + "onclick=\"return add_gallery();\" "
        + "class=\"w3-btn w3-block w3-theme w3-round\">Submit</button></form>";
    $("#resContent").html(add_ntf_html);
}


function add_gallery(){
    urlpath = base_url+"admin/gallery/add";
    //alert(urlpath);
    var form = $('form')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    $.ajax({
    url: urlpath,
    data: formData,
    type: 'POST',
    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
    processData: false, // NEEDED, DON'T OMIT THIS
    success:function(res){
        alert(res);
        location.reload();
    }
    // ... Other options like success and etc
});
}

function delete_gallery(id){
    var urlpath = base_url+"admin/gallery/delete?id="+id;
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