<!--顶部公用-->
		<div class="header">
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
								<a href="">订单查询</a>
								<span class="line"></span>
							</li>
							<li>
								<a href="">我的快乐购</a>
								<span class="line"></span>
							</li>
							<li>
								<i class="tel_icon"></i>
								<a href="">400-705-1111</a>
								<span class="line"></span>
							</li>
							<li>
								<a href="">下载快乐购app</a>
								<div class="down_load">
                                    <div class="down_border">
                                        <b class="icon_top"></b>
                                        <img style="" src="<?php echo THEMES_KUAILEGOU_ROOT;?>/__RESOURCE__/pc/image/down_load_20160411.png">
                                        <p>快乐生活 快乐购</p>
                                    </div>
                                </div>
								<span class="line"></span>
							</li>
							<li class="cus_c_box">
								<a href="">客服中心</a>
								<div class="cus_center">
                                    <a href="">帮助中心</a>
                                    <a href="">会员反馈</a>
                                </div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		    <!--搜索-->
		    <div class="full_sc">
	    	    <div class="w1200 header_conter">
	    		    <div class="h_c_logo">
	    			    <a href="index.html">
	    				    <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $cfg['shop_logo']; ?>" style="width:80px;"/>
	    			    </a>
	    		    </div>
	    		    <div class="h_c_bz">
<!--	    			    <img src="<?php echo THEMES_KUAILEGOU_ROOT;?>/__RESOURCE__/pc/image/top_center.jpg" style="width: 467px;29px"/>-->
	    		    </div>
	    		    <div class="h_c_search">
	    			    <div class="search_input">
<!--	    			    	<form action="" method="post">
	    			    		<input type="text" style="color: rgb(102, 102, 102);" name="keyword" class="text_search" placeholder="limu 胶原蛋白" value="" />
	    			    		<input type="submit" class="btn_search" value="搜索"/>
	    			    	</form>-->
                                                   <form class="" action="index.php" id="searchForm" name="searchForm">
                                                            <input type="hidden" name="mod" value="mobile" />
                                                            <input type="hidden" name="do" value="goodlist" />
                                                            <input type="hidden" name="name" value="shopwap" />
                                                            <input name="keyword"  style="color: rgb(102, 102, 102);height:auto;" id="search_word" class="text_search" placeholder="请输入商品名进行搜索！" ptag="37080.5.2" type="search"  AUTOCOMPLETE="off"/>
                                                            <div class="">
                                                                <a href="javascript:;"  id="submit" class="btn_search" style="text-align: center;" >搜索</a>
                                                            </div>
                                                    </form>
	    			    </div>
	    			    <div class="search_key">
	    			    	<ul>
	    			    		<li>
	    			    			<a href="">太阳镜</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">蕉下</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">果蔬脆片</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">德亚酸牛奶</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">蚕丝面膜</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">山地车</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">BB霜</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">乳胶枕</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">蝙蝠侠系列石英表</a>
	    			    		</li>
	    			    		<li>
	    			    			<a href="">拍立得</a>
	    			    		</li>
	    			    	</ul>
	    			    </div>
	    		    </div>
	    		    <div class="h_c_right">
	    		    	<a href="<?php echo pc_url('mycart');?>" class="h_c_r_car">
	    		    		<b class="b_car1"></b>
	    		    		<span><i class="ci-count">0</i>我的购物车</span>
	    		    		<b class="b_car2"></b>
	    		    	</a>
	    		    </div>
	    	    </div>
	        </div>
		    <!--菜单-->
		    <div class="full_nav">
		    	<div class="w1200">
		    		<ul class="nav">
		    			<li class="li_all_type">
		    				<a href="">全部分类</a>
		    				<b class="b_down"></b>
		    			</li>
		    			<li class="home">
		    				<a href="index.html" style="color: #C41F3A;">首页</a>
		    			</li>
		    			<li>
		    				<a href="refined.html">精选品牌</a>
		    			</li>
		    			<li>
		    				<a href="go.html">全球购</a>
		    			</li>
		    			<li>
		    				<a href="brand.html">品牌馆</a>
		    			</li>
		    		</ul>
		    	</div>
	        </div>
		</div>
<!--头部end-->