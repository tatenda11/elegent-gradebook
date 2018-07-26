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
 * REST API Controller FOR CLASSES MODEL
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems
 * @author     Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */
require APPPATH . '/libraries/REST_Controller.php';

use Restserver\libraries\REST_Controller;

class Gurdians extends REST_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('Rest');
    }
    
    /**
     * function to add a guardian
     * @return void
     * @method Post
     */
    public function add_new_guardian_post()
    {
        $required_fields = array('studentId','firstName', 'lastName', 'title', 'relationship' );
        if(is_input_valid($required_fields, 'POST') == false){
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'guardian first name, lastname title and relationship to student required  ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_gurdian_model');
        //first check if the class already exists
        $params = array(
            'studentId' => $this->input->post('studentId'),
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'title' => $this->input->post('title'),
            'relationship' => $this->input->post('relationship'),
            'email' => $this->input->post('email'),
            'mobileNumber' => $this->input->post('mobileNumber')
        );
        $gurdianId = $this->Gb_gurdian_model->add_gb_gurdian($params);
        if(is_int($gurdianId) && $gurdianId !== 0)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'added gurdian', 
                'classId' =>  $classId
            );
            $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->responceParser(array('error' => true, 'Message' => 'gurdian not added'));
        return;
    }
    /**
     * function to get single guardian ising unique id
     * useses get url parameter
     * @return void
     * @method get
     */
    public function get_guardian_get()
    {
        $required_fields = array('gurdianId');
        if(is_input_valid($required_fields, 'GET') == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'guardian id invaid  invalid' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_gurdian_model');
        $result = $this->Gb_class_model->get_gb_gurdian_model($this->input->get('gurdianId'));
        $this->set_response(reseponce_parser($result), REST_Controller::HTTP_CREATED);
        return;
    }
    /**
     * function to update class
     * @return void
     * @method post
     */
    public function update_guardian_post()
    {
        $required_fields = array('studentId','firstName', 'lastName', 'title', 'relationship' );
        if(is_input_valid($required_fields,'POST') == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'Message'=> 'className and class grade required' )), REST_Controller::HTTP_CREATED);
            return;
        } 
        $params = array(
            'studentId' => $this->input->post('studentId'),
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'title' => $this->input->post('title'),
            'relationship' => $this->input->post('relationship'),
            'email' => $this->input->post('email'),
            'mobileNumber' => $this->input->post('mobileNumber')
        );
        $gurdianId = (int) $this->input->post('gurdianId');
        $this->load->model('Gb_gurdian_model');
        if($this->Gb_gurdian_model->update_gb_gurdian( $gurdianId,$params) == true)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'updated guardian', 
                'gurdianId' =>   $gurdianId
            );
            $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->responceParser(array('error' => true, 'Message' => 'guardian not updated'));
        return;  
    }
    /**
     * get all the student guardians
     * @method get
     * @return void 
     */
    public function get_all_student_guardians_get()
    {
        $studentId = (string) $this->input->get('studentId'); 
        $this->load->model('Gb_gurdian_model');
        $this->set_response(reseponce_parser($this->Gb_gurdian_model->get_gb_student_gurdian( $studentId)), REST_Controller::HTTP_CREATED);
        return;
    } 
}    