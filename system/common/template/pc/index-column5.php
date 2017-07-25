 
<!-- {{{ tab 显示 精选，限时，热销-->
<div class="her_top">
    <div class="her_title">
            <ul class="her_menu">
                    <li class="current">
                            <i class="today_zb_icon"></i>
                            推荐
                            <i class="jx_icon_down"></i>
                    </li>
                    <li>
                            <i class="yesto_icon"></i>
                            新品
                            <i class="jx_icon_down"></i>
                    </li>
                    <li>
                            <i class="yesto_icon"></i>
                            首发
                            <i class="jx_icon_down"></i>
                    </li>
                    <li>
                            <i class="yesto_icon"></i>
                            热卖
                            <i class="jx_icon_down"></i>
                    </li>
                    <li>
                            <i class="yesto_icon"></i>
                            精品
                            <i class="jx_icon_down"></i>
                    </li>
            </ul>
    </div>
    <div class="pro_con" style="display: block;">
        <div class="P_left">
                <div class="groDiv">
                        <div style="position: relative;overflow: hidden;">
                                <ul class="groUlOut">
                                    <?php if($recommand_products){ ?>
                                    <?php foreach($recommand_products as $k=>$v){ ?>
                                        <li style="float: left;width: 224px;">
                                                <div class="x">推荐</div>
                                                <a href="<?php echo pc_url('detail', array('id' => $v['id']));?>" class="pro">
                                                        <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $v['thumb'];?>"/>
                                                </a>
                                                <p class="box_glay">
                                                        <a href="" class="pro_text">
                                                                <span><?php echo $v['goodsname'];?></span>
                                                        </a>
                                                </p>
                                                <p class="p_num">
                                                        No.<?php echo $v['goodssn'];?>
                                                </p>
                                                <div class="now_price">
                                                        <div class="price">
                                                                <span class="bigfont">
                                                                        <span class="f_14">￥</span><span><?php echo $v['marketprice'];?></span>
                                                                </span>
                                                                <span><del>￥<?php echo $v['productprice'];?></del></span>
                                                                <!--<div class="zk">4.8折</div>-->
                                                                <!--<div class="zk">已售:<?php echo $item['sales']; ?></div>-->
                                                        </div>
                                                </div>
                                        </li>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                        </div>
                </div>
        </div>
    </div>
    <div class="pro_con" style="display: none;">
        <div class="P_left">
                <div class="groDiv">
                        <div style="position: relative;overflow: hidden;">
                                <ul class="groUlOut">
                                        <?php if($new_products){ ?>
                                    <?php foreach($new_products as $k=>$v){ ?>
                                        <li style="float: left;width: 224px;">
                                                <div class="x">新品</div>
                                                <a href="<?php echo pc_url('detail', array('id' => $v['id']));?>" class="pro">
                                                        <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $v['thumb'];?>"/>
                                                </a>
                                                <p class="box_glay">
                                                        <a href="" class="pro_text">
                                                                <span><?php echo $v['goodsname'];?></span>
                                                        </a>
                                                </p>
                                                <p class="p_num">
                                                        No.<?php echo $v['goodssn'];?>
                                                </p>
                                                <div class="now_price">
                                                        <div class="price">
                                                                <span class="bigfont">
                                                                        <span class="f_14">￥</span><span><?php echo $v['marketprice'];?></span>
                                                                </span>
                                                                <span><del>￥<?php echo $v['productprice'];?></del></span>
                                                                <!--<div class="zk">4.8折</div>-->
                                                                <!--<div class="zk">已售:<?php echo $item['sales']; ?></div>-->
                                                        </div>
                                                </div>
                                        </li>
                                    <?php } ?>
                                    <?php } ?>
                                        
                                </ul>
                        </div>
                </div>
        </div>
    </div>
    <div class="pro_con" style="display: none;">
        <div class="P_left">
                <div class="groDiv">
                        <div style="position: relative;overflow: hidden;">
                                <ul class="groUlOut">
                                        <?php if($first_products){ ?>
                                    <?php foreach($first_products as $k=>$v){ ?>
                                        <li style="float: left;width: 224px;">
                                                <div class="x">首发</div>
                                                <a href="<?php echo pc_url('detail', array('id' => $v['id']));?>" class="pro">
                                                        <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $v['thumb'];?>"/>
                                                </a>
                                                <p class="box_glay">
                                                        <a href="" class="pro_text">
                                                                <span><?php echo $v['goodsname'];?></span>
                                                        </a>
                                                </p>
                                                <p class="p_num">
                                                        No.<?php echo $v['goodssn'];?>
                                                </p>
                                                <div class="now_price">
                                                        <div class="price">
                                                                <span class="bigfont">
                                                                        <span class="f_14">￥</span><span><?php echo $v['marketprice'];?></span>
                                                                </span>
                                                                <span><del>￥<?php echo $v['productprice'];?></del></span>
                                                                <!--<div class="zk">4.8折</div>-->
                                                                <!--<div class="zk">已售:<?php echo $item['sales']; ?></div>-->
                                                        </div>
                                                </div>
                                        </li>
                                    <?php } ?>
                                    <?php } ?>
                                        
                                </ul>
                        </div>
                </div>
        </div>
    </div>
    <div class="pro_con" style="display: none;">
        <div class="P_left">
                <div class="groDiv">
                        <div style="position: relative;overflow: hidden;">
                                <ul class="groUlOut">
                                        <?php if($hot_products){ ?>
                                    <?php foreach($hot_products as $k=>$v){ ?>
                                        <li style="float: left;width: 224px;">
                                                <div class="x">热卖</div>
                                                <a href="<?php echo pc_url('detail', array('id' => $v['id']));?>" class="pro">
                                                        <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $v['thumb'];?>"/>
                                                </a>
                                                <p class="box_glay">
                                                        <a href="" class="pro_text">
                                                                <span><?php echo $v['goodsname'];?></span>
                                                        </a>
                                                </p>
                                                <p class="p_num">
                                                        No.<?php echo $v['goodssn'];?>
                                                </p>
                                                <div class="now_price">
                                                        <div class="price">
                                                                <span class="bigfont">
                                                                        <span class="f_14">￥</span><span><?php echo $v['marketprice'];?></span>
                                                                </span>
                                                                <span><del>￥<?php echo $v['productprice'];?></del></span>
                                                                <!--<div class="zk">4.8折</div>-->
                                                                <!--<div class="zk">已售:<?php echo $item['sales']; ?></div>-->
                                                        </div>
                                                </div>
                                        </li>
                                    <?php } ?>
                                    <?php } ?>
                                        
                                </ul>
                        </div>
                </div>
        </div>
    </div>
    <div class="pro_con" style="display: none;">
        <div class="P_left">
                <div class="groDiv">
                        <div style="position: relative;overflow: hidden;">
                                <ul class="groUlOut">
                                        <?php if($jingping_products){ ?>
                                    <?php foreach($jingping_products as $k=>$v){ ?>
                                        <li style="float: left;width: 224px;">
                                                <div class="x">精品</div>
                                                <a href="<?php echo pc_url('detail', array('id' => $v['id']));?>" class="pro">
                                                        <img src="<?php echo WEBSITE_ROOT;?>/attachment/<?php echo $v['thumb'];?>"/>
                                                </a>
                                                <p class="box_glay">
                                                        <a href="" class="pro_text">
                                                                <span><?php echo $v['goodsname'];?></span>
                                                        </a>
                                                </p>
                                                <p class="p_num">
                                                        No.<?php echo $v['goodssn'];?>
                                                </p>
                                                <div class="now_price">
                                                        <div class="price">
                                                                <span class="bigfont">
                                                                        <span class="f_14">￥</span><span><?php echo $v['marketprice'];?></span>
                                                                </span>
                                                                <span><del>￥<?php echo $v['productprice'];?></del></span>
                                                                <!--<div class="zk">4.8折</div>-->
                                                                <!--<div class="zk">已售:<?php echo $item['sales']; ?></div>-->
                                                        </div>
                                                </div>
                                        </li>
                                    <?php } ?>
                                    <?php } ?>
                                        
                                </ul>
                        </div>
                </div>
        </div>
    </div>
</div>
<!-- }}} tab 显示 精选，限时，热销-->