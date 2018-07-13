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
 * Controller to manage students
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems
 * @author     Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

class Manage_students extends CI_Controller 
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
    /***
     * @return void
     * function to add new students and render add student view
     */
    public function addStudent()
    {
        $data['page'] = 'Add_students';
        $data['title'] = 'Add Students';
        $data['cssArray'] = array('style.css',$data['page'].'.css');
        $data['jsArray'] = array();
        $this->load->view(Theme_loader::getView('Basefile'),$data);
    }
}