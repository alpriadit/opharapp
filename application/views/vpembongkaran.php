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
	
	<!-- form Pelaksanaan Pembongkaran -->     
            <div region="center" border="false" border="false">
        <div class="easyui-tabs" fit="true" id="tt">   
            <div title="Batal Ekslap" style="padding:10px;">
                <div class="easyui-panel" title="Pembatalan Ekslap" style="width:98%;padding: 5px 13px 5px 5px">	
						<form action="" method="post" id="form1">	
							<fieldset style="border:0.5px solid #95b8e7;width:98.5%;margin: 5px 5px 0 3px;padding:5px 5px 5px 5px" >
								<table width="100%">	
									<tr>
										<td width="15%" style="padding:0 0 0 5px"><b>ID Pelanggan:</b></td>
										<td width="15%"> 
											<input class="easyui-textbox" type="text" name="inIdPel2" id="inIdPel2" data-options="required:true,prompt:'Masukan ID Pel...',validType:'Length[12]'" style="width:100%;height:26px;"></input>
										</td>
										<td width="8%">
											<input type="hidden" name="inUnitup" id="inUnitup" data-options="required:false" style="width:100%;height:26px;" value="<?php echo $param; ?>"></input>
										</td>
										<td width="8%">
											<input type="hidden" name="inUser" id="inUser" data-options="required:false" style="width:100%;height:26px;" value="<?php echo $this->session->userdata('id_user');?>"></input>
										</td>
										<td width="54%"></td>
									</tr>
									<tr>
										<td width="10%" style="padding:0 0 0 5px"><b>Tanggal Bongkar:</b></td>
										<td width="15%"> 
											<input class="easyui-textbox" type="text" name="tglbongkar" id="tglbongkar" data-options="required:true,prompt:'YYYYMMDD',validType:'Length[8]'" style="width:100%;height:26px;"></input>	
										</td>
									</tr>
									<tr>
										<td width="10%" style="padding:0 0 0 5px"><b>Masukkan NO_603:</b></td>
										<td width="15%"> 
											<input class="easyui-textbox" type="text" name="inNotul" id="inNotul" data-options="required:true,prompt:'Masukan NO_603...'," style="width:100%;height:26px;"></input>	
										</td>
										<td>
											<a href="" class="easyui-linkbutton" data-options="iconCls:'icon-reload'" style="float:lefts;width:100%;height:26px;" id="bload" >Load Data</a>
										</td>	
										<td>
											<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-reload'" style="float:lefts;width:90%;height:26px;" id="breload" onclick="window.location.reload()" disabled>Reset</a>
										</td>							
									</tr>
								</table>
							</fieldset>
								<table style="float:left;width:100%;margin: 10px 0 15px 0;">
									<tr>				
										<td colspan="6" align="center">
											<table id="dg" title="Data Pelanggan Tul VI-03" style="width:100%;height:150px" data-options="
														
														singleSelect:true,
														autoRowHeight:false,
														pagination:false,
														pageSize:10">
												<thead>
													<tr>	   
													    <th field="UNITUP" width="10%" align="center">UNITUP</th>
														<th field="TGL_TUL603" width="10%" align="center">TGL_TUL603</th>
														<th field="NO_TUL603" width="10%" align="center">NO_TUL603</th>		
														<th field="IDPELANGGAN" width="10%" align="center">IDPELANGGAN</th>
														<th field="NAMA" width="20%" align="center">NAMA</th>	
														<th field="ALAMAT" width="25%" align="center">ALAMAT</th>
														<th field="THBLREK_AWAL" width="10%" align="center">THBLREK_AWAL</th>	
														<th field="THBLREK_AKHIR" width="10%" align="center">THBLREK_AKHIR</th>
														<th field="LEMBAR_603" width="5%" align="center">LEMBAR_603</th>

													</tr>
												</thead>
									 		</table>	
										</td>
									</tr>
									<tr>
										<td width="15%" style="padding:10px 0 0 10px"> 
											<b>No Tiket:</b>
										</td>
										<td width="30%" style="padding:10px 0 0 0">
											<input class="easyui-textbox" type="text" name="inNoTiket" id="inNoTiket" data-options="required:false,readonly:true,prompt:'Masukan No Tiket...',validType:'maxLength[15]'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:10px 0 0 10px"> 
											<b>Permintaan Dari:</b>
										</td>
										<td width="30%" style="padding:10px 0 0 0">
											<input class="easyui-textbox" type="text" name="inPermintaan" id="inPermintaan" data-options="required:false,readonly:true,prompt:'Masukan Permintaan...'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:10px 0 0 0">
													<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-save'" style="float:LEFT;width:100%;height:26px;" id="bsimpan2" onclick="simpan2()" disabled>Simpan</a>
										
										</td>
										<td width="15%" style="padding:10px 0 0 0">
										</td>
									</tr>
									<tr>
										<td width="15%" style="padding:0 0 0 10px"> 
											<b>Tanggal Permintaan:</b>
										</td>
										<td width="30%" style="padding:0 0 0 0">
											<input class="easyui-textbox" type="text" name="inTglPermintaan" id="inTglPermintaan" data-options="required:false,readonly:true,prompt:'YYYYMMDD',validType:'Length[8]'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:0 0 0 10px"> 
											<b>Perihal:</b>
										</td>
										<td width="30%" style="padding:0 0 0 0">
											<input class="easyui-textbox" type="text" name="inPerihal" id="inPerihal" data-options="required:false,readonly:true,prompt:'Masukan Perihal...'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:0 0 0 0">
											
										</td>
										<td width="15%" style="padding:0 0 0 0">
										</td>
									</tr>
									<tr>
										<td width="15%" style="padding:0 0 0 10px"> 
											<b>No BA:</b>
										</td>
										<td width="30%" style="padding:0 0 0 0">
											<input class="easyui-textbox" type="text" name="inNoBA" id="inNoBA" data-options="required:false,readonly:true,prompt:'Masukan No BA...',validType:'maxLength[15]'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:0 0 0 10px"> 
										<b> Unitup :</b>
										</td>
										<td width="30%" style="padding:0 0 0 0">
										<input class="easyui-textbox" type="text" name="inGetUnitup" id="inGetUnitup" data-options="required:inGetUnitup,readonly:true,prompt:'Automatic fill Data Unitup',validType:'maxLength[15]'" style="width:80%;height:26px;"></input>	
										</td>
										<td width="15%" style="padding:0 0 0 0">
										</td>
										<td width="15%" style="padding:0 0 0 0">
										</td>
									</tr>
								</table>
							</form>
	            </div>
            </div>    								
        </div>
    </div>
	
	<!-- script menampilkan datagrid -->



	<script>
		
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
			rows.push({});
			return rows;	
		}
		
		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
		});

		$(document).ready(function(){
		  $("#bload").click(function(){
			// if($("#inNoAgenda").val().length>3){
			var idpel = $('#inIdPel2').val();
			var tglbongkar = $('#tglbongkar').val();
			var notul = $('#inNotul').val();

			if (idpel!=='' && tglbongkar!=='' && notul!=='') {
				$.ajax({
					type: "post",
					url: "<?php echo site_url('home/getekslap') ?>",
					cache: false,			
					data:$('#form1').serialize(),
					success: function(response){
							var obj = JSON.parse(response);
							if (obj.dataekslap=="Data Tidak Ditemukan") {
								var hasil = obj.dataekslap;
								$.messager.alert('Informasi',hasil,'info');
							} else {
								$('#inGetUnitup').textbox('setValue', obj.dataekslap[0].UNITUP);



								var rows = [];
								for (var i = 0; i < obj.dataekslap.length; i++) 

								{ 
									var TGL_TUL603 = obj.dataekslap[i].TGL_TUL603;
									var UNITUP = obj.dataekslap[i].UNITUP;
									var NO_TUL603 = obj.dataekslap[i].NO_TUL603;
									var IDPELANGGAN = obj.dataekslap[i].IDPELANGGAN;
									var NAMA = obj.dataekslap[i].NAMA;
									var ALAMAT = obj.dataekslap[i].ALAMAT;
									var THBLREK_AWAL = obj.dataekslap[i].THBLREK_AWAL;
									var THBLREK_AKHIR = obj.dataekslap[i].THBLREK_AKHIR;
									var LEMBAR_603 = obj.dataekslap[i].LEMBAR_603;

									rows.push({
										TGL_TUL603:TGL_TUL603,
										NO_TUL603:NO_TUL603,
										UNITUP:UNITUP,
										IDPELANGGAN:IDPELANGGAN,
										NAMA:NAMA,
										ALAMAT:ALAMAT,
										THBLREK_AWAL:THBLREK_AWAL,
										THBLREK_AKHIR:THBLREK_AKHIR,
										LEMBAR_603:LEMBAR_603				
									});

								};
								

								$('#dg').datagrid({data:rows}).datagrid('clientPaging');

								console.log(obj);
							};
					}
				});
				$('#bload').linkbutton('disable');
				$('#bsimpan2').linkbutton('enable');
		      	$('#bloadlog').linkbutton('enable');
		      	$('#breload').linkbutton('enable');
		      	$('#inIdPel2').textbox('readonly',true);
		      	$('#tglbongkar').textbox('readonly',true);
		      	$('#inNotul').textbox('readonly',true);
		      	$('#inNoTiket').textbox('readonly',false);
		      	$('#inPermintaan').textbox('readonly',false);
		      	$('#inTglPermintaan').textbox('readonly',false);
		      	$('#inPerihal').textbox('readonly',false);
		      	$('#inNoBA').textbox('readonly',false);

			} else {
				$.messager.alert('Informasi','Tidak Boleh Kosong','info');
			};
			return false;
		  });
		});
        
		function simpan2(){
	    	var notiket = $('#inNoTiket').val();
	    	var permintaan = $('#inPermintaan').val();
	    	var tglpermintaan = $('#inTglPermintaan').val();
	    	var perihal = $('#inPerihal').val();
	    	var noba = $('#inNoBA').val();
	    
	    	if (notiket=='') {
	    	$.messager.alert('Informasi','Harap Isi No Tiket','info');
	    	} if(permintaan==''){
    		$.messager.alert('Informasi','Harap Isi Permintaan Dari Mana','info');
    	    } else if(tglpermintaan==''){
    		$.messager.alert('Informasi','Harap Isi Tanggal Permintaan','info');
    	    } else if(perihal==''){
    		$.messager.alert('Informasi','Harap Isi Perihal','info');
    	    } else if(noba==''){
    		$.messager.alert('Informasi','Harap Isi Noba','info');
    	    } else {
	    		$.ajax({
					type: "post",
					url: "<?php echo site_url('home/savebatal') ?>",
					cache: false,				
					data:$('#form1').serialize(),
					success: function(response){
							var obj = JSON.parse(response);
							var hasil = obj.hasil;
							$.messager.alert('Informasi',hasil,'info');
							console.log(obj);
					}
				});
	    	};
	    }



	</script>	
</body>
</html>

