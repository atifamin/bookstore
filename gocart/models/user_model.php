<?php
Class User_model extends CI_Model{
	function __construct()
    {
        parent::__construct();

      
    }
	function save_data($customer)
    {
        if ($customer['id'])
        {
            $this->db->where('id', $customer['id']);
            $this->db->update('customers', $customer);
            return $customer['id'];
        }
        else
        {
            $this->db->insert('customers', $customer);
            return $this->db->insert_id();
        }
    }
	function get_customers()
    {
        $result = $this->db->get('customers');
        return $result->result();
    }
	function user_detail($c_id){
		
		$this->db->select('*');
		$this->db->from('customers');
		$this->db->where('id', $c_id);
		
		$result = $this->db->get();
        return $result->row();
	}
	function user_detail_all($c_id){
  
  $this->db->select('*');
  $this->db->from('customers');
  $this->db->where('id', $c_id);
  
  $result = $this->db->get();
        return $result;
 }
}