<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pelunasan Nontaglis</title>	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/easyui/demo/demo.css">
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/easyui/jquery.easyui.min.js"></script>	
</head>
<body>    		
	<div id="w" class="easyui-window" title=" Login Form " data-options="minimizable:false,maximizable:false,closable:false,tools:'#tt'" style="width:330px;height:210px;padding:5px;">
		<div class="easyui-layout" data-options="fit:true">
			<div style="padding:10px 10px 10px 10px">			
		   <!-- <form id="ff" method="post" action="<?php echo site_url('auth/login') ?>" > !-->
			<form action="<?php echo site_url('auth/login') ?>" method="post">
	        	<table cellpadding="5">			
	        		<tr>
	        			<td>User</td>
	        			<td><input class="easyui-textbox" type="text" name="username" data-options="required:true" style="width:190px;height:26px;"></input></td>
	        		</tr>
	        		<tr>
		    			<td>Password</td>
	        			<td><input class="easyui-textbox" type="password" name="password" data-options="required:true" style="width:190px;height:26px;"></input></td>
	        		</tr>		
					
					<?php 				 	
						if (!empty($error)) {
							echo " <tr>
									<td colspan='2' align='right'><a style='color:red'>$error<a></td>									
								  </tr>	";												
						} else {
							echo " <tr>
									<td colspan='2' align='center'><hr></td>									
								  </tr>	";							
						}							
					?>						

					
	        	</table>
				
				<div data-options="region:'south',border:false" style="text-align:right;padding:10px 10px 10px 10px;">				
					<button type="submit" class="easyui-linkbutton" style="width:80px" >Login</button>
					<button type="reset" class="easyui-linkbutton" style="width:80px" >Reset</button>			
				</div>				
				
	        </form>
	        </div>			
	    			

		</div>
	</div>	

</body>
</html>