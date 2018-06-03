<?php
	class Game_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_games($IdGame=FALSE){
			if($IdGame===FALSE){
				$query= $this->db->get('game');
				return $query->result_array();
			}
			$query= $this->db->get_where('game',array('IdGame'=>$IdGame));
				return $query->row_array();
		}
		public function get_game($IdGame){
			$this->db->where('IdGame',$IdGame);
			$result=$this->db->get('game');
			return $result-> row(0);
			
		}

		public function get_games_by_category($IdCategory){
			$query= $this->db->get_where('game',array('IdCategory'=>$IdCategory));
				return $query->result_array();
		}
		public function get_games_by_id($IdGame){
			$query= $this->db->get_where('game',array('IdGame'=>$IdGame));
				return $query->result_array();
		}
		public function get_category_by_id($IdCategory){
			$this->db->where('IdCategory',$IdCategory);
			$result=$this->db->get('category');
			return $result-> row(0);
		}
		public function get_category_by_name($NameCategory){
			$this->db->where('NameCategory',$NameCategory);
			$result=$this->db->get('category');
			return $result-> row(0);
		}
		public function delete_game($idGame){
			$this->db->where('IdGame',$idGame);
			$this->db->delete('game');
			return true;
		}
		public function update_game(){
			$IdGame =$this->input->post('id');
			$category = $this->get_category_by_name($this->input->post('category'));
			$IdCategory= $category->IdCategory;
			$data = array(
					'IdGame' =>$this->input->post('id'),
					'NameGame' => $this->input->post('gameName'),
					'PriceGame' =>$this->input->post('price'),
					'Reduction'=>$this->input->post('reduction'),
					'RequiredAge' =>$this->input->post('age'),
					'Copies'=>$this->input->post('copies'),
					'IdCategory' =>$IdCategory
				);
			$this->db->where('IdGame',$IdGame);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->update('game',$data);
		}
		public function reduce_copies($IdGame){
			$this->db->where('IdGame', $IdGame);
			$this->db->set('Copies', 'Copies-1', FALSE);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->update('game');
		}

		public function increment_copies($IdGame){
			$this->db->where('IdGame', $IdGame);
			$this->db->set('Copies', 'Copies+1', FALSE);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->update('game');
		}

		public function create_game(){
			$myvar  = empty($myvar) ? NULL : $myvar;
			$category = $this->get_category_by_name($this->input->post('category'));
			$IdCategory= $category->IdCategory;
			$data = array(
					'IdGame' =>NULL,
					'NameGame' => $this->input->post('gameName'),
					'PriceGame' =>$this->input->post('price'),
					'Reduction'=>$this->input->post('reduction'),
					'RequiredAge' =>$this->input->post('age'),
					'Copies'=>$this->input->post('copies'),
					'IdCategory' =>$IdCategory
				);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->insert('game', $data);
		}

		public function add_game_cart($idGame){
			if(isset($_COOKIE['loginCustomer2'])){
				$myvar  = empty($myvar) ? NULL : $myvar;
				$data=array(
						'IdEntry'=>$myvar,
						'StatusEntry'=>'NotOrdered',
						'IdGame'=>$idGame,
						'IdCustomer'=>$_COOKIE['loginCustomer2']
					);
				$data = $this->security->xss_clean($data);
				$data = html_escape($data);
				return $this->db->insert('boughts', $data);
			}else{
				return false;
			}
		}



		public function get_cart_games($IdGame=FALSE){
			if(isset($_COOKIE['loginCustomer2'])){
				if($IdGame===FALSE){
					$this->db->where('StatusEntry','NotOrdered');
					$this->db->where('IdCustomer',$_COOKIE['loginCustomer2']);
					$query= $this->db->get('boughts');
					return $query->result_array();
				}
				$query= $this->db->get_where('boughts',array('IdGame'=>$IdGame,'StatusEntry'=>'NotOrdered'));
					return $query->row_array();
			}else{
				return false;
			}
		}

		public function remove_game_cart($idGame,$idCustomer){
			$this->db->where('StatusEntry','NotOrdered');
			$this->db->where('IdGame',$idGame);
			$this->db->where('IdCustomer',$idCustomer);
			$this->db->limit(1);
			$this->db->delete('boughts');
			return true;
		}
		public function games_price(){
			$this->db->select_sum('PriceGame');
			$result = $this->db->get('game')->row();  
			
		}
		public function compute_order(){
			if(isset($_COOKIE['loginCustomer2'])){
			$myvar  = empty($myvar) ? NULL : $myvar;
			$data=array(
					'IdOrder'=>NULL,
					'DateOrder'=>date('Y-m-d'),
					'ShippingAdress'=>$this->input->post('adress'),
					'ShippingPostalCode'=>$this->input->post('cp'),
					'TotalCost'=>$this->input->post('price'),
					'IdCustomer'=>$_COOKIE['loginCustomer2']
				);
			$data = $this->security->xss_clean($data);
			$data = html_escape($data);
			return $this->db->insert('onlineorder', $data);  
			}else{
				return false;
			}
			
		}
		public function last_order(){
			if(isset($_COOKIE['loginCustomer2'])){
				$this->db->where('IdCustomer',$_COOKIE['loginCustomer2']);
				$query= $this->db->get('onlineorder');
				$query=$query->last_row();
				return $query;
			}else{
				return false;
			}
		}
		public function pass_cart($var){
			$var2=$var->IdOrder;
			if(isset($_COOKIE['loginCustomer2'])){
				$data = array(
					'StatusEntry' =>$var2,
				);
				$this->db->where('IdCustomer',$_COOKIE['loginCustomer2'] );
				$this->db->where('StatusEntry','NotOrdered');
				$data = $this->security->xss_clean($data);
				$data = html_escape($data);
				return $this->db->update('boughts',$data);  
			}else{
				return false;
			}
		}

		public function get_orders(){
			if(isset($_COOKIE['loginCustomer2'])){
				$this->db->where('IdCustomer',$_COOKIE['loginCustomer2']);
				$query= $this->db->get('onlineorder');
				return $query->result_array();
			}else{
				return false;
			}

		}
		public function get_entryes($idOrder){
			if(isset($_COOKIE['loginCustomer2'])){
				$this->db->where('IdCustomer',$_COOKIE['loginCustomer2']);
				$this->db->where('StatusEntry',$idOrder);
				$query= $this->db->get('boughts');
				return $query->result_array();
			}else{
				return false;
			}

		}
		public function get_all_entryes(){
				$query= $this->db->get('boughts');
				return $query->result_array();

		}

		public function get_all_orders(){
				$query= $this->db->get('onlineorder');
				return $query->result_array();
		}
		public function end_order($idOrder){
				$this->db->where('IdOrder',$idOrder);
				$this->db->delete('onlineorder');
				$this->finish_entryes($idOrder);
			return true;
		}

		public function finish_entryes($idOrder){
				$data = array(
					'StatusEntry' =>'Finished',
				);
				$this->db->where('StatusEntry',$idOrder);
				$data = $this->security->xss_clean($data);
				$data = html_escape($data);
				return $this->db->update('boughts',$data);  
		}
}