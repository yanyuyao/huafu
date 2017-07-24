
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>商品列表</title>
	 <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
	<link href="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/css/reset.css" rel="stylesheet" type="text/css" />
	<link href="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/css/search_new.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/css/xmapp.css"/>
	<link href="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/css/bjcommon.css" rel="stylesheet" type="text/css" />
	<link href="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/css/bjlist.css" rel="stylesheet" type="text/css" />
	
</head>
<body style="margin:0 auto; padding:0 auto">


		<div class="tab">
			



<div class="paixu">
<div class="tab">
<a <?php if($sort==1) { ?>  class="price on"<?php } else { ?>class="price"<?php } ?> onclick="location.href='<?php echo $sorturl;?>&sort=1&sortb1=<?php echo $sortb11;?>'">销量↓</a>
<a <?php if($sort==0) { ?>  class="time on"<?php } else { ?>class="time"	 <?php } ?> onclick="location.href='<?php echo $sorturl;?>&sort=0&sortb0=<?php echo $sortb00;?>'">时间↓</a>
<a <?php if($sort==2) { ?>  class="renqi on"<?php } else { ?>class="renqi"<?php } ?> onclick="location.href='<?php echo $sorturl;?>&sort=2&sortb2=<?php echo $sortb22;?>'">人气↓</a>
<a <?php if($sort==3) { ?>  class="click on"<?php } else { ?>class="click"<?php } ?> onclick="location.href='<?php echo $sorturl;?>&sort=3&sortb3=<?php echo $sortb33;?>'">价格↓</a>
</div>
</div>




    <div style="padding-top:10px;"></div>
	
	
	<div class="os_panel">
              
                    <ul class="os_box_list" id="m2Con">
              <?php if(is_array($list)) { foreach($list as $item) { ?>	

                          <li>
						  
						  
                              <a href="<?php echo mobile_url('detail', array('id' => $item['id']))?>" class="item">
							  
							  		
                                 
                                  <div class="img"><img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $item['thumb'];?>"  onload="setLoadTime1();"></div>
								  
								  
								  
         

								  
                                  <div class="txt"><?php echo $item['title']?></div>
								  <div class="buy">
                                      <span class="price"><strong><em>¥<?php echo $item['marketprice'];?></em></strong><del>¥<?php echo $item['productprice'];?></del></span>
                                    
                                  </div>
								  	
                              </a>
                          </li>
             <?php } } ?>

                   </ul>
                  
               </div>
	
	
	
		</div>
	</div>




		<div class="viewport">
<?php include page('footer');?>	
		</div>







<?php include themePage('footer');?>
<script src="http://huafu.heyukj.com/themes/default/__RESOURCE__/recouse/js/zepto.min.js" type="text/javascript"></script>

</body>
</html>