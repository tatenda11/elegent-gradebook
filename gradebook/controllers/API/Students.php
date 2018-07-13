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
 * @copyright  Elegent Microsystems--------
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

    public function index_get()
    {
        $message = [
            'id' => 100, 
            'name' => 'tatenda',
            'profession' => 'programmer'
        ];
        $this->set_response(reseponce_parser($message), REST_Controller::HTTP_CREATED); // CREATED (20
    }
    /**
     * @method post
     * function to add new students with http post
     */
    public function add_new_student_post()
    {
    
    }
   

}