<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Gb_paper_look_up_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get gb_paper_look_up by paperId
     */
    function get_gb_paper_look_up($paperId)
    {
        return $this->db->get_where('gb_paper_look_up',array('paperId'=>$paperId))->row_array();
    }
        
    /*
     * Get all gb_paper_look_up
     */
    function get_all_gb_paper_look_up()
    {
        $this->db->order_by('paperId', 'desc');
        return $this->db->get('gb_paper_look_up')->result_array();
    }
        
    /*
     * function to add new gb_paper_look_up
     */
    function add_gb_paper_look_up($params)
    {
        $this->db->insert('gb_paper_look_up',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update gb_paper_look_up
     */
    function update_gb_paper_look_up($paperId,$params)
    {
        $this->db->where('paperId',$paperId);
        return $this->db->update('gb_paper_look_up',$params);
    }
    
    /*
     * function to delete gb_paper_look_up
     */
    function delete_gb_paper_look_up($paperId)
    {
        return $this->db->delete('gb_paper_look_up',array('paperId'=>$paperId));
    }
}