$(document).ready(function(){

  set_sidebar_height($("#notification_tbody").height());

});


function edit_notification(id){

  $.each(notification_list,function(index, value){
    if(value["id"] == id){

      $("#ntfy_id").val(id);
      $("#editNotificationModal").modal('show');
      $("#ntfy_details").val(value["notification_text"]);

      if(value["link"] == "#") $("#ntfy_link").val('');
      else $("#ntfy_link").val(value["link"]);
    }
  });
}
