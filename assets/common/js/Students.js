var Students = {
    
    base_url : "",
    serverResponce : {},
 
    init: function(url) {
        Students.base_url = url;  
    },

    addStudent: function(Fname, Lname, Mname, NatId, Bentry, Dob, Sex, Address) {
        var post_url =  Students.base_url + 'API/Students/add_new_student';
        Students.serverResponce = {};
        $.post(post_url, 
            {
                firstName: Fname,
                lastName : Lname,
                middleName : Mname,
                nationalId : NatId,
                birthEntyyNumber :Bentry,
                dateOfBirth : Dob,
                sex: Sex,
                address: Address
            },function(data, status, xhr){
            }
        ).done(function(data){
            notify(data)
        }).fail(function(){
            alert('failed to connect to server refresh the page and retry');
        });
    },

    
    updateStudent: function() {
        alert('i student update ');
    }
};
