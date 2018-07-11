<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_mark_record_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_mark_record by recordId
     */
    function get_gb_mark_record($recordId)
    {
        return $this->db->get_where('gb_mark_records',array('recordId'=>$recordId))->row_array();
    }
        
    /*
     * Get all gb_mark_records
     */
    function get_all_gb_mark_records()
    {
        $this->db->order_by('recordId', 'desc');
        return $this->db->get('gb_mark_records')->result_array();
    }
        
    /*
     * function to add new gb_mark_record
     */
    function add_gb_mark_record($params)
    {
        $this->db->insert('gb_mark_records',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_mark_record
     */
    function update_gb_mark_record($recordId,$params)
    {
        $this->db->where('recordId',$recordId);
        return $this->db->update('gb_mark_records',$params);
    }
    
    /*
     * function to delete gb_mark_record
     */
    function delete_gb_mark_record($recordId)
    {
        return $this->db->delete('gb_mark_records',array('recordId'=>$recordId));
    }
}
