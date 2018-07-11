<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_absent_sheet_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_absent_sheet by studentId
     */
    function get_gb_absent_sheet($studentId)
    {
        return $this->db->get_where('gb_absent_sheet',array('studentId'=>$studentId))->row_array();
    }
        
    /*
     * Get all gb_absent_sheet
     */
    function get_all_gb_absent_sheet()
    {
        $this->db->order_by('studentId', 'desc');
        return $this->db->get('gb_absent_sheet')->result_array();
    }
        
    /*
     * function to add new gb_absent_sheet
     */
    function add_gb_absent_sheet($params)
    {
        $this->db->insert('gb_absent_sheet',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_absent_sheet
     */
    function update_gb_absent_sheet($studentId,$params)
    {
        $this->db->where('studentId',$studentId);
        return $this->db->update('gb_absent_sheet',$params);
    }
    
    /*
     * function to delete gb_absent_sheet
     */
    function delete_gb_absent_sheet($studentId)
    {
        return $this->db->delete('gb_absent_sheet',array('studentId'=>$studentId));
    }
}