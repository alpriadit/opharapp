<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();		
		if ($this->session->userdata('logged')<>1) {
			redirect(site_url('auth'));
		}			
		$this->load->model('mdata1');
		$this->load->model('OracleModel');
		
	}

	public function index()
	{					
		$data['ListMenu'] = $this->mdata1->get_menu_pkg($this->session->userdata('leveluser'));
		$data['kosong'] =0;					
		$this->load->view('vmain',$data);	
	}	

	public function flagingmanual(){
		$this->load->view('vflaging');	
	}

	public function pembongkaran(){
		$this->load->view('vpembongkaran');	
	}

	public function batal(){
		$this->load->view('vbatalrestitusi');	
	}
	
	public function getdata() {
		$id = $this->input->post('inNoAgenda');

			$data['dataagenda'] = $this->mdata1->get_data($id);     
			$data['dataagenda2'] = $this->mdata1->get_data2($id);   
			$data['dataagenda3'] = $this->mdata1->get_data3($id);    
			if(empty($data['dataagenda'])){		
				$data['dataagenda'] = "Data Tidak Ditemukan";			
				echo json_encode ($data);
			} 
			else {			
				echo json_encode ($data);					
			}							
	}

	public function getekslap(){
		$isi['idpel'] = $this->input->post('inIdPel2');
		$isi['tgl'] = $this->input->post('tglbongkar');
		$isi['notul'] = $this->input->post('inNotul');

		$data['dataekslap'] = $this->mdata1->get_ekslap($isi);
		if(empty($data['dataekslap'])){		
			$data['dataekslap'] = "Data Tidak Ditemukan";			
			echo json_encode ($data);
		} 
		else {			
			echo json_encode ($data);					
		}	
	}
	
	public function save() {
			$save['noagenda'] = $this->input->post('inNoAgenda');           
	        $save['user'] = $this->input->post('inUser');  
	        $save['unit'] = $this->input->post('inUnitUp');  
	        $save['tiket'] = $this->input->post('inNoTiket');
	        $save['permintaan'] = $this->input->post('inPermintaan');           
	        $save['tglpermintaan'] = $this->input->post('inTglPermintaan');  
	        $save['perihal'] = $this->input->post('inPerihal');  
	        $save['noba'] = $this->input->post('inNoBA');
			$res= $this->mdata1->save_data_nontaglis($save);
			if ($res) {
				$msg['hasil'] = $res ;
				echo json_encode ($msg);
			} else {
				$msg['hasil'] = "SUKSES" ;
				echo json_encode ($msg);
			}
	}       

	public function savebatal() { 
	        $save['unitup'] = $this->input->post('inUnitUP');
	        $save['notul'] = $this->input->post('inNotul');
	        $save['idpel'] = $this->input->post('inIdPel2');
	        $save['tglbongkar'] = $this->input->post('tglbongkar');
	        $save['user'] = $this->input->post('inUser');
	        $save['tiket'] = $this->input->post('inNoTiket');
	        $save['permintaan'] = $this->input->post('inPermintaan');
	        $save['tglpermintaan'] = $this->input->post('inTglPermintaan');
	        $save['perihal'] = $this->input->post('inPerihal');
	        $save['noba'] = $this->input->post('inNoBA');
			$res= $this->mdata1->save_batal($save);
			if ($res) {
				$msg['hasil'] = $res ;
				echo json_encode ($msg);
			} else {
				$msg['hasil'] = "SUKSES" ;
				echo json_encode ($msg);
			}
	}       

}

