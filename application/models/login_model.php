<?php
Class login_model extends CI_Model
	{

	// Insert registration data in database

	public function check_new_user($data)
	{
		 $result = $this->db->get_where('mi_customer', array('email' => $data['email']));
		 return $result;
	}


	public function registration_insert($data)
		{

		// Query to check whether username already exist or not

		$condition = "username = ".$data['username']."AND email_confirm = 1";
		$this->db->select('`id`, `username`, `password`, `firstname`, `lastname`, `zip`, `email`, `avatar`, `email_confirm`, `status`');
		$this->db->from('mi_customer');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0)
			{

			// Query to insert data in database

			$this->db->insert('user_login', $data);
			if ($this->db->affected_rows() > 0)
				{
				return true;
				}
			}
		  else
			{
			return false;
			}
		}

	// Read data using username and password

	public function login($data)
		{
		
		$getdata=$this->db->get_where('mi_customer', array('username' => $data['username'],'password'=>$data['password']) );
	

		$user = $getdata->result();
		if ($getdata->num_rows() != 1)
		{ 
		      $out = "1"; //user not exist
		    
		}elseif ($user[0]->password <> $data['password'])
		{ 
		      $out = "2"; //password not same
		    
		}elseif ($user[0]->status == "1")
		{ 
		     $out = "3"; // account locked
		    
		}else 
		{                
		      $out = "TRUE";
		}
		
		return $out;

		}

	// Read data from database to show data in admin page

	public function login_fetch($data) {

        $getdata = $this->db->select('id, username, password, firstname, lastname, zip, email, avatar, email_confirm, status')->get_where('mi_customer', array('username' => $data, 'email_confirm' => '1'));

        if ($getdata->num_rows() == 1) {
            return $getdata->result();
        } else {
            return false;
        }
    }

}

?>







