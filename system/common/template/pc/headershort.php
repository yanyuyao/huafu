<!--顶部公用-->
		<div class="header" style="border-bottom: 2px solid #B1191A;">
		<!--顶部导航-->
			<div class="header_top">
				<div class="w1200">
					<div class="h_t_l">
						<div class="login_l">
						    <span>欢迎来到<?php echo $cfg['shop_title']; ?></span>
						    <a class="a_login" href="<?php echo create_url('pc',array('name' => 'pc','do' => 'login'));?>">[登录]</a>
						    <span class="line"></span>
                                                    <a class="" href="<?php echo create_url('pc',array('name' => 'pc','do' => 'regedit','third_login'=>$_GP['third_login'])); ?>">[注册]</a>
						</div>
					</div>
					<div class="h_t_r">
						<ul>
							<li>
                                                            <a href="<?php echo pc_url('myorder');?>">订单查询</a>
								<span class="line"></span>
							</li>
							<li>
								<a href="<?php echo pc_url('fansindex');?>">我的</a>
								<span class="line"></span>
							</li>
							<li>
								<i class="tel_icon"></i>
								<a href="">400-888-0000</a>
								<span class="line"></span>
							</li>
<!--							<li>
								<a href="">下载</a>
								<div class="down_load">
                                                                    <div class="down_border">
                                                                        <b class="icon_top"></b>
                                                                        <img style="" src="<?php echo THEMES_KUAILEGOU_ROOT;?>/__RESOURCE__/pc/image/down_load_20160411.png">
                                                                        <p>快乐生活 快乐购</p>
                                                                    </div>
                                                                </div>
								<span class="line"></span>
							</li>-->
							<li class="cus_c_box">
								<a href="<?php echo pc_url('help');?>">购物须知</a>
<!--								<div class="cus_center">
                                                                    <a href="">帮助中心</a>
                                                                    <a href="">会员反馈</a>
                                                                </div>-->
							</li>
						</ul>
					</div>
				</div>
			</div>
		    <!--搜索-->
		    <div class="full_sc">
	    	    <div class="w1200 header_conter">
	    		    <div class="h_c_logo">
                                <a href="<?php echo pc_url('shopindex');?>">
	    				    <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $cfg['shop_logo']; ?>" style="width:80px;"/>
	    			    </a>
	    		    </div>
	    		    <div class="h_c_bz" style="margin-left:100px;">
	    			    <img src="<?php echo THEMES_KUAILEGOU_ROOT;?>/__RESOURCE__/pc/image/top_center.jpg" style="width: 467px;29px"/>
	    		    </div>
	    		    <div class="h_c_right">
	    		    	<a href="<?php echo pc_url('mycart');?>" class="h_c_r_car">
	    		    		<b class="b_car1"></b>
	    		    		<span><!--<i class="ci-count">0</i>-->我的购物车</span>
	    		    		<b class="b_car2"></b>
	    		    	</a>
	    		    </div>
	    	    </div>
	        </div>
		   
		</div>
<!--头部end-->