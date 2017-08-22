<?php
$_GP["follower"] = "nologinby";

if ($_GP["follower"] != "nologinby") {
    if (is_login_account() == false) {
        if (empty($_SESSION["noneedlogin"])) {
            tosaveloginfrom();
            header("location:" . create_url('mobile', array('name' => 'shopwap', 'do' => 'login', 'from' => 'confirm')));
        }
    }
} else {
    $_SESSION["noneedlogin"] = true;
    clearloginfrom();
}

$member = get_member_account();
$openid = $member['openid'];
$op = $_GP['op'] ? $_GP['op'] : 'display';
$totalprice = 0;
$allgoods = array();
$id = intval($_GP['id']); //产品id
$optionid = intval($_GP['optionid']);
$total = intval($_GP['total']); //产品总价格
if (empty($total)) {
    $total = 1;
}
//$direct = false; //是否是直接购买
$direct = true; //是否是直接购买
$returnurl = ""; //当前连接
$issendfree = 0;

$orderdata = array(
    "openid"=>$openid,
    "ordersn"=>"",
    "credit"=>"",
    "price"=>"",
    "status"=>"",
    "sendtype"=>"",
    "paytype"=>"",
    "paytypecode"=>"",
    "paytypename"=>"",
    "addressid"=>"",
    "goodsprice"=>"",
    "dispatchprice"=>"",
    "dispatchexpress"=>"",
    "dispatch"=>"",
    "createtime"=>time(),
    "createtime"=>"",
    "address_address"=>"",
    "address_area"=>"",
    "address_city"=>"",
    "address_province"=>"",
    "address_realname"=>"",
    "address_mobile"=>""
);

//插入地址
    $post_address = array(
        'openid' => $openid,
        'isdefault'=> '1',
        'deleted'=> '0',
        'realname' => $_GP['realname']?$_GP['realname']:'',
        'mobile' => $_GP['mobile']?$_GP['mobile']:'',
        'province' => $_GP['province']?$_GP['province']:'',
        'city' => $_GP['city']?$_GP['city']:'',
        'area' => $_GP['area']?$_GP['area']:'',
        'address' => $_GP['address']?$_GP['address']:'',
    );
    mysqld_insert('shop_address', $post_address); 

    $defaultAddress = mysqld_select("SELECT * FROM " . table('shop_address') . " WHERE isdefault = 1 and openid = :openid limit 1", array(':openid' => $openid));
    $_GP['address'] = $defaultAddress['id'];

//获取产品
if (!empty($id)) {

    $item = mysqld_select("select * from " . table("shop_goods") . " where id=:id", array(":id" => $id));


    if ($item['issendfree'] == 1) {
        $issendfree = 1;
    }

    if ($item['istime'] == 1) {
        if (time() > $item['timeend']) {
            message('抱歉，商品限购时间已到，无法购买了！', refresh(), "error");
        }
    }

    if (!empty($optionid)) {
        $option = mysqld_select("select title,marketprice,weight,stock from " . table("shop_goods_option") . " where id=:id", array(":id" => $optionid));
        if ($option) {
            $item['optionid'] = $optionid;
            $item['title'] = $item['title'];
            $item['optionname'] = $option['title'];
            $item['marketprice'] = $option['marketprice'];
            $item['weight'] = $option['weight'];
        }
    }
    $item['stock'] = $item['total'];
    $item['total'] = $total;
    $item['totalprice'] = $total * $item['marketprice'];
    $item['credit'] = $total * $item['credit'];
    $allgoods[] = $item;
    $totalprice+= $item['totalprice'];


    $direct = true;
    //$returnurl = mobile_url("confirm", array("id" => $id, "optionid" => $optionid, "total" => $total));
}
//if (!$direct) {
//
//    //如果不是直接购买（从购物车购买）
//    $list = mysqld_selectall("SELECT * FROM " . table('shop_cart') . " WHERE  session_id = '" . $openid . "'");
//    if (!empty($list)) {
//        $totalprice = 0;
//        $totaltotal = 0;
//        foreach ($list as &$g) {
//            $item = mysqld_select("select * from " . table("shop_goods") . " where id=:id", array(":id" => $g['goodsid']));
//            //属性
//            $option = mysqld_select("select * from " . table("shop_goods_option") . " where id=:id ", array(":id" => $g['optionid']));
//            if ($option) {
//                if ($item['issendfree'] == 1) {
//                    $issendfree = 1;
//                }
//                $item['optionid'] = $g['optionid'];
//                $item['title'] = $item['title'];
//                $item['optionname'] = $option['title'];
//                $item['marketprice'] = $option['marketprice'];
//                $item['weight'] = $option['weight'];
//            }
//            $item['stock'] = $item['total'];
//            $item['total'] = $g['total'];
//            $item['totalprice'] = $g['total'] * $item['marketprice'];
//            $item['credit'] = $g['total'] * $item['credit'];
//            $allgoods[] = $item;
//            $totalprice+= $item['totalprice'];
//            if ($totaltotal < $g['total']) {
//                $totaltotal = $g['total'];
//            }
//        }
//
//        $promotion = mysqld_selectall("select * from " . table('shop_pormotions') . " where starttime<=:starttime and endtime>=:endtime", array(':starttime' => TIMESTAMP, ':endtime' => TIMESTAMP));
//
//        //========促销活动===============
//        foreach ($promotion as $pro) {
//            if ($pro['promoteType'] == 1) {
//                if (($totalprice) >= $pro['condition']) {
//                    $issendfree = 1;
//                }
//            } else if ($pro['promoteType'] == 0) {
//                if ($totaltotal >= $pro['condition']) {
//                    $issendfree = 1;
//                }
//            }
//        }
//        //========end===============
//
//        unset($g);
//    }
//    $returnurl = mobile_url("confirm");
//}

if (count($allgoods) <= 0) {
    header("location: " . mobile_url('shopindex'));
    exit();
}

//配送方式
$dispatch = array();
$dispatchcode = array();
$addressdispatch1 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join " . table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ((dispatch_area.provance=:provance and dispatch_area.city=:city and dispatch_area.area=:area)))", array(":provance" => $defaultAddress['province'], ":city" => $defaultAddress['city'], ":area" => $defaultAddress['area']));
$addressdispatch2 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join " . table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ( (dispatch_area.provance=:provance and dispatch_area.city=:city and dispatch_area.area='') ))", array(":provance" => $defaultAddress['province'], ":city" => $defaultAddress['city']));
$addressdispatch3 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join " . table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ((dispatch_area.provance=:provance and dispatch_area.city='' and dispatch_area.area='') ))", array(":provance" => $defaultAddress['province']));
$addressdispatch4 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join " . table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and (dispatch_area.provance='' and dispatch_area.city='' and dispatch_area.area='') )");

$addressdispatchs = array($addressdispatch1, $addressdispatch2, $addressdispatch3, $addressdispatch4);
$dispatchIndex = 0;
foreach ($addressdispatchs as $addressdispatch) {
    foreach ($addressdispatch as $d) {
        if (!in_array($d['express'], $dispatchcode)) {
            $dispatch[$dispatchIndex] = $d;
            $dispatchcode[$dispatchIndex] = $d['express'];
            $dispatchIndex = $dispatchIndex + 1;
        }
    }
}


foreach ($dispatch as &$d) {
    $weight = 0;

    foreach ($allgoods as $g) {
        $weight+=$g['weight'] * $g['total'];
        if ($g['issendfree'] == 1) {
            $issendfree = 1;
        }
    }

    $price = 0;
    if ($issendfree != 1) {
        if ($weight <= $d['firstweight']) {
            $price = $d['firstprice'];
        } else {
            $price = $d['firstprice'];
            $secondweight = $weight - $d['firstweight'];
            if ($secondweight % $d['secondweight'] == 0) {
                $price+= (int) ( $secondweight / $d['secondweight'] ) * $d['secondprice'];
            } else {
                $price+= (int) ( $secondweight / $d['secondweight'] + 1 ) * $d['secondprice'];
            }
        }
    }
    $d['price'] = $price;
}
unset($d);

$paymentconfig = "";
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
    $paymentconfig = " and code!='alipay'";
} else {
    if (is_mobile_request()) {
        $paymentconfig = " and code!='weixin'";
    }
}
$payments = mysqld_selectall("select * from " . table("payment") . " where enabled=1 {$paymentconfig} order by `order` desc");



//判断生成订单
$_GP['dispatch'] = 2;
$_GP['payment'] = 'delivery';//货到付款
//$_GP['payment'] = 'weixin';


    $address = mysqld_select("SELECT * FROM " . table('shop_address') . " WHERE id = :id", array(':id' => intval($_GP['address'])));
    if (empty($address)) {
        message('抱歉，请您填写收货地址！');
    }
    if (empty($_GP['dispatch'])) {
        message('请选择配送方式！');
    }
    if (empty($_GP['payment'])) {
        message('请选择支付方式！');
    }
    //商品价格
    $goodsprice = 0;
    $goodscredit = 0;
    foreach ($allgoods as $row) {
        $goodsprice+= $row['totalprice'];
        if ($row['issendfree'] == 1 || $row['type'] == 1) {
            $issendfree = 1;
        }
        $goodscredit+= intval($row['credit']);
    }
    //运费
    // dispatch 2 : 全国包邮，统一邮费
    $dispatchid = intval($_GP['dispatch']);
    $dispatchitem = mysqld_select("select sendtype,express from " . table('shop_dispatch') . " where id=:id limit 1", array(":id" => $dispatchid));
    $dispatchprice = 0;
    if ($issendfree != 1) {
        foreach ($dispatch as $d) {
            if ($d['id'] == $dispatchid) {
                $dispatchprice = $d['price'];
            }
        }
    }
    
    $ordersns = date('Ymd') . random(6, 1);
    //支付方式，货到付款
    //delivery 货到付款，weixin:微信 alipay 支付宝
    //$_GP['payment'] = 'delivery';
    $randomorder = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE  ordersn=:ordersn limit 1", array(':ordersn' => $ordersns));
    if (!empty($randomorder['ordersn'])) {
        $ordersns = date('Ymd') . random(6, 1);
    }
    $payment = mysqld_select("select * from " . table("payment") . " where enabled=1 and code=:payment", array(':payment' => $_GP['payment']));
    if (empty($payment['id'])) {
        message("没有获取到付款方式");
    }
    $serviceprice = $_GP['serviceprice']?floatval($_GP['serviceprice']):0;
    $paytype = $this->getPaytypebycode($payment['code']);
    $data = array(
        'openid' => $openid,
        'ordersn' => $ordersns,
        'price' => $goodsprice + $dispatchprice + $serviceprice,
        'dispatchprice' => $dispatchprice,
        'goodsprice' => $goodsprice,
        'credit' => $goodscredit,
        'status' => 0,
        'paytype' => $paytype,
        'sendtype' => intval($dispatchitem['sendtype']),
        'dispatchexpress' => $dispatchitem['express'],
        'dispatch' => $dispatchid,
        'paytypecode' => $payment['code'],
        'paytypename' => $payment['name'],
        'remark' => $_GP['remark'],
        'addressid' => $address['id'],
        'address_mobile' => $address['mobile'],
        'address_realname' => $address['realname'],
        'address_province' => $address['province'],
        'address_city' => $address['city'],
        'address_area' => $address['area'],
        'address_address' => $address['address'],
        'createtime' => time(),
        'serviceprice' => $serviceprice,
    );

    mysqld_insert('shop_order', $data);
    $orderid = mysqld_insertid();
//    if (is_login_account()) {
        //插入优惠券
//        if (!empty($_GP['bonus'])) {
//            $bonus_sn = $_GP['bonus'];
//            if ($bonus_sn == 'custom') {
//                $bonus_sn = $_GP['custom_bonus_sn'];
//            }
//            $use_bonus = mysqld_select("select * from " . table('bonus_user') . " where deleted=0 and isuse=0 and  bonus_sn=:bonus_sn limit 1", array(":bonus_sn" => $bonus_sn));
//            if (!empty($use_bonus['bonus_id'])) {
//
//
//                $bonus_type = mysqld_select("select * from " . table('bonus_type') . " where deleted=0 and type_id=:type_id and    min_goods_amount<=:min_goods_amount and (send_type=0  or (send_type=1 and send_start_date<=:send_start_date and send_end_date>=:send_end_date) or (send_type=2 and min_amount<:min_amount and send_start_date<=:send_start_date and send_end_date>=:send_end_date) or send_type=3)  and use_start_date<=:use_start_date and use_end_date>=:use_end_date", array(":type_id" => $use_bonus['bonus_type_id'], ":min_amount" => $goodsprice, ":min_goods_amount" => $goodsprice, ":send_start_date" => time(), ":send_end_date" => time(), ":use_start_date" => time(), ":use_end_date" => time()));
//                if (!empty($bonus_type['type_id'])) {
//
//                    $hasbonus = 1;
//                    $bonusprice = $bonus_type['type_money'];
//
//                    mysqld_update('bonus_user', array('isuse' => 1, 'order_id' => $orderid, 'used_time' => time()), array('bonus_id' => $use_bonus['bonus_id']));
//
//                    mysqld_update('shop_order', array('price' => $goodsprice + $dispatchprice - $bonusprice, 'hasbonus' => $hasbonus, 'bonusprice' => $bonusprice), array('id' => $orderid));
//                } else {
//                    
//                }
//            } else {
//                
//            }
//        }
//    }


    //插入订单商品
    foreach ($allgoods as $row) {
        if (empty($row)) {
            continue;
        }
        $d = array(
            'goodsid' => $row['id'],
            'orderid' => $orderid,
            'total' => $row['total'],
            'price' => $row['marketprice'],
            'createtime' => time(),
            'optionid' => $row['optionid']
        );
        $o = mysqld_select("select title from " . table('shop_goods_option') . " where id=:id limit 1", array(":id" => $row['optionid']));
        if (!empty($o)) {
            $d['optionname'] = $o['title'];
        }
        //获取商品id
        $ccate = $row['ccate'];
        mysqld_insert('shop_order_goods', $d);
    }
    //清空购物车
    if (!$direct) {
        mysqld_delete("shop_cart", array("session_id" => $openid));
    }
    clearloginfrom();
    header("Location:" . mobile_url('pay', array('orderid' => $orderid, 'topay' => '1','ispp'=>'1')));

include themePage('confirm_order');