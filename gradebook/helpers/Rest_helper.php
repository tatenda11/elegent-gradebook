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

if(!function_exists('responce_parser')){
    /** 
     * function for oneway password encrptio
     * @param array <responce_array>
     * @return array uniformy formatted array
    */
    function reseponce_parser($response_array)
    {
        return array ('data' => $response_array);
    }
}

if(!function_exists('is_input_valid')){
    /**
     * function to validate user input
     * @param array <required fields> an array of the require field
     * @param string http method is used for submited fielsd
     * @return boolean isInput valid 
     */
    function is_input_valid($required_fields, $http_method = 'POST')
    {
        $obj =& get_instance();
        if(strtoupper($http_method) == 'POST')
        {
            $is_valid = true;
            for($index = 0; $index < Count($required_fields); $index ++ )
            {
                if($obj->input->post($required_fields[$index]) == '')
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
                if($obj->get($required_fields[$index]) == "")
                {
                    $is_valid = false;
                }
            }
            return $is_valid;   
        }
        return false;
    }
}