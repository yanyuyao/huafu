<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
require(WEB_ROOT.'/system/common/lib/lib_core.php');
require(WEB_ROOT.'/system/common/lib/lib_weixin.php');
require(WEB_ROOT.'/system/common/lib/lib_alipay.php');
if(file_exists(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php'))
{
require(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php');
}