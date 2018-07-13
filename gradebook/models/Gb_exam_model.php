<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_exam_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_exam by examId
     */
    function get_gb_exam($examId)
    {
        return $this->db->get_where('gb_exams',array('examId'=>$examId))->row_array();
    }
        
    /*
     * Get all gb_exams
     */
    function get_all_gb_exams()
    {
        $this->db->order_by('examId', 'desc');
        return $this->db->get('gb_exams')->result_array();
    }
        
    /*
     * function to add new gb_exam
     */
    function add_gb_exam($params)
    {
        $this->db->insert('gb_exams',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_exam
     */
    function update_gb_exam($examId,$params)
    {
        $this->db->where('examId',$examId);
        return $this->db->update('gb_exams',$params);
    }
    
    /*
     * function to delete gb_exam
     */
    function delete_gb_exam($examId)
    {
        return $this->db->delete('gb_exams',array('examId'=>$examId));
    }
}
