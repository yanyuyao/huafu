<!--轮播区域-->
	    <div class="full_big_eye">
	        <!--菜单-->
	    	<div class="index_type">
	    		<ul class="index_type_ul">
                                <?php  if(is_array($category_all)) { foreach($category_all as $cat) {  ?>
                                            <li>
                                                <span><?php echo $cat['name'];?><b>></b></span>
                                                <?php  if(is_array($cat['childlist'])) {?>
                                                    <div class="nav_type_list" data="1">
                                                        <ul>
                                                            <?php  foreach($cat['childlist'] as $child) { ?>
                                                                <li><a href="<?php echo pc_url('goodlist', array('ccate' => $child['id']));?>" target="_blank"><?php  echo $child['name'];?></a></li>
                                                            <?php  } ?>
                                                        </ul>
                                                    </div>
                                                <?php  } ?>
                                            </li>
                                <?php   } } ?>
	    			
	    		</ul>
	    	</div>
	        <!--菜单-->
	        <!--轮播图-->
	        <div class="full_eye">
	        	<div id="inBaner">
	        		<ul class="big_eye_pic">
                                         <?php  if(is_array($advs)) { foreach($advs as $adv) {  ?>
                                            <li>
                                                   <a href="<?php  if(empty($adv['link'])) { ?><?php } else { ?><?php  echo $adv['link'];?><?php  }?>" class="tpl">
                                                           <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php  echo $adv['thumb'];?>"/>
                                                   </a>
                                            </li>
                                        <?php   } } ?>
	        		</ul>
	        		<div class="btn">
	        		    <ul>
	        		    	<?php  if(is_array($advs)) { foreach($advs as $adv) {  ?>
                                            <li></li>
                                        <?php   } } ?>
	        		    </ul>
	        		</div>
	        	</div>
	        </div>
	        <!--轮播图-->
	    </div>
	    <!--轮播区域-->
            <script type="text/javascript">
			$(function(){
				//轮播图效果
				var c = 0;
				//加一个时间事件
				function timer(){
				    //获得序号
				    c++;
				    if(c==6){
				    	c=0;
				    }
//				    alert(c);
				    //让自己显示，兄弟元素隐藏
				    $("#inBaner .big_eye_pic li").eq(c).stop().fadeIn(1800).siblings().fadeOut(800);
				    //改变颜色
				    $("#inBaner .btn ul li").eq(c).stop().addClass("cur").siblings().removeClass("cur");
				}
				time = setInterval(timer,2000);
				//给图片添加一个移入移出效果
				$("#inBaner").hover(function(){
					//停止时间
					clearInterval(time);
				},function(){
					//时间继续
					time = setInterval(timer,2000);
				});
				//给色块添加一个移入移出事件
				$("#inBaner .btn ul li").mouseenter(function(){
					var n = $(this).index();
					//让第一个人图片显示 其余的隐藏
					$("#inBaner .big_eye_pic li").eq(n).stop().show().siblings().hide();
					//改变颜色
					$("#inBaner .btn ul li").eq(n).stop().addClass("cur").siblings().removeClass("cur");
				});
				//添加一个点击事件
				$(".her_top .her_title .her_menu li").click(function(){
					var n = $(this).index();
					//切换颜色
					$(".her_menu li").eq(n).addClass("current").siblings().removeClass("current");
					//切换商品
					$(".her_top .pro_con").eq(n).show().siblings(".pro_con").hide();
				})
				//搜索框下滑
				$(window).scroll(function(){
					//获得滚动条距离顶部距离
					var t = $(document).scrollTop();
					    document.title = t;
					    if(t>530){
					    	$("#nav").show();
					    }else{
					    	$("#nav").hide();
					    }
				});
			});
		</script>