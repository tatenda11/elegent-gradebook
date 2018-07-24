<?php
// This file is part of legent Gradebook - http://elegent-microsystems.org/gradebook
//
// Elegent Gradebook is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Elegent Gradebook.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Application Related helper functions for rest service 
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems 2018 
 * @author     Tatenda Munenge <tatemunenge@gmail.com> 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

if(!function_exists('dashboard_route')){
    /** 
     * uses sessinon to determine dashboard to show for
     * we do this because many user groups share view files so we need to create dynamic links 
     * @return string quaified ur to map to appropriate dashboard
    */
    function dashboard_route()
    {
        $obj =& get_instance();
        if($obj->session->userdata('userType') == 'TEACHER' || $obj->session->userdata('userType') == 'A_TEACHER')
        {
            return base_url('teachers/Dashboard');
        }
        if($obj->session->userdata('userType') == 'ADMIN')
        {
            return base_url('admins/Dashboard');
        }
        if($obj->session->userdata('userType') == 'STUDENT')
        {
            return base_url('students/Dashboard');
        }
        return "";
    }
}

