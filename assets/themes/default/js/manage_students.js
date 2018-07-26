function responce(){
    alert('tate');
}

$(document).ready(function(){
    var base_url = '';
    $.getJSON("../config.json", function(data){
        base_url = data.config[0].base_url;
    });

    $('#btn_addStudent').click(function(){
        var fname = $('#txt_firstName').val();
        var middename = $('#txt_middleName').val();
        var lname = $('#txt_lastName').val();
        var bentry = $('#txt_birthEntry').val();
        var natId  = $('#txt_nationalId').val();
        var sex = $('#txt_sex').val();
        var address = $('#txt_Address').val();
        var dob = $("#txt_dateOfBirth").val();
        if(fname == '' || lname == '' || sex == '' || dob == '' )
        {
            $.Notify({
                caption: 'Input Error',
                content: 'First name , last name, gender date of birth required',
                type: 'alert'
            });
            return;
        }
        var scriptUrl = base_url + 'assets/common/js/Students.js';
        $.getScript(scriptUrl ,function(data,textStatus){
            if(textStatus == 'success'){
                Students.init(base_url);
                Students.addStudent(fname, lname, middename, natId, bentry, dob, sex, address);
            }
            else{
                alert('Script error refresh page and try again');
            }
        })
        
    });



});