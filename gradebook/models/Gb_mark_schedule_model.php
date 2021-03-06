<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_mark_schedule_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_mark_schedule by recordId
     */
    function get_gb_mark_schedule($recordId)
    {
        return $this->db->get_where('gb_mark_schedule',array('recordId'=>$recordId))->row_array();
    }
        
    /*
     * Get all gb_mark_schedule
     */
    function get_all_gb_mark_schedule()
    {
        $this->db->order_by('recordId', 'desc');
        return $this->db->get('gb_mark_schedule')->result_array();
    }
        
    /*
     * function to add new gb_mark_schedule
     */
    function add_gb_mark_schedule($params)
    {
        $this->db->insert('gb_mark_schedule',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_mark_schedule
     */
    function update_gb_mark_schedule($recordId,$params)
    {
        $this->db->where('recordId',$recordId);
        return $this->db->update('gb_mark_schedule',$params);
    }
    
    /*
     * function to delete gb_mark_schedule
     */
    function delete_gb_mark_schedule($recordId)
    {
        return $this->db->delete('gb_mark_schedule',array('recordId'=>$recordId));
    }
}
