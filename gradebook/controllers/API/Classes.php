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

class Classes extends CI_Controller 
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
     * function to add a class
     * @return void
     */
    public function addClass()
    {
        $required_fields = array('className', 'classStream');
        if($this->isInputValid($required_fields, 'POST') == false){
            $this->responceParser(array('error' => true, 'errorMessage' => 'class name and class grade require'));
            return;
        }
        $this->load->model('Gb_class_model');
        //first check if the class already exists
        if($this->Gb_class_model->check_gb_class_exists($this->input->post('className') == true))
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'class name already saved in the system'));
            return;
        }
        $params = array(
            'teacherId' => (int) $this->input->post('teacherId'),
            'className' => $this->input->post('className'),
            'classStream' => $this->input->post('classStream'),
            'syllabusId' => $this->input->post('syllabusId'),
        );
        $classId = $this->Gb_class_model->add_gb_class($params);
        if(is_int(classId) && classId !== 0)
        {
            $responce = array(
                'error' => false, 
                'success' => true,
                'successMessage' => 'added class', 
                'studentId' => $studentId
            );
            $this->responceParser($responce);
            return;
        }
        $this->responceParser(array('error' => true, 'errorMessage' => 'class not added'));
        return;
    }
    /**
     * function to get class
     * useses get url parameter
     * @return void
     */
    public function getClass()
    {
        $class_id = (int) $this->uri->segement(3);
        if($class_id == 0)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'invalid class id'));
            return;
        }
        $this->load->model('Cb_class_model');
        $result = $this->Gb_class_model->get_gb_class($class_id);
        $this->responceParser($result);
    }
    /**
     * function to update class
     * @return void
     */
    public function updateClass()
    {
        $class_id = (int) $this->uri->segment(3);
        if($class_id == 0)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'invalid class id'));
            return;
        }
        $required_fields = array('className', 'classStream');
        if($this->isInputValid($required_fields,'POST') == false)
        {
            $this->responceParser(array('error' => true, 'errorMessage' => 'Class name and class stream required'));
            return;
        } 
        $params = array(
            'teacherId' => $this->input->post('teacherId'),
            'className' => $this->input->post('className'),
            'classStream' => $this->input->post('classStream'),
            'syllabusId' => $this->input->post('syllabusId'),
        );
        $this->Gb_class_model->update_gb_class($classId,$params);   


    }
}    