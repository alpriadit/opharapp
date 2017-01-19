<?php if(!defined('BASEPATH')) exit('No direct script allowed');



    class mdata1 extends CI_Model{
    	
    	function __construct()
      {
        parent::__construct();
      }  

    function get_menu_pkg($roleid=NULL){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN  :OUT_DATA := OPHARAPP.PKG_OPHAR_MENU.FUNC_GETMENU(:roleid); END;');

        $OUT_DATA = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':roleid', $roleid, 20) or die('Error binding string1');
        oci_bind_by_name($stid, ':OUT_DATA', $OUT_DATA,-1, OCI_B_CURSOR) or die('Error binding string4');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($OUT_DATA, OCI_DEFAULT);
          oci_fetch_all($OUT_DATA, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);          

          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 

        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);
    
    //print_r($results);
        return $results;
    }     
      
    public function get_data($id){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p1 = $id;
        $v = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'begin OPHARAPP.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
        $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p1', $p1,30) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
        oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($p_cursor1, OCI_DEFAULT);
          oci_fetch_all($p_cursor1, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
          //echo '<br>';
          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;

    }

    public function get_data2($id){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p1 = $id;
        $v = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'begin OPHARAPP.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
        $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p1', $p1,30) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
        oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($p_cursor2, OCI_DEFAULT);
          oci_fetch_all($p_cursor2, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
          //echo '<br>';
          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;

    }

    public function get_data3($id){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $p1 = $id;
        $v = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'begin OPHARAPP.PKG_INFOAGENDA.CARI(:p1,:p_cursor1,:p_cursor2,:p_cursor3,:v); end;');
        $p_cursor1 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor2 = oci_new_cursor($this->pblmig_db->conn_id);
        $p_cursor3 = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':p1', $p1,30) or die('Error binding string1');
        oci_bind_by_name($stid, ':p_cursor1', $p_cursor1,-1, OCI_B_CURSOR) or die('Error binding string2');
        oci_bind_by_name($stid, ':p_cursor2', $p_cursor2,-1, OCI_B_CURSOR) or die('Error binding string3');
        oci_bind_by_name($stid, ':p_cursor3', $p_cursor3,-1, OCI_B_CURSOR) or die('Error binding string4');
        oci_bind_by_name($stid, ':v', $v,100, SQLT_CHR) or die('Error binding string5');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($p_cursor3, OCI_DEFAULT);
          oci_fetch_all($p_cursor3, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
          //echo '<br>';
          $results = $cursor;
          //print_r($cursor);  
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;

    } 

    public function get_ekslap($isi){
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $idpel = $isi['idpel'];
        $tglbongkar = $isi['tgl'];
        $notul = $isi['notul'];
        $OUT_MESSAGE = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'begin OPHARAPP.PKG_CARIEXLAP.CARI_EXLAP ( :notul, :idpel, :tglbongkar, :OUT_DATADETIL, :OUT_MESSAGE ); end;');
        $OUT_DATADETIL = oci_new_cursor($this->pblmig_db->conn_id);

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':notul', $notul,10) or die('Error binding string1');
        oci_bind_by_name($stid, ':idpel', $idpel,20) or die('Error binding string2');
        oci_bind_by_name($stid, ':tglbongkar', $tglbongkar,8) or die('Error binding string3');
        oci_bind_by_name($stid, ':OUT_DATADETIL', $OUT_DATADETIL,-1, OCI_B_CURSOR) or die('Error binding string4');
        oci_bind_by_name($stid, ':OUT_MESSAGE', $OUT_MESSAGE,100, SQLT_CHR) or die('Error binding string5');
        //Bind Cursor     put -1

        if(oci_execute($stid)){
          oci_execute($OUT_DATADETIL, OCI_DEFAULT);
          oci_fetch_all($OUT_DATADETIL, $cursor, null, null, OCI_FETCHSTATEMENT_BY_ROW);
          $results = $cursor;
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;

    } 

  function save_data_nontaglis($save) {        
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $noagenda = $save['noagenda'];           
        $user = $save['user'];  
        $unit = $save['unit'];  
        $tiket = $save['tiket'];
        $permintaan = $save['permintaan'];           
        $tglpermintaan = $save['tglpermintaan'];  
        $perihal = $save['perihal'];  
        $noba = $save['noba'];
        $msg_out = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN OPHARAPP.FLAGMANUAL( :IN_NOAGENDA, :IN_PETUGASCATAT, :P_UNITUP, :NOMOR_TIKET, :IN_TERIMA_DARI, :IN_TGL_TERIMA, :IN_PERIHAL, :IN_NO_BA, :OUT_MESSAGE); END;');

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':IN_NOAGENDA', $noagenda) or die('Error binding string1');
        oci_bind_by_name($stid, ':IN_PETUGASCATAT', $user) or die('Error binding string2');
        oci_bind_by_name($stid, ':P_UNITUP', $unit) or die('Error binding string3');
        oci_bind_by_name($stid, ':NOMOR_TIKET', $tiket) or die('Error binding string4');
        oci_bind_by_name($stid, ':IN_TERIMA_DARI', $permintaan) or die('Error binding string5');
        oci_bind_by_name($stid, ':IN_TGL_TERIMA', $tglpermintaan) or die('Error binding string6');
        oci_bind_by_name($stid, ':IN_PERIHAL', $perihal) or die('Error binding string7');
        oci_bind_by_name($stid, ':IN_NO_BA', $noba) or die('Error binding string8');
        oci_bind_by_name($stid, ':OUT_MESSAGE', $msg_out,100, SQLT_CHR) or die('Error binding string9');

        if(oci_execute($stid)){
          $results = $msg_out;
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
  } 

  function save_batal($save) {        
        $results = '';
        $this->pblmig_db = $this->load->database('pblmig', true);
        
        if (!$this->pblmig_db) {
          $m = oci_error();
          trigger_error(htmlentities($m['message']), E_USER_ERROR);
        }

        $P_UNITUP = $save['unitup'];           
        $IN_NOTUL603 = $save['notul'];  
        $IN_IDPEL = $save['idpel'];  
        $IN_TGLBONGKAR = $save['tglbongkar'];
        $IN_PETUGASCATAT = $save['user'];           
        $NOMOR_TIKET = $save['tiket'];  
        $IN_TERIMA_DARI = $save['permintaan'];  
        $IN_TGL_TERIMA = $save['tglpermintaan'];  
        $IN_PERIHAL = $save['perihal'];  
        $IN_NO_BA = $save['noba'];  
        $OUT_MESSAGE = '';

        $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN OPHARAPP.PKG_CARIEXLAP.BATAL_EXLAP ( :P_UNITUP, :IN_NOTUL603, :IN_IDPEL, :IN_TGLBONGKAR, :IN_PETUGASCATAT, :NOMOR_TIKET, :IN_TERIMA_DARI, :IN_TGL_TERIMA, :IN_PERIHAL, :IN_NO_BA, :OUT_MESSAGE ); END;');

        //Send parameters variable  value  lenght
        oci_bind_by_name($stid, ':P_UNITUP', $P_UNITUP) or die('Error binding string1');
        oci_bind_by_name($stid, ':IN_NOTUL603', $IN_NOTUL603) or die('Error binding string2');
        oci_bind_by_name($stid, ':IN_IDPEL', $IN_IDPEL) or die('Error binding string3');
        oci_bind_by_name($stid, ':IN_TGLBONGKAR', $IN_TGLBONGKAR) or die('Error binding string4');
        oci_bind_by_name($stid, ':IN_PETUGASCATAT', $IN_PETUGASCATAT) or die('Error binding string5');
        oci_bind_by_name($stid, ':NOMOR_TIKET', $NOMOR_TIKET) or die('Error binding string6');
        oci_bind_by_name($stid, ':IN_TERIMA_DARI', $IN_TERIMA_DARI) or die('Error binding string7');
        oci_bind_by_name($stid, ':IN_TGL_TERIMA', $IN_TGL_TERIMA) or die('Error binding string8');
        oci_bind_by_name($stid, ':IN_PERIHAL', $IN_PERIHAL) or die('Error binding string9');
        oci_bind_by_name($stid, ':IN_NO_BA', $IN_NO_BA) or die('Error binding string10');
        oci_bind_by_name($stid, ':OUT_MESSAGE', $OUT_MESSAGE,100, SQLT_CHR) or die('Error binding string11');

        if(oci_execute($stid)){
          $results = $OUT_MESSAGE;
        }else{
          $e = oci_error($stid);
          $results =  $e['message'];
        } 
        oci_free_statement($stid);
        oci_close($this->pblmig_db->conn_id);

        return $results;
  } 
  //batal restitusi
  function save_data_nontaglis2($save) {        
  $results = '';
  $this->pblmig_db = $this->load->database('pblmig', true);

  if (!$this->pblmig_db) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
  }

  $noagenda = $save['noagenda'];           
  $user = $save['user'];  
  $unit = $save['unit']; 
  $alasan = $save['keterangan']; 
  $tiket = $save['tiket'];
  $permintaan = $save['permintaan'];           
  $tglpermintaan = $save['tglpermintaan'];  
  $perihal = $save['perihal'];  
  $noba = $save['noba'];
  $msg_out = '';

  $stid = oci_parse($this->pblmig_db->conn_id, 'BEGIN OPHARAPP.PKG_BATAL_RESTITUSI.BATAL_RESTITUSI( :IN_NOAGENDA, :IN_PETUGASCATAT, :P_UNITUP, :IN_ALASAN, :NOMOR_TIKET, :IN_TERIMA_DARI, :IN_TGL_TERIMA, :IN_PERIHAL, :IN_NO_BA, :OUT_MESSAGE); END;');

        //Send parameters variable  value  lenght
  oci_bind_by_name($stid, ':IN_NOAGENDA', $noagenda) or die('Error binding string1');
  oci_bind_by_name($stid, ':IN_PETUGASCATAT', $user) or die('Error binding string2');
  oci_bind_by_name($stid, ':P_UNITUP', $unit) or die('Error binding string3');
  oci_bind_by_name($stid, ':IN_ALASAN', $keterangan) or die('Error binding string4');
  oci_bind_by_name($stid, ':NOMOR_TIKET', $tiket) or die('Error binding string5');
  oci_bind_by_name($stid, ':IN_TERIMA_DARI', $permintaan) or die('Error binding string6');
  oci_bind_by_name($stid, ':IN_TGL_TERIMA', $tglpermintaan) or die('Error binding string7');
  oci_bind_by_name($stid, ':IN_PERIHAL', $perihal) or die('Error binding string8');
  oci_bind_by_name($stid, ':IN_NO_BA', $noba) or die('Error binding string9');
  oci_bind_by_name($stid, ':OUT_MESSAGE', $msg_out,100, SQLT_CHR) or die('Error binding string10');

  if(oci_execute($stid)){
    $results = $msg_out;
  }else{
    $e = oci_error($stid);
    $results =  $e['message'];
  } 
  oci_free_statement($stid);
  oci_close($this->pblmig_db->conn_id);

  return $results;
} 
  /*end ==>*/    
}