<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: �ټ����� <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------

//�����ܽ��
$allorderprice = mysqld_selectcolumn("SELECT sum(cast(price as decimal(8,2))) FROM " . table('shop_order') . " WHERE status=3  ");
//�ܶ�����
$allordercount = mysqld_selectcolumn("SELECT count(id) FROM " . table('shop_order') . " WHERE status=3  ");
//�ܻ�Ա��
$allmembercount = mysqld_selectcolumn("SELECT count(*) FROM " . table('member')." where istemplate=0");
//�ܷ��ʴ���
$allorderviewcount = mysqld_selectcolumn("SELECT sum(cast(viewcount as decimal(8,0))) FROM " . table('shop_goods') );
//�й������Ļ�Ա
$haveordermembercount = mysqld_selectcolumn("select count(os.openid) from (SELECT orders.openid FROM " . table('shop_order') . " orders  group by orders.openid) as os");
if(empty($allorderprice))
{
		$allorderprice=0;
}


include addons_page('saletargets');