<?php
	class customer_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function create_customer($enc_password){
			$myvar  = empty($myvar) ? NULL : $myvar;
			$data = array(
					'IdCustomer' =>$myvar,
					'NomCustomer' => $this->input->post('lastName'),
					'PrenomCustomer' =>$this->input->post('firstName'),
					'Age' =>$this->input->post('age'),
					'Telephone' =>$this->input->post('telephone'),
					'MailCustomer'=>$this->input->post('email'),
					'StatusCustomer'=>$myvar,
					'Password'=>$enc_password
				);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->insert('customer', $data);
		}

		public function check_email_used($email){
			$query = $this->db->get_where('customer',array('MailCustomer'=>$email));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function login($email,$password){

			$this->db->where('MailCustomer',$email);
			$this->db->where('Password',$password);

			$result=$this->db->get('customer');

			if($result->num_rows()==1){
				return $result-> row(0);
			}else{
				return false;
			}
		}
	}