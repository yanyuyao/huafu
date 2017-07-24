<?php
							$member=get_member_account(true,true);
					$openid =$member['openid'] ;
					$memberinfo=member_get($openid);
					if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
$weixinthirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin'");

if(!empty($weixinthirdlogin)&&!empty($weixinthirdlogin['id']))
{
	$isweixin=true;
					$weixin_openid=get_weixin_openid();
				}
			}
			if (checksubmit("submit")) {
					if(empty($_GP['mobile']))
					{
							message("请输入手机号！");	
					}
					
					$outgoldinfo=array('outgold_paytype'=>$_GP['outgold_paytype'],'outgold_bankname'=>$_GP['outgold_bankname'],'outgold_bankcardname'=>$_GP['outgold_bankcardname']
					,'outgold_bankcardcode'=>$_GP['outgold_bankcardcode'],'outgold_alipay'=>$_GP['outgold_alipay'],'outgold_weixin'=>$_GP['outgold_weixin']);
		
					
							$data = array('realname' => $_GP['realname'],
                    'email' => $_GP['email'],'outgoldinfo'=>serialize($outgoldinfo));
                    
					if(	$memberinfo['mobile']!=$_GP['mobile'])
					{
						$ckmember = mysqld_select("SELECT * FROM ".table('member')." where mobile=:mobile ", array(':mobile' => $_GP['mobile']));
						if(!empty($ckmember['openid']))
						{
								message($_GP['mobile']."已被注册。");	
						}
						$data['mobile']=$_GP['mobile'];
					}
		
				mysqld_update('member', $data,array('openid'=>$openid));
			
			  message('资料修改成功！', mobile_url('fansindex'), 'success');
			  
							}
		   include themePage('member');