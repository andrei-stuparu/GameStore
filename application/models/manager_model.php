<?php
	class Manager_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}


		public function login($username,$password){

			$this->db->where('Username',$username);
			$this->db->where('Pass',$password);

			$result=$this->db->get('manager');

			if($result->num_rows()==1){
				return $result-> row(0);
			}else{
				return false;
			}
		}
	}