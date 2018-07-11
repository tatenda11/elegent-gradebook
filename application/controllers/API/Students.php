<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This file is part of Elegent Gradebook - http://elegent-microsystems.org/gradebook
//
// Elegent Gradebook is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Elegent Gradebook.  If not, see <http://www.gnu.org/licenses/>.

/**
 * REST API Controller FOR STUDENTS MODEL
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems
 * @author     Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

class Students extends CI_Controller 
{
    /**
     * function to return json content from an array
     * @param array $reseponceArray 
     * @return void
     */
    private function responceParser($reseponceArray)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode(array('data'=> $reseponceArray)));
    }
    
    /**
     * function to validate user input
     * @param array <required fields> an array of the require field
     * @param string http method is used for submited fielsd
     * @return boolean isInput valid 
     */
    private function isInputValid($required_fields, $http_method)
    {
        if(strtoupper($http_method) == 'POST')
        {
            $is_valid = true;
            for($index = 0; $index < Count($required_fields); $index ++ )
            {
                if($this->input->post($required_fields[$index]) == "")
                {
                    $is_valid = false;
                }
            }
            return $is_valid;   
        }
        
        if(strtoupper($http_method) == 'GET')
        {
            $is_valid = true;
            for($index = 0; $index < Count($required_fields); $index ++ )
            {
                if($this->input->post($required_fields[$index]) == "")
                {
                    $is_valid = false;
                }
            }
            return $is_valid;   
        }
        return false;
    }

    /**
     * function to add a new student only works with http POST
     * @return void
     */
    public function addStudent(){
        $this->load->model('Gb_control_model');
        $studentId = $this->Gb_control_model->get_gb_studentId();
        if($studentId == 0) // DID NOT GET sTUDENT iD DISPLAY ERROR TERMINATE EXECUTION
        {
            $this->responceParser(array('error' => true, 'errorMessage'=> 'failed to resolve student id' ));
            return;
        }
        $this->load->model('Gb_user_model');
        $this->load->helper('Password');
         //first add student as a system user
        $new_user = array(
            'password' => hash_password($studentId),
			'userName' => $studentId,
			'userType' => 'STUDENT'
        );
        $user_system_id = $this->Gb_user_model->add_gb_user( $new_user );
        if(is_int($user_system_id) == false || $user_system_id == 0 )
        {
            // user did not insert properly show error and terminate
            $this->responceParser(array('error' => true, 'errorMessage'=> 'failed to add student login details ' ));
            return; 
        }
        //now insert student into file
        $new_student = array(
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
        $id = $this->Gb_student_model->add_gb_student( $new_student );
        if($id !== $studentId)
        {
            $this->responceParser(array('error' => true, 'errorMessage'=> 'failed to add student' ));
            return;
        }
        $responce = array(
            'error' => false, 
            'success' => true,
            'successMessage' => 'added student succesifully', 
            'studentId' => $studentId
        );
        $this->responceParser($responce);
        return;
    }
    /**
     * get the  student from student file 
     * uses a get url parament to get student id
     * @return void
     */
    public function getStudent()
    {
        $student_id = (string) $this->uri->segment(3);
        if($student_id == null)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'Invalid Student Id'));
            return;     
        }
        $this->load->model('Gb_student_model');
        $this->responceParser($this->Gb_student_model->get_gb_student($student_id));
    }
    /**
     * gets all students in student file
     */
    public function getAllStudents()
    {
        $this->load->model('Gb_student_model');
        $this->responceParser($this->Gb_student_model->get_all_gb_students());
    }

    public function updateStudent()
    {
        $student_id = (string) $this->uri->segment(3);
        if($student_id == null)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'Invalid Student Id'));
            return;     
        }
        //validation 
        $required_fields = array('firstName', 'lastName', 'dateOfBirth', 'sex' );
        if($this->isInputValid($required_fields, 'POST') == false)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'Student first name, last name, sex and date of birth required '));
            return;
        }
        $this->load->model('Gb_student_model');
        $params = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'middleName' => $this->input->post('middleName'),
            'nationalId' => $this->input->post('nationalId'),
            'birthEntryNumber' => $this->input->post('birthEntryNumber'),
            'dateOfBirth' => $this->input->post('dateOfBirth'),
            'sex' => $this->input->post('sex'),
            'address' => $this->input->post('address'),
        );
        if($this->Gb_student_model->update_gb_student($student_id,$params) == true)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'updated student', 
                'studentId' => $studentId
            );
            $this->responceParser($responce);
            return;
        }
        $this->responceParser(array('error' => true, 'errorMessage' => 'failed to update student '));
        return;
    }



   
}