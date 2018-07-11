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
 * class for teacher associative type of users menu display
 *
 * @package    gradebook
 * @copyright  2018 Elegent Microsystems
 * @author  `  Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since      Gradebook 1.0.1
 */

class Dashboard extends CI_Controller 
{
    /**
     * function to limit access to logged users by checking session is set
     * @return void 
     */
    private function authenticate()
    {
        if($this->session->has_userdata('userId') == true)
        {
            // IF SESSION IS NOT ASSOCIATED WITH USER TYPE TEACHER AND USER IS NOT ACTIVATED REDIRECT TO GATEWAY
            if($this->session->userdata('userType') !== 'TEACHER' || $this->session->userdata('userType') !== 'A_TEACHER' || $this->session->userdata('status') !== 'ACTIVE')
            {
                redirect(base_url('Gateway'));
            }
        }
        else
        {
            //user session not set redirect user to login
            redirect(base_url('Gateway/login'));
        }
    }

    /**
     * dispalys main menu teacher 
     * @return void
     */
    public function index()
    {
        $this->authenticate();
    }

}