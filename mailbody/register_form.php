<?php
$bg_img = SITEURL."mailbody/images/bg1.jpg";
$ta = "margin:0 auto;background-image:url(".$bg_img.");background-repeat: no-repeat;background-size: cover; padding: 10px 20px; color: #404040; font-family: lato";

$body = '
<table width="600px" border="0" style="'.$ta.'">
	<tr>
		<td style="padding-bottom: 36px;border:none; text-align: center;"><img src="'.SITEURL.'images/logo.webp" style="width:150px;margin-top:13px;"></td>
	</tr>
	<tr>
		<td style="padding:30px 0px 0px 0px; background-color: #fff;border:none; border-radius: 5px;">
			<table width="100%" border="0" style="text-align: center">
				<tr>
					<td style="font-size: 16px; font-weight:700;padding:0px 50px 5px;">Dear '.$name.' <br> Your register is successfully</td>
				</tr>
				<tr>
				
					<td style="font-size: 14px; font-weight:normal;padding:0 30px 30px;line-height: 20px;"> Email : '.$email.'
					</td>
				</tr>
				<tr>
				
					<td style="font-size: 14px; font-weight:normal;padding:0 30px 30px;line-height: 20px;"> Password : '.$pass.'
					</td>
				</tr>
			
				
			</table>
		</td>
	</tr>
</table>';
?>