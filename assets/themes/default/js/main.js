function showDialog(id){
    var dialog = $(id).data('dialog');
    dialog.open();
}

function notify(responseObject)
{
   if(responseObject.data.error == true){
        showMetroDialog('#dialog-uf-alert', 'alert', ($('<div>').addClass('padding20').attr('data-type','alert').html(getDialogHtml(responseObject))));
   }
   else{
    showMetroDialog('#dialog-uf-info', 'alert', ($('<div>').addClass('padding20').attr('data-type','alert').html(getDialogHtml(responseObject)))); 
   }
}

function getDialogHtml(responseObject){
    return "<h3>System notification</h3> <p> "+  responseObject.data.Message +"</p>";
}
$(function(){
    $("#datepicker").datepicker();
    $("table").dataTable({
        'searching' : true
    });
    $(".js-select").select2({
        placeholder: "Select option",
        allowClear: true
    });
});

