<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_preferance_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_preferance by userId
     */
    function get_gb_user_preferance($userId)
    {
        return $this->db->get_where('gb_preferances',array('userId'=>$userId))->row_array();
    }
        
    /*
     * Get all gb_preferances
     */
    function get_all_gb_preferances()
    {
        $this->db->order_by('entryId', 'desc');
        return $this->db->get('gb_preferances')->result_array();
    }
        
    /*
     * function to add new gb_preferance
     */
    function add_gb_preferance($params)
    {
        $this->db->insert('gb_preferances',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_preferance
     */
    function update_gb_preferance($entryId,$params)
    {
        $this->db->where('entryId',$entryId);
        return $this->db->update('gb_preferances',$params);
    }
    
    /*
     * function to delete gb_preferance
     */
    function delete_gb_preferance($entryId)
    {
        return $this->db->delete('gb_preferances',array('entryId'=>$entryId));
    }
}
