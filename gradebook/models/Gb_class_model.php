<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_class_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_class by classId
     */
    function get_gb_class($classId)
    {
        return $this->db->get_where('gb_classes',array('classId'=>$classId))->row_array();
    }
        
    /*
     * Get all gb_classes
     */
    function get_all_gb_classes()
    {
        $this->db->order_by('classId', 'desc');
        return $this->db->get('gb_classes')->result_array();
    }
        
    /*
     * function to add new gb_class
     */
    function add_gb_class($params)
    {
        $this->db->insert('gb_classes',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_class
     */
    function update_gb_class($classId,$params)
    {
        $this->db->where('classId',$classId);
        return $this->db->update('gb_classes',$params);
    }
    
    /*
     * function to delete gb_class
     */
    function delete_gb_class($classId)
    {
        return $this->db->delete('gb_classes',array('classId'=>$classId));
    }

    /**
     * function to check if class name already entered
     */
    function check_gb_class_exists($className)
    {
        $where_array = array('className'=> $className);
        $this->db->where($where_array);
        $this->db->from('gb_classes');
        return ( $this->db->count_all_results() > 0 ? true : false);
    }
}
