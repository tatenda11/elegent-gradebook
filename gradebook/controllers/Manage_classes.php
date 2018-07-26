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
 * Controller to manage classes
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems
 * @author     Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

class Manage_classes extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        // check session within the constructor
        if($this->session->has_userdata('userId') == false || $this->session->userdata('userType')== 'STUDENT' )
        {
            redirect(base_url('Gateway'));
        }
    }

    /** 
     * @return void
     * @route
     * display view to add a class and adds a class if a post request is made 
     */
    public function add_new_class()
    {
        $this->load->model('Gb_syllabus_model');
        $this->load->model('Gb_class_model');
        $this->load->helper('form');
        $this->load->helper('Rest');
        $data['page'] = 'Add_class';
        $data['title'] = 'Add Classes';
        $data['cssArray'] = array('style.css');
        $data['jsArray'] = array();
        $data['syllabuses'] = $this->Gb_syllabus_model->get_all_gb_syllabuses();
        $data['classes'] = $this->Gb_class_model->get_all_gb_classes();
        if(isset($_POST['btn_addClass']))
        {
            $required_fields = array('txt_syllabusId','txt_classGrade' ,'txt_grade','txt_classname');
            if(is_input_valid($required_fields,'POST') == false)
            {
                $data['responseArray'] = array('error' => true, 'Message' => 'fill in all fields' );                
                $this->load->view(Theme_loader::getView('Basefile'),$data);
                return;
            }
            $params = array(
                'teacherId' =>0,
                'className' => $this->input->post('txt_classname'),
                'classStream' => $this->input->post('txt_classGrade') . ' '. $this->input->post('txt_grade') ,
                'syllabusId' => $this->input->post('txt_syllabusId'),
            );
            $classId = $this->Gb_class_model->add_gb_class($params);
            if(is_int($classId) && $classId !== 0)
            {
                $data['responseArray'] = array('error' => false, 'Message' => 'class addeded ' );                
                $data['classes'] = $this->Gb_class_model->get_all_gb_classes();
                $this->load->view(Theme_loader::getView('Basefile'),$data);
                return;
            }
            $data['responseArray'] = array('error' => true, 'Message' => 'failed to add class ' );                
            $this->load->view(Theme_loader::getView('Basefile'),$data);
            return;
        }
        $this->load->view(Theme_loader::getView('Basefile'),$data);
    }
    
    /**
     * displays edit class view  handles update class post request 
     * @return void
     */
    public function update_class()
    {
        $classId = (int) $this->uri->segment(3);
        $this->load->model('Gb_syllabus_model');
        $this->load->model('Gb_class_model');
        $this->load->helper('form');
        $this->load->helper('Rest');
        $data['page'] = 'Update_class';
        $data['title'] = 'Update class';
        $data['cssArray'] = array('style.css');
        $data['jsArray'] = array();
        $data['syllabuses'] = $this->Gb_syllabus_model->get_all_gb_syllabuses();
        $data['class'] = $this->Gb_class_model->get_gb_class($classId);
        $this->load->view(Theme_loader::getView('Basefile'),$data);
    }

    /**
     * dispay and manage classes
     * @return void
     */
    public function index()
    {

    }
   
}