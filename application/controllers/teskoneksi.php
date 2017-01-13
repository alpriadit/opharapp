<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 
class Teskoneksi extends CI_Controller {
 
        function __construct()  {
                parent::__construct(); 
        }
       
        function index()        {
                $this->db = $this->load->database('default',TRUE);
 
                if(!empty($this->db))
                        echo "Connected!"."\n";
                else
                        echo "Closed"."\n";
        }
}