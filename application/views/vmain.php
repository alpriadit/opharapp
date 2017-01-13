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
	<style type="text/css">
		a:link {color:#000000; text-decoration:none; }
		a:visited {color:#000000; text-decoration:none;}
		a:hover {color:#000000; text-decoration:none;}
		a:active {color:#000000; text-decoration:none;}
	</style>

</head>
<body class="easyui-layout">
	<div data-options="region:'north',border:false" style="height:50px;background:#00008B;padding:1px 1px 1px 10px">
		<table style="width:100%;height:100%">
			<tr>
				<td><b style="font-size:14px; color:white;">Selamat Datang : <?php echo $this->session->userdata('nama_user');?>, UNIT UP: <?php echo $this->session->userdata('unit_up');?></b></td>
				<td><a href="<?php echo base_url('auth/logout');?>" class="easyui-linkbutton" style="width:80px; float:right;">Log Out</a></td>
				<td></td>
			</tr>
		</table>
	</div>

	<div data-options="region:'west',split:true,title:'Menu'" style="width:250px;height:100%;padding:5px;">
		<ul class="easyui-tree" data-options="animate:true">

			<?php
				$KategoriMenu='';
				//display($ListMenu,1);
				foreach($ListMenu as $row){
					if ($KategoriMenu !=$row['MENUNAME']){
						if ($KategoriMenu !=''){?>
							</ul>
						</li>
				  <?php }?>
						<li data-options="state:'closed'">
							<span><?php echo $row['MENUNAME'] ;?></span>
							<ul>
					<?php $KategoriMenu = $row['MENUNAME'];
					} ?>
							<?php
							if ('Manajemen User'==$row['CHILDMENUNAME']){?>
								<li><a href="<?php echo site_url($row['CHILDLINK']) ?>"><?php echo $row['CHILDMENUNAME'] ;?></a></li>
							<?php } else {?>
								<li><a 		<?php
												if($row['CHILDLINK'] == 'javascript:;'){
											?>
 												href="javascript:;"  uri="<?=$row['URI'];?>" class="<?=$row['ATTR'];?>"
											<?php
												}else{
											?>
												href="#" onclick="addTab('<?php echo $row['CHILDMENUNAME'] ;?>','<?php echo site_url($row['CHILDLINK']) ?>')"
											<?php
												}
											?>
											><?php echo $row['CHILDMENUNAME'] ;?></a></li>
							<?php }?>
		  <?php }?>
			</li>
		</ul>
	</div>

	<div region="center" border="false">
        <div class="easyui-tabs" fit="false" id="tt" style="height:900px">
            <div title="Dashboard" style="padding:10px;">
				<div class="easyui-panel" title="Dashboard" style="width:100%;height:100%">
	            	<div style="padding:10px 15px 15px 15px">
	            	Selamat Datang <?php echo $this->session->userdata('nama_user');?>

	                </div>
	            </div>
            </div>
        </div>
    </div>

	<script>
		jQuery(document).ready(function() {
			// var base_url = "http://10.71.1.173:8888/kotainter_2nd/";
			//var base_url = "http://localhost/kotainter_2nd/";
	     	var username = "<?php echo $this->session->userdata('id_user');?>"
	     	var password = "<?php echo $this->session->userdata('password');?>";
		     $('.SecndMenu').click(function(){
		     	var uri = $(this).attr('uri');
		        window.open(base_url+'Login/Bypass/'+ username +"/"+ password +"/"+ uri+'','_blank');
		    });
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
			for(var i=1; i<=1; i++){
				var amount = Math.floor(Math.random()*1000);
				var price = Math.floor(Math.random()*1000);
				rows.push({
					inv: 'Inv No '+i,
					date: $.fn.datebox.defaults.formatter(new Date()),
					name: 'Name '+i,
					amount: amount,
					price: price,
					cost: amount*price,
					note: 'Note '+i
				});
			}
			return rows;
		}

		$(function(){
			$('#dg').datagrid({data:getData()}).datagrid('clientPaging');
			$('#dg2').datagrid({data:getData()}).datagrid('clientPaging');

			<?php $pesan=$this->session->flashdata('message');?>
			var vPesan = '<?php echo $pesan?>';

			 if (vPesan!=='') {
			 	$.messager.alert('Informasi',vPesan,'info');
			 }
		});

	    function addTab(title, url){
	        if ($('#tt').tabs('exists', title)){
	            $('#tt').tabs('select', title);
	        } else {
	            var content = '<iframe scrolling="auto" frameborder="0"  src="'+url+'" style="width:100%;height:100%;"></iframe>';
	            $('#tt').tabs('add',{
	                title:title,
	                content:content,
	                closable:true
	            });
	        }
	    }


	</script>

</body>
</html>