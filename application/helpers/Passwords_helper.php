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
 * Application Password helper for password encryption
 *
 * @package    gradebook
 * @copyright  Elegent Microsystems 2018 
 * @author     Tatenda Munenge <tatemunenge@gmail.com> 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

if(!function_exists('hash_password')){
    /** 
     * function for oneway password encrption
     * @param $str <String> to be hashed
     * @return <String> encrypted password
    */
    function hash_password($str)
    {
        $hashed_str = password_hash( $str, PASSWORD_BCRYPT, array('cost' => 8));
        return $hashed_str;
    }

}

if(!function_exists('compare_password_hash')){
    /**
     * function to check if a plain text value matches hashed value
     * @param  $plainText <string> plain text string
     * @param $hashed_string <string> encrypted string
     * @return boolean
     */
    function compare_password_hash($plainText, $hashed_string)
    {
        $result = password_verify($plainText, $hashed_string); 
        return $result;  
    }
}
