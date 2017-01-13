<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin');
    }  	

    public function index($error = NULL) {
        $data = array(
            'title' => 'Login Page',
            'action' => site_url('auth/login'),
            'error' => $error
        );
        $this->load->view('vlogin', $data);
    }
	
	function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');       
        
        $a = $this->Mlogin->set_login($username,$password);
        if(count($a)>0){
            foreach($a as $key){
                    $id_user = $key->ID_USER;
                    $unit_up = $key->UNITUP;
                    $nama_user = $key->NAMA_USER;
                    $disable_user = $key->DISABLE_USER; 
                    $leveluser = $key->LEVELUSER;                    
            }            
                $usersession = array(
								'logged' => TRUE,
                                'id_user'=>$id_user,
                                'unit_up'=>$unit_up,
                                'nama_user'=>$nama_user,
                                'disable_user'=>$disable_user,
                                'loginstate'=>1,
                                'leveluser'=>$leveluser,
                            );
                $this->session->set_userdata($usersession);
                redirect(site_url('home'));
        }
        else{
			$error = 'User / Password Salah';
			$this->index($error);
        }
        
    }	

    function logout() {
        $this->session->sess_destroy();        
        redirect(site_url('auth'));
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */