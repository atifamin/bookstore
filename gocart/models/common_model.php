<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model{
	
 	public function insertQuery($TableName, $Data){
		$QUERY = $this->db->insert($TableName, $Data);
		if($QUERY){ return TRUE; }else{ return FALSE; }
	}
	public function getFieldName($tableName, $whereColumn, $whereValue, $returnColumn){
		$query = $this->db->where($whereColumn, $whereValue)->get($tableName)->row();
		return $query->$returnColumn;
	}
	public function insertGetIDQuery($TableName, $Data){
		$this->db->insert($TableName, $Data);
		return $this->db->insert_id();
	}
	public function updateQuery($TableName, $whereColumn, $whereColumnValue, $Data){
		$this->db->where($whereColumn, $whereColumnValue);
		$QUERY = $this->db->update($TableName, $Data);
		if($QUERY){ return TRUE; }else{ return FALSE; }
	}
	public function rawQueryRow($query){
		return $this->db->query($query)->row();
	}
	public function rawQueryResult($query){
		return $this->db->query($query)->result();
	}
	public function listingResult($TableName){
		$this->db->from($TableName);
		$Query = $this->db->get();
		return $Query->result();
	}
	public function listingResultWhere($WhereColumn,$WhereValue,$TableName){
		$this->db->from($TableName);
		$this->db->where($WhereColumn, $WhereValue);
		$Query = $this->db->get();
		return $Query->result();
	}
	public function listingRow($WhereColumn,$WhereValue,$TableName){
		$this->db->from($TableName);
		$this->db->where($WhereColumn, $WhereValue);
		$Query = $this->db->get();
		return $Query->row();
	}
	public function listingMultipleWhereResult($TableName, $WhereArray){
		$this->db->from($TableName);
		if(!empty($WhereArray)){
			foreach($WhereArray as $key => $val){
				$this->db->where($key, $val);
			}
		}
		$Query = $this->db->get();
		return $Query->result();
	}
	public function listingMultipleWhereRow($TableName, $WhereArray){
		$this->db->from($TableName);
		if(!empty($WhereArray)){
			foreach($WhereArray as $key => $val){
				$this->db->where($key, $val);
			}
		}
		$Query = $this->db->get();
		return $Query->row();
	}
	public function delete($TableName, $WhereArray){
		if(!empty($WhereArray)){
			foreach($WhereArray as $key => $val){
				$this->db->where($key, $val);
			}
		}
		$QUERY = $this->db->delete($TableName);
		if($QUERY){ return TRUE; }else{ return FALSE; }
	}
	public function countRows($TableName, $WhereArray){
		$this->db->select("COUNT(*)");
		$this->db->from($TableName);
		if(!empty($WhereArray)){
			foreach($WhereArray as $key => $val){
				$this->db->where($key, $val);
			}
		}
		$Query = $this->db->get();
		return $Query->row();
	}
	public function slug($text, $tblname){
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text)) return 'n-a';
		//checking from table
		$this->db->where("slug", $text);
		$tbl = $this->db->get($tblname);
		$result = $tbl->row();
		if(count($result)>0){
			$slug = $result->slug;
			$this->db->where("slug", "like", "".$slug."-%");
			$this->db->order_by("slug", "DESC");
			$this->db->limit(1);
			$tbl1 = $this->db->get($tblname);
			$result1 = $tbl1->row();
			
			if(count($result1)>0){
				$counter = explode("-", $result1->slug);
				$counter = end($counter);
				$counter++;
				$text = $text.'-'.($counter);
				return $text;
			}else{
				$counter = 0;
				$counter++;
				$text = $text.'-'.($counter);
				return $text;
			}
		}
		return $text;
	}
	public function dateDifferance($date){
		$seconds = strtotime("".$date." 23:59:59") - time();
		
		$days = floor($seconds / 86400);
		$seconds %= 86400;
		
		$hours = floor($seconds / 3600);
		$seconds %= 3600;
		
		$minutes = floor($seconds / 60);
		$seconds %= 60;
		
		$data = array("days"=>$days,"hours"=>$hours,"minutes"=>$minutes,"seconds"=>$seconds,);
		return $data;
	}
	public function createSession($sessionName, $sessionData){
		$setSession = $this->session->set_userdata($sessionName, $sessionData);
		if($setSession){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
}