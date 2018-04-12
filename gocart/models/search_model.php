<?php
Class Search_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	/********************************************************************

	********************************************************************/
	
	function record_term($term)
	{
		$code	= md5($term);
		$this->db->where('code', $code);
		$exists	= $this->db->count_all_results('search');
		if ($exists < 1)
		{
			$this->db->insert('search', array('code'=>$code, 'term'=>$term));
		}
		return $code;
	}
	
	function get_term($code)
	{
		$this->db->select('term');
		$result	= $this->db->get_where('search', array('code'=>$code));
		$result	= $result->row();
		return $result->term;
	}
	
	function searchItems($Search){
		$this->db->select('*');
		$this->db->from('gc_products');
		$this->db->or_like('sku', $Search);
		$this->db->or_like('name', $Search);
		$this->db->where('enabled','1');
		//$this->db->or_like('description', $Search);
		$this->db->group_by("slug");
		$this->db->order_by('sku','ASC');
		$Query = $this->db->get();
		return $Query->result();
	}
}