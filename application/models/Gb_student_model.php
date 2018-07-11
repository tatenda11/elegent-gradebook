<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_student_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_student by studentId
     */
    function get_gb_student($studentId)
    {
        return $this->db->get_where('gb_students',array('studentId'=>$studentId))->row_array();
    }
        
    /*
     * Get all gb_students
     */
    function get_all_gb_students()
    {
        $this->db->order_by('studentId', 'desc');
        return $this->db->get('gb_students')->result_array();
    }
        
    /*
     * function to add new gb_student
     */
    function add_gb_student($params)
    {
        $this->db->insert('gb_students',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_student
     */
    function update_gb_student($studentId,$params)
    {
        $this->db->where('studentId',$studentId);
        return $this->db->update('gb_students',$params);
    }
    
    /*
     * function to delete gb_student
     */
    function delete_gb_student($studentId)
    {
        return $this->db->delete('gb_students',array('studentId'=>$studentId));
    }
}
