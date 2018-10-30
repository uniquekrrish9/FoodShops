<?php 

/**
* User Model
*/
class pathlab_model extends CI_Model 
{
	function get_select_option_dist($table,$id,$name, $selected=0){
		$this->db->distinct();
		// $this->db->select('rid');
		$this->db->select($name,'*');
		$this->db->from($table);		
		$query = $this->db->get();
		
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$name]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$name].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	
	function get_select_option($table,$id,$name, $selected=0){
		
		$query = $this->db->get($table);
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$id]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$id].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	function get_select_option_where($table,$id,$name,$where,$selected=0){
		$query = $this->db->query("SELECT * FROM ".$table." WHERE ".$where); 
		$select = '<option value="">--- Please Choose ---</option>';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$selected_option = ($selected==$row[$id]) ? ' selected="selected" ':' ';
				$select.='<option value="'.$row[$id].'" '. $selected_option.'>'.strtoupper($row[$name]).'</option>';
			}
		}
		return $select;
	}
	function insert($table, $data=array())
	{
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function PlaceOrder($table, $data=array())
	{
		$this->db->insert($table, $data);
		if($this->db->affected_rows() > 0)
		{
			$insert_id = $this->db->insert_id();
			return $insert_id;
		}
		else
		{
			return false;
		}
	}

	function userlogin($username, $password)
	{
		$this->db->select('*');
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		// $this->db->where('status','True');
		$this->db->from('usermaster');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			$userdetails = $result->row();
			$userdata['userdetails'] = array('username' =>$userdetails->fname,
				'uid' =>$userdetails->uid,'lname'=>$userdetails->lname,'email'=>$userdetails->email,'role'=>$userdetails->role);
			$this->session->set_userdata($userdata);
			return true;
		}
		else
		{
			return false;
		}
	}


	function login($username, $password)
	{
		$this->db->select('*');
		$this->db->where('email', $username);
		$this->db->where('password', $password);
		// $this->db->where('status','True');
		$this->db->from('usermaster');
		$result = $this->db->get();
		if($result->num_rows() > 0)
		{
			$userdetails = $result->row();
			$userdata['admindetails'] = array('username' =>$userdetails->fname,
				'uid' =>$userdetails->uid,'lname'=>$userdetails->lname,'email'=>$userdetails->email,'role'=>$userdetails->role);
			$this->session->set_userdata($userdata);
			return true;
		}
		else
		{
			return false;
		}
	}
	function SetStatus($table,$user_details,$where, $id)
	{
		$this->db->where($where, $id);
		if($this->db->update($table, $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_id($table,$id){
		$query = $this->db->get($table);
		$select = '';
		if($query->num_rows()>0){
			foreach($query->result_array() as $row){
				$select.=$row[$id];
			}
			
		}
		return $select;
	}

	function update($tablename,$user_details,$where, $id)
	{
		$this->db->where($where, $id);
		if($this->db->update($tablename, $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function edit_user($user_details, $id)
	{
		$this->db->where('uid', $id);
		if($this->db->update('usermaster', $user_details))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function UpdateOrder($oid)
	{
		$this->db->where('oid', $oid);
		if($this->db->update("order_master",array('status'=>1)))
		{
			return true;
		}
		else{
			return false;
		}
		
	}
	function dbselect ($tablename)
	{
		$query = $this->db->query("SELECT * FROM $tablename"); 
		return $query->result_array();
			//return $this->db->get()->result_array();
	}
	function dbselect_where ($tablename)
	{
		$query = $this->db->query("$tablename"); 
		// return $query->result_array();
		return $this->db->get()->row();
	}
	function getUsers()
	{
		$this->db->select('*'); 
		$this->db->from('usermaster');
		return $this->db->get()->result_array();
	}
	function getRests()
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		return $this->db->get()->result_array();
	}
	function getRestsById($id)
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		$this->db->where('rid', $id);
		return $this->db->get()->row();
	}
	function getRowbyId($table,$where,$id)
	{
		$this->db->select('*'); 
		$this->db->from($table);
		$this->db->where($where, $id);
		return $this->db->get()->row();
	}
	function getEnqCount()
	{
		$this->db->select('count(*) as ecount'); 
		$this->db->from('enquiry_master');
		return $this->db->get()->row()->ecount;
	}
	function getSliderCount()
	{
		$this->db->select('count(*) as scount'); 
		$this->db->from('slider_master');
		return $this->db->get()->row()->scount;
	}
	function getOfferCount()
	{
		$this->db->select('count(*) as ocount'); 
		$this->db->from('offer_master');
		return $this->db->get()->row()->ocount;
	}
	function getActiveSliders()
	{
		$this->db->select('*'); 
		$this->db->from('slider_master');
		$this->db->where('status', 'True');
		return $this->db->get()->result_array();
	}
	function getSlidersById($id)
	{
		$this->db->select('*'); 
		$this->db->from('slider_master');
		$this->db->where('sid', $id);
		return $this->db->get()->row();
	}
	function getSpecialOffers()
	{
		$this->db->select('*'); 
		$this->db->from('products');
		$this->db->where('isSpcl', 1);
		return $this->db->get()->result_array();
	}
	function getPopularRest()
	{
		$this->db->select('*'); 
		$this->db->from('rest_master');
		$this->db->where('status', 'True');
		return $this->db->get()->result_array();
	}
	function getEnquiries()
	{
		$this->db->select('*'); 
		$this->db->from('enquiry_master');
		return $this->db->get()->result_array();
	}
	function getUser($id)
	{
		$this->db->select('*'); 
		$this->db->from('usermaster');
		$this->db->where('uid', $id);
		$user_details = $this->db->get()->row();
		return $user_details;
	}

	function deleterecord($tablename='', $fieldname='', $indexid=0)
	{
		$this->db->where($fieldname, $indexid);
		$this->db->delete($tablename);
	}

	//Dependent Dropdown List using AJAX
	function getCity()
	{	
		$this->db->distinct();
		// $this->db->select('rest_city');
		// $this->db->from('rest_master');
		// $city = $this->db->get()->result_array();
		$city = $this->db->get('rest_master')->result();
		$id = array('0');
		$name = array('Select City');
		for ($i = 0; $i < count($city); $i++)
		{
			array_push($id, $city[$i]->rid);
            array_push($name, $city[$i]->rest_city);
		}
		return array_combine($id,$name);
	}

	function getRestaurant($cid=NULL){

		$result = $this->db->where('rest_city',$cid)->get('rest_master')->result();
		$id = array(0);
		$name = array('Select Restaurant');
		// print_r($result);
		for ($i=0; $i<count($result); $i++)
		{
			array_push($id, $result[$i]->rid);
			array_push($name, $result[$i]->rest_name);
		}
		return array_combine($id, $name);
	}
//End of User Model
}
?>