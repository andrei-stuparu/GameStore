<?php
	class Pages extends CI_Controller{
		public function view($page ='games'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			$data['categories'] = $this->category_model->get_categories();
			$data['games'] = $this->game_model->get_games();
			$data['title'] = ucfirst($page);
			$data['cartGames']= $this->game_model->get_cart_games();
			$data['orders']=$this->game_model->get_orders();
			$data['allOrders']=$this->game_model->get_all_orders();

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer');
	}
		public function view1($page ='home'){
			if(!file_exists(APPPATH.'views/mains/'.$page.'.php')){
				show_404();
			}

			$data['title'] = ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('mains/'.$page,$data);
			$this->load->view('templates/footer');
	}

		public function addCustomer(){
			$data['title']= 'Create';

			$this->form_validation->set_rules('firstName', 'FirstName','required');
			$this->form_validation->set_rules('lastName', 'LastName','required');
			$this->form_validation->set_rules('age', 'Age','required');
			$this->form_validation->set_rules('telephone', 'Telephone','required');
			$this->form_validation->set_rules('email', 'Email','required|callback_check_email_used');
			$this->form_validation->set_rules('pass', 'Password','required');
			$this->form_validation->set_rules('pass2', ' Confirm Password','matches[pass]');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/create',$data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('pass'));
				$this->customer_model->create_customer($enc_password);
				setcookie("userSuccess",'alert',time()+10,"/");
				redirect('home');
			}

			
		}

		
		public function gamesByCategory(){
			$idCategory=$this->input->post('idCat');
			$data['cat']=$this->category_model->get_categories($idCategory);
			$data['title']= $data['cat']['NameCategory'];
			$data['games'] = $this->game_model->get_games_by_category($data['cat']['IdCategory']);
			$this->load->view('templates/header');
			$this->load->view('pages/send',$data);
			$this->load->view('templates/footer');
		}

		public function check_email_used($email){
			$this->form_validation->set_message('check_email_used', 'The email has already been used by another customer');
			if($this->customer_model->check_email_used($email)){
				return true;
			}else{
				return false;
			}
		}
		public function login(){
			$data['title']= 'Login';
			$this->form_validation->set_rules('email', 'Email','required');
			$this->form_validation->set_rules('password', 'Password','required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/login',$data);
				$this->load->view('templates/footer');
			}else{
				$email=$this->input->post('email');
				$password = md5($this->input->post('password'));

				$customer=$this->customer_model->login($email,$password);
				$customer_name = $customer->NomCustomer;
				$customer_id = $customer->IdCustomer;
				if($customer_id){
					setcookie("loginCustomer",$customer_name,time()+10800,"/");
					setcookie("loginCustomer2",$customer_id,time()+10800,"/");
					setcookie("loginCustomerSuccess",'alert',time()+10,"/");
					redirect('home');
				}else{
					setcookie("loginCustomerFail",'alert',time()+10,"/");
					redirect('login');
				}
			}

			
		}

		public function logout(){
			delete_cookie("loginCustomer");
			delete_cookie("loginCustomer2");
			setcookie("logoutCustomer",'alert',time()+10,"/");
			redirect('home');
		}

			public function login2(){
			$data['title']= 'Login Manager';
			$this->form_validation->set_rules('user', 'Username','required');
			$this->form_validation->set_rules('pass', 'Password','required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/login2',$data);
				$this->load->view('templates/footer');
			}else{
				$user=md5($this->input->post('user'));
				$password = md5($this->input->post('pass'));

				$manager=$this->manager_model->login($user,$password);
				$manager_id = $manager->IdManager;
				if($manager_id){
					setcookie("loginManager", $user, time()+10800,"/");
					setcookie("loginManagerSuccess",'alert',time()+10,"/");
					redirect('home');
				}else{
					setcookie("loginManagerFail",'alert',time()+10,"/");
					redirect('login2');
				}

				
			}

			
		}

		public function logout2(){
			delete_cookie("loginManager");
			setcookie("logoutManager",'alert',time()+10,"/");
			redirect('home');
		}

		public function delete_game($idGame){
			$boughts=$this->game_model->get_all_entryes();
			$result=false;
			foreach($boughts as $bought){
				if($bought['IdGame']==$idGame){
					$result=true;
				}
			}
			if ($result){
				setcookie("gameDeleteFail",'alert',time()+10,"/");
				redirect('shop');
			}else{	
				$this->game_model->delete_game($idGame);
				setcookie("gameDeleted",'alert',time()+10,"/");
				redirect('shop');
			}
		}
		public function update_game($idGame){
			$data['myGame']=$this->game_model->get_game($idGame);
			$data['title'] = 'Update' . ' '.ucfirst($data['myGame']->NameGame);
			$data['category'] = $this->game_model->get_category_by_id($data['myGame']->IdCategory);

			$this->load->view('templates/header');
			$this->load->view('pages/game_update',$data);
			$this->load->view('templates/footer');
		}
		
		public function update_game_db(){
			$idGame =$this->input->post('id');
			$data['myGame']=$this->game_model->get_game($idGame);
			$data['title'] = 'Update' . ' '.ucfirst($data['myGame']->NameGame);
			$data['category'] = $this->game_model->get_category_by_id($data['myGame']->IdCategory);
			$this->form_validation->set_rules('gameName', 'GameName','required');
			$this->form_validation->set_rules('category', 'Category','required|callback_check_category');
			$this->form_validation->set_rules('age', 'Age','required');
			$this->form_validation->set_rules('price', 'Price','required');
			$this->form_validation->set_rules('reduction', 'Reduction','required');
			$this->form_validation->set_rules('copies', 'Copies','required');
			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/game_update',$data);
				$this->load->view('templates/footer');
			}else{
				$this->game_model->update_game();
				setcookie("gameUpdated",'alert',time()+10,"/");
				redirect('shop');
			}
		}
		public function check_category($category){
			$this->form_validation->set_message('check_category', 'The category you have picked is not in the database');
			if($this->category_model->check_category($category)){
				return true;
			}else{
				return false;
			}
		}

		public function create_game(){
			$data['title']= 'Create Game';

			$this->form_validation->set_rules('gameName', 'GameName','required');
			$this->form_validation->set_rules('category', 'Category','required|callback_check_category');
			$this->form_validation->set_rules('age', 'Age','required');
			$this->form_validation->set_rules('price', 'Price','required');
			$this->form_validation->set_rules('reduction', 'Reduction','required');
			$this->form_validation->set_rules('copies', 'Copies','required');

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/create_game',$data);
				$this->load->view('templates/footer');
			}else{
				$this->game_model->create_game();
				setcookie("gameCreated",'alert',time()+10,"/");
				redirect('shop');
			}

			
		}

		public function add_game_cart($idGame){
			$this->game_model->add_game_cart($idGame);
			$this->game_model->reduce_copies($idGame);
			setcookie("gameAdded",'alert',time()+10,"/");
			redirect('shop');
		}

		public function remove_game_cart(){
			$idGame= $this->input->post('idG');
			$idCustomer=$_COOKIE['loginCustomer2'];
			$this->game_model->remove_game_cart($idGame,$idCustomer);
			$this->game_model->increment_copies($idGame);
			setcookie("gameRemoved",'alert',time()+10,"/");
			redirect('cart');
		}

		public function order_print(){
			$data['title']='Order';
			$data['price']=$this->input->post('price');
			$this->load->view('templates/header');
			$this->load->view('pages/order',$data);
			$this->load->view('templates/footer');
		}

		public function compute_order(){
			$data['title']="Order";
			$data['price']=$this->input->post('price');
			$this->form_validation->set_rules('adress', 'Adress','required');
			$this->form_validation->set_rules('cp', 'Postal Code','required');
			

			if($this->form_validation->run()===FALSE){
				$this->load->view('templates/header');
				$this->load->view('pages/order',$data);
				$this->load->view('templates/footer');
			}else{
				$this->game_model->compute_order();
				$var= $this->game_model->last_order();
				$this->game_model->pass_cart($var);
				setcookie("orderPassed",'alert',time()+10,"/");
				redirect('shop');
			}
		}
		public function gamesByOrder(){
			$idOrder=$this->input->post('idOrder');
			$ents=$this->game_model->get_entryes($idOrder);
			$data['games'] = array();
			foreach($ents as $ent ){
				$data['games'][]=$this->game_model->get_games_by_id($ent['IdGame']);
			}
			
			$data['title']= $idOrder;
			$this->load->view('templates/header');
			$this->load->view('pages/viewOrder',$data);
			$this->load->view('templates/footer');
		}
		public function endOrder(){
			$idOrder=$this->input->post('idOrder');
			$this->game_model->end_order($idOrder);
			setcookie("orderFinished",'alert',time()+10,"/");
			redirect(shop);
		}
}