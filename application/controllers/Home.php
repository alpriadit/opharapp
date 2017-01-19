<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();		
		date_default_timezone_set('Asia/Jakarta');
        ini_set('max_execution_time', 0);
        set_time_limit(0);
        // LOAD LIBRARY
		if ($this->session->userdata('logged')<>1) {
			redirect(site_url('auth'));
		}			
		$this->load->model('mdata1');
		$this->load->model('OracleModel');
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('mdata');
        $this->load->library('ftp');
		
	}

	public function index()
	{	
		$roleid = $this->session->userdata('leveluser');
		if ($roleid=='PUSAT') {
			$roleid = '5';
		}				
		$data['ListMenu'] = $this->mdata1->get_menu_pkg($roleid);
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

	//batal restitusi
	public function save2() {
		$save['noagenda'] = $this->input->post('inNoAgenda');           
		$save['user'] = $this->input->post('inUser');  
		$save['unit'] = $this->input->post('inUnitUp');
		$save['keterangan'] = $this->input->post('inKeterangan');  
		$save['tiket'] = $this->input->post('inNoTiket');
		$save['permintaan'] = $this->input->post('inPermintaan');           
		$save['tglpermintaan'] = $this->input->post('inTglPermintaan');  
		$save['perihal'] = $this->input->post('inPerihal');  
		$save['noba'] = $this->input->post('inNoBA');
		$res= $this->mdata1->save_data_nontaglis2($save);
		if ($res) {
			$msg['hasil'] = $res ;
			echo json_encode ($msg);
		} else {
			$msg['hasil'] = "SUKSES" ;
			echo json_encode ($msg);
		}
	}         

	public function dokumen() {
        $data['title'] = "Managemen Dokumen";
        $data['konten'] = "vdokumen";
        $data['rs_jenis_transaksi'] = $this->mdata->get_list_jenis_transaksi();
        $this->load->view('home', $data);
    }

    public function dokumen_process() {

        $save['noagenda'] = $this->input->post('m_noagenda');
        $save['noba'] = $this->input->post('noba');
        $save['jenis_transaksi'] = $this->input->post('jenis_transaksi');
        // cek sudah ada file / belum
        $save['id_upload'] = $this->input->post('m_id_upload');
        if (empty($save['id_upload']) || $save['id_upload'] == '') {
            $save['id_upload'] = $this->mdata->generate_id();
            $aksi = 'simpan';
        } else {
            $aksi = 'ubah';
        }
        // validate
        if (empty($save['noagenda']) && empty($save['noba'])) {
            $gagal[] = "No Agenda / No BA tidak boleh kosong.";
        }
        if (empty($save['jenis_transaksi'])) {
            $warning[] = "Jenis Transaksi tidak boleh kosong.";
        }
        if (empty($_FILES['nama_file']['tmp_name'])) {
            $warning[] = "Pilih file untuk diunggah.";
        }
        $hitung = count($gagal);
        if ($hitung > 0) {
            $response['status'] = "Gagal";
            foreach ($gagal as $pesan_gagal) {
                $row = array();
                $row = "<p>- " . $pesan_gagal . "</p>";
                $hasilrow[] = $row;
            }
            $response['pesan'] = $hasilrow;
            echo json_encode($response);
            exit();
        }
        $hitung = count($warning);
        if ($hitung > 0) {
            $response['status'] = "Warning";
            foreach ($warning as $pesan_gagal) {
                $row = array();
                $row = "<p>- " . $pesan_gagal . "</p>";
                $hasilrow[] = $row;
            }
            $response['pesan'] = $hasilrow;
            echo json_encode($response);
            exit();
        }

        if (!empty($_FILES['nama_file']['tmp_name'])) {
            // load configurasi
            $config = $this->config->item('ftp_config');
            // untuk nama file sesuai dokumen
            $char = array(" ", "/", "(", ")");
            $filename = $save['id_upload'] . '_' . str_replace($char, '_', $_FILES['nama_file']['name']);
            // rename file
            /*
             * $temp = explode(".", $_FILES["nama_file"]["name"]);
             * $extension = end($temp);
             * $filename = $this->input->post('inNoAgenda') . '.' . $extension;
             */
            $save['nama_file'] = $filename;
            //$res = $this->mdata->save_data_dokumen($save);
            // cek koneksi ftp
            if ($this->ftp->connect($config)) {
                // upload parameter
                $locpath = $_FILES['nama_file']['tmp_name'];
                $rempath = "Berita_Acara_Pelaporan/" . date('Ym') . "/" . trim($save['jenis_transaksi']) . "/";
                $mode = "auto";
                $permissions = 0777;
                $servpath = $rempath . $filename;
                // mkdir if not exist
                $this->cek_dir($rempath);
                // upload ke server
                if ($this->ftp->upload($locpath, $servpath, $mode)) {
                    if ($aksi == 'simpan') {
                        // insert db
                        $params = array(
                            'ID_UPLOAD' => $save['id_upload'],
                            'NOAGENDA' => $save['noagenda'],
                            'NAMA_FILE' => $save['nama_file'],
                            'PATH_FILE' => $rempath,
                            'NO_BA' => $save['noba'],
                            'JENIS_TRANSAKSI' => $save['jenis_transaksi'],
                            'MDB' => $this->session->userdata('id_user'),
                            'MDD' => date('Y-m-d H:i:s'),
                        );
                        $this->mdata->insert($params);
                    } else {
                        // insert db
                        $params = array(
                            'NOAGENDA' => $save['noagenda'],
                            'NAMA_FILE' => $save['nama_file'],
                            'PATH_FILE' => $rempath,
                            'NO_BA' => $save['noba'],
                            'JENIS_TRANSAKSI' => $save['jenis_transaksi'],
                            'MDB' => $this->session->userdata('id_user'),
                            'MDD' => date('Y-m-d H:i:s'),
                        );
                        $where = array(
                            'ID_UPLOAD' => $save['id_upload'],
                        );
                        $this->mdata->update($params, $where);
                    }
                    // sukses upload
                    $response['status'] = "Sukses";
                    $response['pesan'] = "<p>- Data berhasil diunggah.</p>";
                    echo json_encode($response);
                } else {
                    $response['status'] = "Gagal";
                    $response['pesan'] = "<p>- Gagal mengunggah data.</p>";
                    echo json_encode($response);
                }
            }
        }
    }


    // LOAD DATA TABLE
    public function dokumen_load_params() {
        $noagenda = $this->input->post('noagenda');
        $noba = $this->input->post('noba');
        $jenis_transaksi = $this->input->post('jenis_transaksi');
        $no_tiket = $this->input->post('no_tiket');
        $tgl_catat = $this->input->post('tgl_catat');
        // get params
        $noagenda = empty($noagenda) ? '%' : $noagenda;
        $noba = empty($noba) ? '%' : $noba;
        $jenis_transaksi = empty($jenis_transaksi) ? '%' : $jenis_transaksi;
        $no_tiket = empty($no_tiket) ? '%' : $no_tiket;
        $tgl_catat = empty($tgl_catat) ? '%' : $tgl_catat;
        // parameter
        $params = array($noagenda, $noba, $jenis_transaksi, $no_tiket, $tgl_catat);
        $res = $this->mdata->get_list_opharapp_by_params($params);
        // get data
        if (empty($res)) {
            $output = array(
                "data" => [],
            );
            echo json_encode($output);
        } else {
            foreach ($res as $data) {
                $row = array();
                if (!empty($data['ID_UPLOAD'])) {
                    $button_file = "<a href='#' class='btn btn-primary btn-xs' onclick='modal_upload(\"" . $data['NOAGENDA'] . "\" , \"" . $data['NO_BA'] . "\" , \"" . $data['JENIS_TRANSAKSI'] . "\" , \"" . $data['ID_UPLOAD'] . "\")' ><i class='fa fa-upload'></i> Unggah</a>"
                            . "&nbsp; <a href=' " . site_url('home/download/' . $data['ID_UPLOAD']) . " ' class='btn btn-warning btn-xs'><i class='fa fa-download'></i> Unduh</a> " . $data['NAMA_FILE'];
                } else {
                    $button_file = "<a href='#' class='btn btn-primary btn-xs' onclick='modal_upload(\"" . $data['NOAGENDA'] . "\" , \"" . $data['NO_BA'] . "\" , \"" . $data['JENIS_TRANSAKSI'] . "\" , \"" . '' . "\")' ><i class='fa fa-upload'></i> Unggah</a>"
                            . "&nbsp; <a href='#' class='btn btn-default btn-xs' disabled><i class='fa fa-download'></i> Unduh</a> ";
                }
                $row[] = $data['NOAGENDA'];
                $row[] = $data['NO_BA'];
                $row[] = $data['JENIS_TRANSAKSI'];
                $row[] = $data['NO_TIKET'];
                $row[] = $data['TGL_CATAT'];
                $row[] = $button_file;
                $dataarray[] = $row;
            }
            $output = array(
                "data" => $dataarray
            );
            echo json_encode($output);
        }
    }

    public function testing_data() {
        $response['status'] = "Sukses";
        $response['pesan'] = "<p>- Data tersedia</p>";
        echo json_encode($response);
    }

    // method for : Cari dokumen
    public function dokumen_cari() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // -
            $noagenda = $this->input->post('noagenda');
            $noba = $this->input->post('noba');
            $jenis_transaksi = $this->input->post('jenis_transaksi');
            $no_tiket = $this->input->post('no_tiket');
            $tgl_catat = $this->input->post('tgl_catat');
            // cek
            if (empty($noagenda) && empty($noba) && empty($jenis_transaksi) && empty($no_tiket) && empty($tgl_catat)) {
                $response['status'] = "Warning";
                $response['pesan'] = "<p>- Silahkan isi form pencarian.</p>";
                echo json_encode($response);
            } else {
                // sukses upload
                $response['status'] = "Sukses";
                $response['pesan'] = "<p>- Data berhasil diunggah.</p>";
                echo json_encode($response);
            }
        }
    }

    public function cek_dir($dir_path) {
        $config = $this->config->item('ftp_config');
        // connect FTP
        if ($this->ftp->connect($config)) {
            // mkdir
            $dir = explode('/', trim($dir_path, '/'));
            $tmp = "/";
            foreach ($dir as $rec) {
                if (!empty($rec)) {
                    $dest = $rec . '/';
                    $tmp .= $dest;
                    $is_dir = is_dir("ftp://" . $config['username'] . ":" . $config['password'] . "@" . $config['hostname'] . $tmp);
                    if (!$is_dir) {
                        $this->ftp->mkdir($tmp, NULL);
                    }
                }
            }
        }
    }

    // download file on ftp server
    public function download($id_upload = "") {
        // -
        $result = $this->mdata->get_file_by_id($id_upload);
        if (empty($result)) {
            redirect('home/dokumen');
        }
        // load configurasi
        $config = $this->config->item('ftp_config');
        // connect FTP
        if ($this->ftp->connect($config)) {
            // file ftp
            $list_file = $this->ftp->list_files($result['PATH_FILE']);
            $file = $result['PATH_FILE'] . $result['NAMA_FILE'];
            if (in_array($file, $list_file)) {
                // download
                header('Content-type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . $result['NAMA_FILE'] . '"');
                if ($this->ftp->download($file, 'php://output', 'binary')) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }    

}

