<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_subject_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_subject by subjectId
     */
    function get_gb_subject($subjectId)
    {
        return $this->db->get_where('gb_subjects',array('subjectId'=>$subjectId))->row_array();
    }
        
    /*
     * Get all gb_subjects
     */
    function get_all_gb_subjects()
    {
        $this->db->order_by('subjectId', 'desc');
        return $this->db->get('gb_subjects')->result_array();
    }
        
    /*
     * function to add new gb_subject
     */
    function add_gb_subject($params)
    {
        $this->db->insert('gb_subjects',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_subject
     */
    function update_gb_subject($subjectId,$params)
    {
        $this->db->where('subjectId',$subjectId);
        return $this->db->update('gb_subjects',$params);
    }
    
    /*
     * function to delete gb_subject
     */
    function delete_gb_subject($subjectId)
    {
        return $this->db->delete('gb_subjects',array('subjectId'=>$subjectId));
    }
}