<?php 

            mysqld_update('shop_order', array('status' => '1','paytype' => '3'), array('id' => $orderid));

	  require_once WEB_ROOT.'/system/shopwap/class/mobile/order_notice_mail.php';  
             mailnotice($orderid);
			 if(isset($_GET['mod']) && $_GET['mod'] == 'pc'){
				 message('订单提交成功，请您收到货时付款！', WEBSITE_ROOT.pc_url('myorder'), 'success');
			 }else{
				 message('订单提交成功，请您收到货时付款！', WEBSITE_ROOT.mobile_url('myorder'), 'success');
			 }
            

?>