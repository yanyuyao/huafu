<?php

$advs = mysqld_selectall("select * from " . table('shop_adv') . " where enabled=1  order by displayorder desc");

$category_all_list = mysqld_selectall("SELECT *,'' as list FROM " . table('shop_category') . " WHERE enabled=1 and deleted=0 ORDER BY parentid ASC, displayorder DESC", array(), 'id');
$category_all = array();
foreach ($category_all_list as $index => $row) {
    if (!empty($row['parentid'])) {
        $category_all[$row['parentid']]['childlist'][$row['id']] = $row;
    }else{
        $category_all[$row['id']] = $row;
    }
}

unset($category_all_list);

$children_category = array();
$category = mysqld_selectall("SELECT *,'' as list FROM " . table('shop_category') . " WHERE isrecommand=1 and enabled=1 and deleted=0 ORDER BY parentid ASC, displayorder DESC", array(), 'id');
foreach ($category as $index => $row) {
    if (!empty($row['parentid'])) {
        $children_category[$row['parentid']]['childlist'][$row['id']] = $row;
        unset($category[$index]);  
    }
}

$first_good_list = array();
$recommandcategory = array();
foreach ($category as &$c) {
    if ($c['isrecommand'] == 1) {
        $c['list'] = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isrecommand=1 and deleted=0 AND status = 1  and pcate='{$c['id']}'  ORDER BY displayorder DESC, sales");

        foreach ($c['list'] as &$c1goods) {
            if ($c1goods['isrecommand'] == 1 && $c1goods['isfirst'] == 1) {
                $first_good_list[] = $c1goods;
            }
        }
        $recommandcategory[] = $c;
    }
    if (!empty($children_category[$c['id']])) {
        foreach ($children_category[$c['id']] as &$child) {
            if ($child['isrecommand'] == 1) {
                $child['list'] = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isrecommand=1 and deleted=0 AND status = 1  and pcate='{$c['id']}' and ccate='{$child['id']}'  ORDER BY displayorder DESC, sales DESC ");
                foreach ($child['list'] as &$c2goods) {
                    if ($c2goods['isrecommand'] == 1 && $c2goods['isfirst'] == 1) {
                        $first_good_list[] = $c2goods;
                    }
                }

                $recommandcategory[] = $child;
            }
        }
        unset($child);
    }
}
//var_dump($category_all);

$products_column5 = array();
$recommand_products = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isrecommand=1 and deleted=0 AND status = 1  ORDER BY displayorder DESC, sales DESC limit 5 ");
$new_products = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isnew=1 and deleted=0 AND status = 1  ORDER BY displayorder DESC, sales DESC  limit 5");
$first_products = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isfirst=1 and deleted=0 AND status = 1  ORDER BY displayorder DESC, sales DESC  limit 5");
$hot_products = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  ishot=1 and deleted=0 AND status = 1  ORDER BY displayorder DESC, sales DESC  limit 5");
$jingping_products = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  isjingping=1 and deleted=0 AND status = 1  ORDER BY displayorder DESC, sales DESC  limit 5");

include themePcPage('shopindex');