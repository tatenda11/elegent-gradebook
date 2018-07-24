var Students = {
    
    base_url : "",
 
    init: function(  ) {
        $.getJSON("../config.json", function(data){
            Students.base_url = data.config[0].base_url;
        });
        
    },

    addStudent: function(Fname, Lname, Mname, NatId, Bentry, Dob, Sex, Address) {
        var post_url =  Students.base_url+'API/Students/add_new_student';
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
            },
            function(data, status){
                //console.log(status);
            }
        )
    },
    updateStudent: function() {
        console.log(this.base_url);
    }
};
/**
 *  $new_student = array(
            'studentId' => $studentId,
            'userId' => $user_system_id,
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'middleName' => $this->input->post('middleName'),
            'nationalId' => $this->input->post('nationalId'),
            'birthEntryNumber' => $this->input->post('birthEntryNumber'),
            'dateOfBirth' => $this->input->post('dateOfBirth'),
            'sex' => $this->input->post('sex'),
            'address' => $this->input->post('address'),
        );
 */