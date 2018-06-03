<?php
	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_categories($IdCategory=FALSE){
			if($IdCategory===FALSE){
				$query= $this->db->get('category');
				return $query->result_array();
			}
			$query= $this->db->get_where('category',array('IdCategory'=>$IdCategory));
				return $query->row_array();
		}
		public function check_category($NameCategory){
			$query = $this->db->get_where('category',array('NameCategory'=>$NameCategory));
			if(empty($query->row_array())){
				return false;
			}else{
				return true;
			}
			
		}
		
	}