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

class Classes extends REST_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->helper('Rest');
    }
    
    /**
     * function to add a class
     * @return void
     * @method Post
     */
    public function add_new_class_post()
    {
        $required_fields = array('className', 'classStream');
        if(is_input_valid($required_fields, 'POST') == false){
            $this->set_response(reseponce_parser(array('error' => true, 'errorMessage'=> 'class name and class grade required ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_class_model');
        //first check if the class already exists
        if($this->Gb_class_model->check_gb_class_exists($this->input->post('className'))== true)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'errorMessage'=> 'class name already saved in system ' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $params = array(
            'teacherId' => (int) $this->input->post('teacherId'),
            'className' => $this->input->post('className'),
            'classStream' => $this->input->post('classStream'),
            'syllabusId' => $this->input->post('syllabusId'),
        );
        $classId = $this->Gb_class_model->add_gb_class($params);
        if(is_int($classId) && $classId !== 0)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'added class', 
                'classId' =>  $classId
            );
            $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->responceParser(array('error' => true, 'errorMessage' => 'class not added'));
        return;
    }
    /**
     * function to get class
     * useses get url parameter
     * @return void
     * @method get
     */
    public function get_class_get()
    {
        $required_fields = array('classId');
        if(is_input_valid($required_fields, 'POST') == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'errorMessage'=> 'classId  invalid' )), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->load->model('Gb_class_model');
        $result = $this->Gb_class_model->get_gb_class($this->input->get('classId'));
        $this->set_response(reseponce_parser($result), REST_Controller::HTTP_CREATED);
        return;
    }
    /**
     * function to update class
     * @return void
     * @method post
     */
    public function update_class_post()
    {
        $required_fields = array('className', 'classStream', 'classId');
        if(is_input_valid($required_fields,'POST') == false)
        {
            $this->set_response(reseponce_parser(array('error' => true, 'errorMessage'=> 'className and class grade required' )), REST_Controller::HTTP_CREATED);
            return;
        } 
        $params = array(
            'teacherId' => $this->input->post('teacherId'),
            'className' => $this->input->post('className'),
            'classStream' => $this->input->post('classStream'),
            'syllabusId' => $this->input->post('syllabusId'),
        );
        $classId = (int) $this->input->post('classId');
        $this->load->model('Gb_class_model');
        if($this->Gb_class_model->update_gb_class($classId,$params) == true)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'updated class', 
                'classId' =>  $classId
            );
            $this->set_response(reseponce_parser($responce), REST_Controller::HTTP_CREATED);
            return;
        }
        $this->responceParser(array('error' => true, 'errorMessage' => 'class not update'));
        return;  
    }
    /**
     * get all the classes
     * @method get
     * @return void 
     */
    public function get_all_classes_get()
    {
        $this->load->model('Gb_class_model');
        $this->set_response(reseponce_parser($this->Gb_class_model->get_all_gb_classes()), REST_Controller::HTTP_CREATED);
        return;
    } 
}    