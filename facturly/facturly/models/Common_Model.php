<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_Model extends CI_Model {
	
	/********************************
		Create new entry in db against the table
	*********************************/
	public function createNewRecord($new_record_data,$table)
	{
		if($this->db->insert($table,$new_record_data))
		{
			$status = 1;
		}
		else
		{
			$status = 0;
		}
		return $status;
	}
	
	/********************************
		Create new entry in db against the table and return new record id
	*********************************/
	public function createNewRecordWithId($new_record_data,$table)
	{
		$this->db->insert($table,$new_record_data);
		$record_id = $this->db->insert_id();
		return $record_id;
	}
	
	/********************************
		update existing record in table against column and column value
	*********************************/
	public function updateRecord($table,$column,$column_value,$update_record_data)
	{
		$this->db->where($column,$column_value);
		if($this->db->update($table,$update_record_data))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/********************************
		Check if record already exists in db
	*********************************/
	public function checkExistingRecord($table,$where_cond)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where_cond);
		$query = $this->db->get();
		if ($query->num_rows()>0) {
			$return = $query->result();
		} else {
			$return = array();
		}
		return $return;
	}
}
