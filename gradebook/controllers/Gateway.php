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
 * Application Entry point. Handles authentication and pipes to approriate dashboard
 *
 * @package    gradebook
 * @copyright  2018 Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

class Gateway extends CI_Controller 
{
    /**
     * @return void
     * checks session andauthenticate users
     */
    private function handleRequest()
    {
        //check if session was set
        if($this->session->has_userdata('userId') == true)
        {
            //check if the user is activated
            if($this->session->userdata('status') == 'ACTIVE')
            {
                //send to appropriate dashboard
                if($this->session->userdata('userType') == 'TEACHER' || $this->session->userdata('userType') == 'A_TEACHER')
                {
                    redirect(base_url('teachers/Dashboard'));
                    return;
                }
                if($this->session->userdata('userType') == 'ADMIN')
                {
                    redirect(base_url('admins/Dashboard'));
                    return;
                }
                if($this->session->userdata('userType') == 'STUDENT')
                {
                    redirect(base_url('students/Dashboard'));
                    return;
                }
                die('<h1>Problem recsolving account login again or contact system admin</h1>');
                return;
                  
            }
            die("<h1>Account not activated contact system admin or try <a href'". base_url('Gateway/login') ."'>to login again</a> </h1>");
        }
        else
        {
            redirect(base_url('Gateway/login'));
        }
    }

    public function index()
	{
		$this->handleRequest();
	}

    /**
     * @return void
     * display login view
     * handle login request
     */
    public function login()
    {
        $data['page'] = 'Login';
        $data['title'] ='Gradebook | login';
        $data['cssArray'] = array('Login.css');
        $this->load->helper('form');
        if( $this->input->post('txt_username') !== null && $this->input->post('txt_password') !== null)
        {
           $this->load->model('Gb_user_model');
           $this->load->helper('Passwords');
           $user = $this->Gb_user_model->get_gb_user_by_username($this->input->post('txt_username'));
           if(!empty($user) && compare_password_hash($this->input->post('txt_password'),$user['password']) == true)
           {
               // user username and password match prepare session
               $this->load->model('Gb_preferance_model');
               $pref = $this->Gb_preferance_model->get_gb_user_preferance($user['userId']);
               $sessionData = array
               (
                    'username'      => $user['username'],
                    'userId'        => $user['userId'],
                    'userType'      => $user['userType'],
                    'status'        => $user['status'],
                    'lastLogin'     => $user['lastLogin'],
                    'textSize'      => (!empty($pref) && $pref['textSize'] !== "" ? $pref['textSize'] : 'SMALL'),
                    'theme'         => (!empty($pref) && $pref['theme'] !== "" ? $pref['theme'] : 'default'),
                    'colorSkin'     => (!empty($pref) && $pref['colorSkin'] !== "" ? $pref['colorSkin'] : 'default'),
                );
                $this->session->set_userdata($sessionData);
                $this->handleRequest();
           }
           $data['error'] = 'Invalid Credentials';
        }
        $this->load->view(Theme_loader::getView('Basefile'),$data);
       
    }
    
    

}