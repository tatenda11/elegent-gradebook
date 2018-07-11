<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
 * Application themer and view view loader
 *
 * @package    gradebook
 * @copyright  elegent microsystems
 * @author     Tatenda Munenge <tatemunenge@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @since Gradebook 1.0.1
 */

class Theme_loader{
    

     private static function get_CI_object()
     {
         return $obj =& get_instance();
     }

     /**
     * loads assert files for theme  css files and js file 
     * very dependend on naming convectiion 
     * @param $resouce string absolute url 
     * @return string qualified path to resource
     */

    public static function getThemeResource($resource)
    {
        $obj =& get_instance();
        if($obj->session->userdata('theme') != null)
        {
            return base_url('assets/themes/'.$obj->session->userdata('theme').'/'.$resource);
        }
        return base_url('assets/themes/default/'.$resource);
     }

    /**
     * loads assert files for theme  css files and js file 
     * very dependend on naming convectiion 
     * @param $resouce string abosolute url
     * @return string qualified path to resource
     */
    public static function getResource($resource)
    {
        $obj =& get_instance();
        return base_url('assets/common/'.$resource);
    }

     /**
      * loads view files and uses hierachy to search stating with theme specific overite views
      * very dependend on naming convectiion 
      * @param $view name of view files
      * @return string qualified path to view
      */
     public static function getView($view)
     {
         $obj =& get_instance();
         if($obj->session->userdata('theme') != null)
         {
             $files = directory_map('application/views/'.$obj->session->userdata('theme'), 1);
             return in_array($view.'.php', $files ) == true ?$obj->session->userdata('theme').'/'.$view : $view;
         }
         $files = directory_map('application/views/default', 1);
         return in_array($view.'.php', $files ) == true ?'default/'.$view : $view; 
     }
}