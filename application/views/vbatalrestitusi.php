<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pelunasan Nontaglis</title>
	<link rel="icon" type="image/ico" href="<?php echo base_url();?>assets/easyui/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/demo/demo.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>
</head>
<body class="easyui-layout">

	<!-- form info agenda -->

            <div title="Pembatalan Restitusi" style="padding:10px;background:#e1e6f9" >
	            <div style="padding: 0 5px 5px 5px">
	            <div class="easyui-panel" title="Pembatalan Restitusi" style="width:98%;padding: 10px 13px 10px 10px">	
					<form action="" method="post" id="form1">	
						<fieldset style="border:0.5px solid #95b8e7;width:98%;margin: 0 0 0 0;padding:5px 10px 10px 10px" >
						<legend style="color:#39516d;font-weight: bold;">Input Data</legend>
							<table b width="100%">	
								<tr>
									<td width="10%" style="padding:0 0 0 5px"><b>No Agenda:</b></td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inNoAgenda" id="inNoAgenda" data-options="required:true,prompt:'Masukan No Agenda...'" style="width:100%;height:26px;"></input>
									</td>
									<td width="7%">
									<td width="10%" style="padding:0 0 0 5px"><b>No Tiket:</b></td>
									</td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inNoTiket" id="inNoTiket" data-options="required:false,prompt:'Masukan No Tiket...',validType:'maxLength[15]'" style="width:100%;height:26px;"></input>	
										<input value="<?php echo $this->session->userdata('id_user');?>" type="hidden" name="inUser" id="inUser" data-options="required:false,readonly:true" style="width:100%;"></input>
									</td>
									<td width="7%">
									</td>
									<td width="7%">
									</td>
									<td width="7%">
									</td>
									<td width="15%">
									</td>
								</tr>
								<tr>
									<td width="10%" style="padding:0 0 0 5px"><b>Permintaan Dari:</b></td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inPermintaan" id="inPermintaan" data-options="required:false,prompt:'Masukan Permintaan...'" style="width:100%;height:26px;"></input>
									</td>
									</td>
									<td width="7%">
									<td width="10%" style="padding:0 0 0 5px"><b>Tanggal Permintaan:</b></td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inTglPermintaan" id="inTglPermintaan" data-options="required:false,prompt:'YYYYMMDD',validType:'Length[8]'" style="width:100%;height:26px;"></input>	
									</td>
									<td width="7%"></td>
									<td width="7%"></td>
									<td width="7%"></td>
									<td width="7%"></td>
									<td width="15%">
									</td>
								</tr>
								<tr>
									<td width="10%" style="padding:0 0 0 5px"><b>Perihal:</b></td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inPerihal" id="inPerihal" data-options="required:false,prompt:'Masukan Perihal...'" style="width:100%;height:26px;"></input>
									</td>
									<td width="7%">
									<td width="10%" style="padding:0 0 0 5px"><b>No BA:</b></td>
									</td>
									<td width="15%"> 
										<input class="easyui-textbox" type="text" name="inNoBA" id="inNoBA" data-options="required:false,prompt:'Masukan No BA...'" style="width:100%;height:26px;"></input>	
									</td>
									<td width="7%">
										<a href="" class="easyui-linkbutton" data-options="iconCls:'icon-search'" style="float:lefts;width:100%;height:26px;" id="bcari" onclick="button()">CARI</a>
									</td>
									<td width="7%">
										<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload'" style="float:lefts;width:100%;height:26px;" id="breset" onclick="window.location.reload()" disabled>RESET</a>
									</td>
									<td width="7%">
										<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="float:lefts;width:100%;height:26px;" id="bsimpan" onclick="" disabled>BATALKAN</a>
									</td>
									<td width="7%">
									</td>
									<td width="15%">
									</td>
								</tr>
							</table>
						</fieldset>
						<fieldset style="border:0.5px solid #95b8e7;width:98%;margin: 15px 0 15px 0;padding:15px 10px 10px 10px" >
							<legend style="color:#39516d;font-weight: bold;">Info Pelanggan</legend>
							<table width="100%">
								<tr>
									<td width="15%">Unit UP</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inUnitUp" id="inUnitUp" data-options="required:false,readonly:true" style="width:40%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Jenis Transasksi</td>
									<td width="40%" colspan="2"><input class="easyui-textbox" type="text" name="injenis" id="injenis" data-options="required:false,readonly:true" style="width:40%;"></input></td>					
								</tr>
								<tr>
									<td width="15%">Id Pelanggan</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inIdPelanggan" id="inIdPelanggan" data-options="required:false,readonly:true" style="width:50%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Tanggal Permohonan</td>
									<td width="40%" colspan="2"><input class="easyui-textbox" type="text" name="inTanggalAgenda" id="inTanggalAgenda" data-options="required:false,readonly:true" style="width:40%;"></input></td>					
								</tr>
								<tr>
									<td width="15%">Nama Pelanggan</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inNamaPelanggan" id="inNamaPelanggan" data-options="required:false,readonly:true" style="width:80%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Asal Mohon</td>
									<td width="40%" colspan="2"><input class="easyui-textbox" type="text" name="inAsalMohon" id="inAsalMohon" data-options="required:false,readonly:true" style="width:40%;"></input></td>					
									
									
								</tr>
								<tr>
									<td width="15%" rowspan="2">Alamat Pelanggan</td>
									<td width="25%" rowspan="2"><textarea class="easyui-textbox" type="text" rows="2" cols="42" value="" name="inAlamat" id="inAlamat" data-options="required:false,readonly:true,multiline:true" style="width:90%;height:50px"></textarea></td>
									<td width="5%"></td>
									<td width="15%">Tarif </td>
									<td width="20%"><input class="easyui-textbox" type="text" name="inTarifLama" id="inTarifLama" data-options="required:false,readonly:true" style="width:100%;"></input></td>				
									<td width="20%"><input class="easyui-textbox" type="text" name="inTarifBaru" id="inTarifBaru" data-options="required:false,readonly:true" style="width:90%;"></input></td>
								</tr>	
								<tr>
									<td></td>
									<td width="15%">Daya </td>
									<td width="20%"><input class="easyui-textbox" type="text" name="inDayaLama" id="inDayaLama" data-options="required:false,readonly:true" style="width:100%;"></input></td>					
									<td width="20%"><input class="easyui-textbox" type="text" name="inDayaBaru" id="inDayaBaru" data-options="required:false,readonly:true" style="width:90%;"></input></td>
								</tr>
								<tr>
									<td width="15%">Telpon/Hp</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inHp" id="inHp" data-options="required:false,readonly:true,multiline:true" style="width:90%;height:40px;"></input></td>
									<td width="5%"></td>
									<td width="15%">Paket SAR </td>
									<td colspan="2"><input class="easyui-textbox" type="text" name="inPaketSar" id="inPaketSar" data-options="required:false,readonly:true,multiline:true" style="width:55%;height:40px"></input></td>					
								</tr>
								<tr>
									<td width="15%">Nama Pemohon</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inNamaPemohon" id="inNamaPemohon" data-options="required:false,readonly:true" style="width:80%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Kode Paket SAR</td>
									<td colspan="2"><input class="easyui-textbox" type="text" name="inKodePaketSar" id="inKodePaketSar" data-options="required:false,readonly:true" style="width:30%;"></input></td>					
								</tr>
								<tr>
									<td width="15%">No SIP</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inNoSip" id="inNoSip" data-options="required:false,readonly:true" style="width:50%;"></input></td>
									<td width="5%"></td>
									<td width="15%">No Kolektif </td>
									<td colspan="2"><input class="easyui-textbox" type="text" name="inNoKolektif" id="inNoKolektif" data-options="required:false,readonly:true" style="width:30%;"></input></td>	
								</tr>
								<tr>
									<td width="15%">Alamat Pemohon</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inAlamatPemohon" id="inAlamatPemohon" data-options="required:false,readonly:true,multiline:true" style="width:90%;height:60px"></input></td>
									<td width="5%"></td>
									<td width="15%">Alasan Keputusan </td>
									<td colspan="2"><textarea class="easyui-textbox" type="text" rows="2" cols="42" name="inAlasanKeputusan" id="inAlasanKeputusan" data-options="required:false,readonly:true,multiline:true" style="width:50%;height:60px"></textarea></td>
								</tr>
								<tr>
									<td width="15%">Kode Keputusan</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inKodeKeputusan" id="inKodeKeputusan" data-options="required:false,readonly:true" style="width:50%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Bank/No.Rekening </td>
									<td width="20%"><input class="easyui-textbox" type="text" name="inBank" id="inBank" data-options="required:false,readonly:true" style="width:100%;"></input></td>					
									<td width="20%"><input class="easyui-textbox" type="text" name="inNorek" id="inNorek" data-options="required:false,readonly:true" style="width:80%;float:left"></input></td>					
								
								</tr>
								<tr>
									<td width="15%">Jatuh Tempo</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inJatuhTempo" id="inJatuhTempo" data-options="required:false,readonly:true" style="width:50%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Nama Di Rekening </td>
									<td colspan="2"><input class="easyui-textbox" type="text" name="inNamaRek" id="inNamaRek" data-options="required:false,readonly:true" style="width:40%;"></input></td>					
								</tr>
								<tr>
									<td width="15%">UJL Realisasi</td>
									<td width="25%"><input class="easyui-textbox" type="text" name="inUJL" id="inUJL" data-options="required:false,readonly:true" style="width:50%;"></input></td>
									<td width="5%"></td>
									<td width="15%">Keperluan</td>
									<td colspan="2"><input class="easyui-textbox" type="text" name="inKeperluan" id="inKeperluan" data-options="required:false,readonly:true" style="width:40%;"></input></td>					
								</tr>				
							</table>
						</fieldset>
						<table style="border:0.5px solid #95b8e7;float:left;width:100%;margin: 0 0 15px 0;padding:5px 5px 5px 5px" >
							<tr>
								<td>
									<table style="float:left;width:50%;">
										<tr>				
											<td colspan="2" align="center">
												<table id="dg2" title="Data Biaya" style="width:100%;height:150px" data-options="
															singleSelect:true,
															autoRowHeight:false,
															pagination:false,
															pageSize:10">
													<thead>
														<tr>	                    												
															<th field="NMPIUTANG" width="40%" align="center">NMPIUTANG</th>
															<th field="RPBIAYA" width="40%" align="center">RPBIAYA</th>																	
														</tr>
													</thead>
												</table>	
											</td>										
										</tr>								
									</table>
									<table style="float:left;width:50%">
										<tr>
											<td colspan="2" align="center">
												<table id="dg" title="Data Flow" style="width:100%;height:150px" data-options="
															singleSelect:true,												
															autoRowHeight:false,
															pagination:false,
															pageSize:10">
													<thead>
														<tr>	                    												
															<th field="KETERANGAN" width="40%" align="center">KETERANGAN</th>
															<th field="TANGGAL" width="40%" align="center">TANGGAL</th>																		
														</tr>
													</thead>
												</table>						
												
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</form>
                </div>		       
	            </div>
	            <!-- </div> -->   					
            </div>	    
	
	<!-- script menampilkan datagrid -->
	<script>
		//Tiket length
		$.extend($.fn.validatebox.defaults.rules, {
		    maxLength: {
		        validator: function(value, param){
		            return value.length <= param[0];
		        },
		        message: 'Tidak boleh lebih dari {0} karakter.'
		    }
		});

		$.extend($.fn.validatebox.defaults.rules, {
		    Length: {
		        validator: function(value, param){
		            return value.length == param[0];
		        },
		        message: 'Harus {0} karakter.'
		    }
		});

		(function($){
			function pagerFilter(data){
				if ($.isArray(data)){	// is array
					data = {
						total: data.length,
						rows: data
					}
				}
				var dg = $(this);
				var state = dg.data('datagrid');
				var opts = dg.datagrid('options');
				if (!state.allRows){
					state.allRows = (data.rows);
				}
				var start = (opts.pageNumber-1)*parseInt(opts.pageSize);
				var end = start + parseInt(opts.pageSize);
				data.rows = $.extend(true,[],state.allRows.slice(start, end));
				return data;
			}

			var loadDataMethod = $.fn.datagrid.methods.loadData;
			$.extend($.fn.datagrid.methods, {
				clientPaging: function(jq){
					return jq.each(function(){
						var dg = $(this);
                        var state = dg.data('datagrid');
                        var opts = state.options;
                        opts.loadFilter = pagerFilter;
                        var onBeforeLoad = opts.onBeforeLoad;
                        opts.onBeforeLoad = function(param){
                            state.allRows = null;
                            return onBeforeLoad.call(this, param);
                        }
						dg.datagrid('getPager').pagination({
							onSelectPage:function(pageNum, pageSize){
								opts.pageNumber = pageNum;
								opts.pageSize = pageSize;
								$(this).pagination('refresh',{
									pageNumber:pageNum,
									pageSize:pageSize
								});
								dg.datagrid('loadData',state.allRows);
							}
						});
                        $(this).datagrid('loadData', state.data);
                        if (opts.url){
                        	$(this).datagrid('reload');
                        }
					});
				},
                loadData: function(jq, data){
                    jq.each(function(){
                        $(this).data('datagrid').allRows = null;
                    });
                    return loadDataMethod.call($.fn.datagrid.methods, jq, data);
                },
                getAllRows: function(jq){
                	return jq.data('datagrid').allRows;
                }
			});						
		})(jQuery);

		function getData(){
			var rows = [];


				var KETERANGAN = '';
				var TANGGAL = '';


				rows.push({
					KETERANGAN:KETERANGAN,
					TANGGAL:TANGGAL				
				});


			return rows;	
		}
		
		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg2').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg3').datagrid({data:getData()}).datagrid('clientPaging');
		});

		function addTab(title){				
            if ($('#tt').tabs('exists', title)){
                $('#tt').tabs('select', title);
            } 
        }

        $(document).ready(function(){
		  $("#bcari").click(function(){
			// if($("#inNoAgenda").val().length>3){
			var noagenda = $('#inNoAgenda').val();
			var notiket = $('#inNoTiket').val();

			if(noagenda==''){
				$.messager.alert('Informasi','NO AGENDA Tidak Boleh Kosong','info');
			}else {
				$.ajax({
					type: "post",
					url: "<?php echo site_url('home/getdata') ?>",
					cache: false,				
					data:'inNoAgenda='+$("#inNoAgenda").val(),
					success: function(response){
							var obj = JSON.parse(response);
							if (obj.dataagenda=="Data Tidak Ditemukan") {
								var hasil = obj.dataagenda;
								$.messager.alert('Informasi',hasil,'info');
							} else {
								$('#inUnitUp').textbox('setValue', obj.dataagenda[0].UNITUP);
								$('#injenis').textbox('setValue', obj.dataagenda[0].JENIS_TRANSAKSI);
								$('#inIdPelanggan').textbox('setValue', obj.dataagenda[0].IDPEL);
								$('#inTanggalAgenda').textbox('setValue', obj.dataagenda[0].TGLPERMOHONAN);
								$('#inNamaPelanggan').textbox('setValue', obj.dataagenda[0].NAMA);
								$('#inAsalMohon').textbox('setValue', obj.dataagenda[0].ASALMOHON);
								$('#inAlamat').textbox('setValue', obj.dataagenda[0].ALAMAT);
								$('#inTarifLama').textbox('setValue', obj.dataagenda[0].TARIF_LAMA);
								$('#inTarifBaru').textbox('setValue', obj.dataagenda[0].TARIF);
								$('#inDayaLama').textbox('setValue', obj.dataagenda[0].DAYA_LAMA);
								$('#inDayaBaru').textbox('setValue', obj.dataagenda[0].DAYA);
								$('#inHp').textbox('setValue', obj.dataagenda[0].TELP_HP);
								$('#inPaketSar').textbox('setValue', obj.dataagenda[0].PAKETSAR);
								$('#inNamaPemohon').textbox('setValue', obj.dataagenda[0].NAMA_PEMOHON);
								$('#inKodePaketSar').textbox('setValue', obj.dataagenda[0].KD_PAKET_SAR);
								$('#inNoSip').textbox('setValue', obj.dataagenda[0].NO_SIP);
								$('#inNoKolektif').textbox('setValue', obj.dataagenda[0].NOKOLEKTIF);
								$('#inAlamatPemohon').textbox('setValue', obj.dataagenda[0].ALAMAT_PEMOHON);
								$('#inAlasanKeputusan').textbox('setValue', obj.dataagenda[0].ALASAN_KEPUTUSAN);
								$('#inKodeKeputusan').textbox('setValue', obj.dataagenda[0].KD_KEPUTUSAN);
								$('#inBank').textbox('setValue', obj.dataagenda[0].NAMABANK);
								$('#inNorek').textbox('setValue', obj.dataagenda[0].NOREKENING);
								$('#inJatuhTempo').textbox('setValue', obj.dataagenda[0].TGLJTTEMPO);
								$('#inNamaRek').textbox('setValue', obj.dataagenda[0].NAMADIREKENING);
								$('#inUJL').textbox('setValue', obj.dataagenda[0].UJLREAL);
								$('#inKeperluan').textbox('setValue', obj.dataagenda[0].KEPERLUAN);

								var rows = [];
								var rows2 = [];

								for (var i = 0; i < obj.dataagenda2.length; i++) {
									var KETERANGAN = obj.dataagenda2[i].KETERANGAN;
									var TANGGAL = obj.dataagenda2[i].TANGGAL;
									console.log(KETERANGAN);

									rows.push({
										KETERANGAN:KETERANGAN,
										TANGGAL:TANGGAL				
									});
								};

								for (var i = 0; i < obj.dataagenda3.length; i++) {
									var NMPIUTANG = obj.dataagenda3[i].NMPIUTANG;
									var RPBIAYA = obj.dataagenda3[i].RPBIAYA;
									console.log(NMPIUTANG);

									rows2.push({
										NMPIUTANG:NMPIUTANG,
										RPBIAYA:RPBIAYA				
									});
								};

								$('#dg').datagrid({data:rows}).datagrid('clientPaging');
								$('#dg2').datagrid({data:rows2}).datagrid('clientPaging');

								console.log(obj);
							};
					}
				});
				
				$('#bcari').linkbutton('disable');
		      	$('#breset').linkbutton('enable');
				$('#bsimpan').linkbutton('enable');
				$('#inNoAgenda').textbox('readonly',true);
			};
			return false;
		  });
		});		


	function button(){
		
    }

   //  function simpan(){
   //  	var notiket = $('#inNoTiket').val();
   //  	var permintaan = $('#inPermintaan').val();
   //  	var tglpermintaan = $('#inTglPermintaan').val();
   //  	var perihal = $('#inPerihal').val();
   //  	var noba = $('#inNoBA').val();
   //  	if (notiket=='') {
   //  		$.messager.alert('Informasi','Harap Isi No Tiket','info');
   //  	} else if(permintaan==''){
   //  		$.messager.alert('Informasi','Harap Isi Permintaan Dari Mana','info');
   //  	} else if(tglpermintaan==''){
   //  		$.messager.alert('Informasi','Harap Isi Tanggal Permintaan','info');
   //  	} else if(perihal==''){
   //  		$.messager.alert('Informasi','Harap Isi Perihal','info');
   //  	} else if(noba==''){
   //  		$.messager.alert('Informasi','Harap Isi Nomer BA','info');
   //  	} else {
   //  		$.ajax({
			// 	type: "post",
			// 	url: "<?php echo site_url('home/save') ?>",
			// 	cache: false,				
			// 	data:$('#form1').serialize(),
			// 	success: function(response){
			// 			var obj = JSON.parse(response);
			// 			var hasil = obj.hasil;
			// 			$.messager.alert('Informasi',hasil,'info');
			// 			console.log(obj);
			// 	}
			// });
   //  	};
   //  }

	</script>	
</body>
</html>