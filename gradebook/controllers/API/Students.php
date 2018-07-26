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

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\libraries\REST_Controller;

class Students extends REST_Controller
{
   
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('Rest');
    }

    public function  index()
    {

    }

    /**
     * @method post
     * function to add new students with http post
     * ignore _post
     */
    public function add_new_student_post()
    {
        //vaidate post parameter here- 
        $required_fields = array(
            'firstName',
            'lastName',
            'sex',
            'dateOfBirth'
        );
        if(is_input_valid($required_fields) == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'first name, lastname gender and date of birth required  ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_control_model');
        $studentId = $this->Gb_control_model->get_gb_studentId();
        if($studentId == 0) // DID NOT GET sTUDENT iD DISPLAY ERROR TERMINATE EXECUTION
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'failed to resolve student id' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_user_model');
        $this->load->helper('Passwords');
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
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'failed configure student user account' )), REST_Controller::HTTP_CREATED);
            return;
        }
        //now insert student into file
        $this->load->model('Gb_student_model');
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
       //check if student aready exisi
        if($this->Gb_student_model->check_gb_student_exist($this->input->post('firstName'), $this->input->post('lastName'), $this->input->post('sex'), $this->input->post('dateOfBirth')) == true)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'student already in file' )), REST_Controller::HTTP_CREATED);
            return;
        }
        if($this->Gb_student_model->add_gb_student( $new_student ) == false)
        {
            //student not inserted propery
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'failed configure student user account' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $responce = array(
            'error' => false, 
            'success' => true,
            'Message' => 'added student succesifully', 
            'studentId' => $studentId
        );
        $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
        return;
    }
    
    /**
     * function to get a single student
     * @method get ignore_get
     */
    public function get_student_by_id_get()
    {
        $required_fields = array('studentId');
        if(is_input_valid($required_fields, 'GET') == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'Student id required ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_student_model');
        $studentId = (string) $this->input->get('studentId');
        $this->set_response(reseponce_parser($this->Gb_student_model->get_gb_student($studentId)), REST_Controller::HTTP_CREATED);
        return;
    }
    /**
     * function to get all students
     * @method get ignore _get
     */
    public function get_all_students_get()
    {
        $this->load->model('Gb_student_model');
        $this->set_response(reseponce_parser($this->Gb_student_model->get_all_gb_students()), REST_Controller::HTTP_CREATED);
        return;
    } 

    /**
     * function to update student
     * @method post ignore _post
     */
    public function update_student_post()
    {
        //vaidate post parameter here- 
        $required_fields = array(
            'firstName',
            'lastName',
            'sex',
            'dateOfBirth',
            'studentId'
        );
        if(is_input_valid($required_fields) == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'first name, lastname gender and date of birth required  ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $student_info = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'middleName' => $this->input->post('middleName'),
            'nationalId' => $this->input->post('nationalId'),
            'birthEntryNumber' => $this->input->post('birthEntryNumber'),
            'dateOfBirth' => $this->input->post('dateOfBirth'),
            'sex' => $this->input->post('sex'),
            'address' => $this->input->post('address'),
        );
        $this->load->model('Gb_student_model');
        $studentId =  $this->input->post('studentId');
        if($this->Gb_student_model->update_gb_student($studentId,$student_info) == true)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'Message' => 'updated student succesifully', 
                'studentId' => $studentId
            );
            $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'failed to update student' )), REST_Controller::HTTP_CREATED);
        return;       
    }
}