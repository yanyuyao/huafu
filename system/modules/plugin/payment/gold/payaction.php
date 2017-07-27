<?php 

			$member=get_member_account();
				$openid = $member['openid'];
				
				$order = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE  id=:id limit 1", array(':id' =>$orderid));
          
				$getmember=member_get($openid);
				if($getmember['gold']>=$order['price'])
				{
					$usegold=member_gold($openid,$order['price'],'usegold',"消费金额:".$order['price'].",订单编号：".$order['ordersn']);
					if($usegold)
					{
					   mysqld_update('shop_order', array('status' => '1','paytype' => '1'), array('id' => $orderid));
					   updateOrderStock($orderid);
                                            if(isset($_GET['mod']) && $_GET['mod'] == 'pc'){
                                                require_once WEB_ROOT.'/system/pc/class/pc/order_notice_mail.php';  
                                            }else{
                                                require_once WEB_ROOT.'/system/shopwap/class/mobile/order_notice_mail.php';  
                                            }
					     
             mailnotice($orderid);
                if(isset($_GET['mod']) && $_GET['mod'] == 'pc'){
                    message('订单提交成功，收货后请验货！',WEBSITE_ROOT.pc_url('myorder'), 'success');
                }else{
                    message('订单提交成功，收货后请验货！',WEBSITE_ROOT.mobile_url('myorder'), 'success');
                }
            
          }else
          {
                if(isset($_GET['mod']) && $_GET['mod'] == 'pc'){
                     message('付款失败！', WEBSITE_ROOT.pc_url('myorder'), 'error');
                }else{
                     message('付款失败！', WEBSITE_ROOT.mobile_url('myorder'), 'error');
                }
          	
          }
				}else
				{
                                        if(isset($_GET['mod']) && $_GET['mod'] == 'pc'){
                                            message('余额不足，无法完成付款！', WEBSITE_ROOT.pc_url('myorder'), 'error');
                                        }else{
                                            message('余额不足，无法完成付款！', WEBSITE_ROOT.mobile_url('myorder'), 'error');
                                        }
					 
				}
         
			
?>