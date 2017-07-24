-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?07 �?24 �?09:02
-- 服务器版本: 5.7.10
-- PHP 版本: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `huafu`
--

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon7_award`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon7_award` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '0',
  `endtime` int(10) NOT NULL,
  `awardtype` int(1) NOT NULL DEFAULT '0',
  `gold` decimal(10,2) NOT NULL DEFAULT '0.00',
  `credit_cost` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '100',
  `content` text NOT NULL,
  `createtime` int(10) NOT NULL,
  `deleted` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon7_config`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon7_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon7_request`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon7_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `award_id` int(10) unsigned NOT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon8_article`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon8_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iscommend` tinyint(1) NOT NULL DEFAULT '0',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '一级分类',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二级分类',
  `mobileTheme` int(10) NOT NULL DEFAULT '0' COMMENT '内容模板',
  `title` varchar(100) NOT NULL DEFAULT '',
  `readcount` int(10) NOT NULL DEFAULT '0' COMMENT '阅读次数',
  `description` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon8_article_category`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon8_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  `icon` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_addon9_singlepage`
--

CREATE TABLE IF NOT EXISTS `baijiacms_addon9_singlepage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `open_footer` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_alipay_alifans`
--

CREATE TABLE IF NOT EXISTS `baijiacms_alipay_alifans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `alipay_openid` varchar(50) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否订阅',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`alipay_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_alipay_rule`
--

CREATE TABLE IF NOT EXISTS `baijiacms_alipay_rule` (
  `url` varchar(500) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ruletype` int(11) NOT NULL COMMENT '1文本回复 2图文回复',
  `content` text,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_attachment`
--

CREATE TABLE IF NOT EXISTS `baijiacms_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT '1为图片',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_bonus_good`
--

CREATE TABLE IF NOT EXISTS `baijiacms_bonus_good` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` mediumint(8) NOT NULL,
  `good_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_bonus_type`
--

CREATE TABLE IF NOT EXISTS `baijiacms_bonus_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(60) NOT NULL DEFAULT '',
  `type_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `send_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `max_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `send_start_date` int(11) NOT NULL DEFAULT '0',
  `send_end_date` int(11) NOT NULL DEFAULT '0',
  `use_start_date` int(11) NOT NULL DEFAULT '0',
  `use_end_date` int(11) NOT NULL DEFAULT '0',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_bonus_user`
--

CREATE TABLE IF NOT EXISTS `baijiacms_bonus_user` (
  `bonus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bonus_sn` varchar(20) NOT NULL DEFAULT '',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `isuse` int(1) NOT NULL DEFAULT '0',
  `used_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `collect_time` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`bonus_id`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_config`
--

CREATE TABLE IF NOT EXISTS `baijiacms_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(100) NOT NULL COMMENT '配置名称',
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `baijiacms_config`
--

INSERT INTO `baijiacms_config` (`id`, `name`, `value`) VALUES
(1, 'shop_openreg', '1'),
(2, 'system_config_cache', 'a:7:{s:12:"shop_openreg";s:1:"1";s:19:"system_config_cache";s:0:"";s:10:"weixinname";s:39:"深圳市华府智能科技有限公司";s:11:"weixintoken";s:32:"ifmz1nidwvlxdf4ao41kh1qv4vulcyaa";s:14:"EncodingAESKey";s:43:"FhHUKNxUKbeAoLwITO12PWe8jskIciBjAWJwr6QS19d";s:12:"weixin_appId";s:18:"wx0f630f4bd4acc255";s:16:"weixin_appSecret";s:32:"de3446ec22cccfcc01755104052e0593";}'),
(3, 'weixinname', '深圳市华府智能科技有限公司'),
(4, 'weixintoken', 'ifmz1nidwvlxdf4ao41kh1qv4vulcyaa'),
(5, 'EncodingAESKey', 'FhHUKNxUKbeAoLwITO12PWe8jskIciBjAWJwr6QS19d'),
(6, 'weixin_appId', 'wx0f630f4bd4acc255'),
(7, 'weixin_appSecret', 'de3446ec22cccfcc01755104052e0593');

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_dispatch`
--

CREATE TABLE IF NOT EXISTS `baijiacms_dispatch` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `sendtype` int(5) NOT NULL DEFAULT '1' COMMENT '0为快递，1为自提',
  `desc` text NOT NULL,
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_gold_order`
--

CREATE TABLE IF NOT EXISTS `baijiacms_gold_order` (
  `createtime` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_gold_teller`
--

CREATE TABLE IF NOT EXISTS `baijiacms_gold_teller` (
  `createtime` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0未审核-1拒绝1审核功成',
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `ordersn` varchar(20) DEFAULT NULL,
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_member`
--

CREATE TABLE IF NOT EXISTS `baijiacms_member` (
  `email` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `gold` double NOT NULL DEFAULT '0' COMMENT '余额',
  `outgoldinfo` varchar(1000) DEFAULT '0' COMMENT '提款信息 序列化',
  `outgold` double NOT NULL DEFAULT '0' COMMENT '已提取余额',
  `openid` varchar(50) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `avatar` varchar(200) DEFAULT '' COMMENT '用户头像',
  `experience` int(11) DEFAULT '0' COMMENT '账户经验值',
  `mobile` varchar(11) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `createtime` int(10) NOT NULL,
  `istemplate` tinyint(1) DEFAULT '0' COMMENT '是否为临时账户 1是，0为否',
  `status` tinyint(1) DEFAULT '1' COMMENT '0为禁用，1为可用',
  PRIMARY KEY (`openid`),
  KEY `idx_member_from_user` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `baijiacms_member`
--

INSERT INTO `baijiacms_member` (`email`, `credit`, `gold`, `outgoldinfo`, `outgold`, `openid`, `realname`, `avatar`, `experience`, `mobile`, `pwd`, `createtime`, `istemplate`, `status`) VALUES
('', 0, 0, '0', 0, '_t071316304436696777', '', '', 0, '', '2548022496f8ba86ba1f556ca9c34fb4', 1499934644, 1, 1),
('', 0, 0, '0', 0, '_t071409214754162292', '', '', 0, '', 'c41eb24b84c686946fa1942b475489a7', 1499995309, 1, 1),
('', 0, 0, '0', 0, '_t071509411721370849', '', '', 0, '', '10b2446d3a87f218f0d44aeeb7d38c6c', 1500082877, 1, 1),
('', 0, 0, '0', 0, '_t071509415782408142', '', '', 0, '', '7ef47cedc3cf1b545688ccef17b8cfed', 1500082917, 1, 1),
('', 0, 0, '0', 0, '_t071509420762970581', '', '', 0, '', 'b7dc317b4a3bf2937941b23e5840661d', 1500082927, 1, 1),
('', 0, 0, '0', 0, '_t071509421249913330', '', '', 0, '', '7a99d93f4103a8e0f1796b8130d0c6d3', 1500082932, 1, 1),
('', 0, 0, '0', 0, '_t071509421759839477', '', '', 0, '', '857fb8d4be011c80adabd3672214301a', 1500082937, 1, 1),
('', 0, 0, '0', 0, '_t071509422230522460', '', '', 0, '', '572db77188410e0cd6b5a8755716423c', 1500082942, 1, 1),
('', 0, 0, '0', 0, '_t071509422288173217', '', '', 0, '', 'ae64862963de122e67bd777f85f5bfb9', 1500082942, 1, 1),
('', 0, 0, '0', 0, '_t072009104281699523', '', '', 0, '', '835b143876332df7cb3c20b21c04b9eb', 1500513042, 1, 1),
('', 0, 0, '0', 0, '_t072009434542893066', '', '', 0, '', 'c92b26f68689c7af56b0b08721897732', 1500515025, 1, 1),
('', 0, 0, '0', 0, '_t072115495682350463', '', '', 0, '', 'e59dbe69c119b5d59e91b9b630dadc05', 1500623396, 1, 1),
('', 0, 0, '0', 0, '_t072115500011980285', '', '', 0, '', '180745e06ccac17de188c262befc7e80', 1500623400, 1, 1),
('', 0, 0, '0', 0, '_t072118334464917907', '', '', 0, '', 'e9c283d59b5d6f8035d3978c061661f5', 1500633224, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_member_paylog`
--

CREATE TABLE IF NOT EXISTS `baijiacms_member_paylog` (
  `createtime` int(10) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `account_fee` decimal(10,2) NOT NULL COMMENT '账户剩余积分或余额',
  `openid` varchar(40) NOT NULL,
  `type` varchar(30) NOT NULL COMMENT 'usegold使用金额 addgold充值金额 usecredit使用积分 addcredit充值积分',
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_modules`
--

CREATE TABLE IF NOT EXISTS `baijiacms_modules` (
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(30) NOT NULL,
  `group` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` decimal(5,2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isdisable` int(1) DEFAULT '0' COMMENT '模块是否禁用',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `baijiacms_modules`
--

INSERT INTO `baijiacms_modules` (`displayorder`, `icon`, `group`, `title`, `version`, `name`, `isdisable`) VALUES
(0, 'icon-bar-chart', 'addons', '数据报表', '1.00', 'addon6', 0),
(0, 'icon-money', 'addons', '积分兑换', '1.00', 'addon7', 0),
(0, 'icon-edit', 'addons', '微文章', '1.00', 'addon8', 0),
(0, 'icon-list-alt', 'addons', '微单页', '1.00', 'addon9', 0);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_modules_menu`
--

CREATE TABLE IF NOT EXISTS `baijiacms_modules_menu` (
  `href` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `baijiacms_modules_menu`
--

INSERT INTO `baijiacms_modules_menu` (`href`, `title`, `module`, `id`) VALUES
('index.php?mod=site&name=addon6&do=salereport', '零售生意报告', 'addon6', 1),
('index.php?mod=site&name=addon6&do=orderstatistics', '订单统计', 'addon6', 2),
('index.php?mod=site&name=addon6&do=saledetails', '商品销售明细', 'addon6', 3),
('index.php?mod=site&name=addon6&do=saletargets', '销售指标分析', 'addon6', 4),
('index.php?mod=site&name=addon6&do=productsaleranking', '商品销售排行', 'addon6', 5),
('index.php?mod=site&name=addon6&do=productsalestatistics', '商品访问与购买比', 'addon6', 6),
('index.php?mod=site&name=addon6&do=memberranking', '会员消费排行', 'addon6', 7),
('index.php?mod=site&name=addon6&do=userincreasestatistics', '会员增长统计', 'addon6', 8),
('index.php?mod=site&name=addon7&do=setting', '参数设置', 'addon7', 9),
('index.php?mod=site&name=addon7&do=addaward', '添加积分商品', 'addon7', 10),
('index.php?mod=site&name=addon7&do=awardlist', '积分商品列表', 'addon7', 11),
('index.php?mod=site&name=addon7&do=applyed', '兑换申请列表', 'addon7', 12),
('index.php?mod=site&name=addon8&do=article', '文章管理', 'addon8', 13),
('index.php?mod=site&name=addon8&do=category', '文章分类', 'addon8', 14),
('index.php?mod=site&name=addon9&do=singlepage', '单页设置', 'addon9', 15);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_paylog`
--

CREATE TABLE IF NOT EXISTS `baijiacms_paylog` (
  `paytype` varchar(30) NOT NULL,
  `pdate` text NOT NULL,
  `ptype` varchar(10) NOT NULL,
  `typename` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `baijiacms_paylog`
--

INSERT INTO `baijiacms_paylog` (`paytype`, `pdate`, `ptype`, `typename`, `id`) VALUES
('weixin', '', 'success', '微信支付记录', 1),
('weixin', '', 'error', '签名验证失败', 2),
('weixin', '', 'success', '微信支付记录', 3),
('weixin', '', 'error', '签名验证失败', 4),
('weixin', '', 'success', '微信支付记录', 5),
('weixin', '', 'error', '签名验证失败', 6),
('weixin', '', 'success', '微信支付记录', 7),
('weixin', '', 'error', '签名验证失败', 8);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_payment`
--

CREATE TABLE IF NOT EXISTS `baijiacms_payment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iscod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `baijiacms_payment`
--

INSERT INTO `baijiacms_payment` (`id`, `code`, `name`, `desc`, `order`, `configs`, `enabled`, `iscod`, `online`) VALUES
(1, 'weixin', '微信支付', '微信支付是集成在微信客户端的支付功能，用户可以通过手机完成快速的支付流程。微信支付以绑定银行卡的快捷支付为基础，向用户提供安全、快捷、高效的支付服务。', 0, 'a:2:{s:16:"weixin_pay_mchId";s:10:"1484706982";s:21:"weixin_pay_paySignKey";s:32:"wkLjvEcb2gnwh9sdZxPDWgMZBs0f7Wrj";}', 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_qq_qqfans`
--

CREATE TABLE IF NOT EXISTS `baijiacms_qq_qqfans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `qq_openid` varchar(50) NOT NULL,
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`qq_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_rank_model`
--

CREATE TABLE IF NOT EXISTS `baijiacms_rank_model` (
  `experience` int(11) DEFAULT '0',
  `rank_level` int(3) NOT NULL DEFAULT '0' COMMENT '等级',
  `rank_name` varchar(50) DEFAULT NULL COMMENT '等级名称',
  PRIMARY KEY (`rank_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `baijiacms_rank_model`
--

INSERT INTO `baijiacms_rank_model` (`experience`, `rank_level`, `rank_name`) VALUES
(0, 1, '普通会员');

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_rank_phb`
--

CREATE TABLE IF NOT EXISTS `baijiacms_rank_phb` (
  `rank_level` int(11) DEFAULT '0',
  `rank_name` varchar(50) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `rank_top` int(2) NOT NULL DEFAULT '0' COMMENT '名次',
  PRIMARY KEY (`rank_top`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_rule`
--

CREATE TABLE IF NOT EXISTS `baijiacms_rule` (
  `moddescription` varchar(20) NOT NULL,
  `moddo` varchar(20) NOT NULL DEFAULT '',
  `modname` varchar(20) NOT NULL DEFAULT '',
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `baijiacms_rule`
--

INSERT INTO `baijiacms_rule` (`moddescription`, `moddo`, `modname`, `id`) VALUES
('商品管理', 'goods', 'shop', 1),
('管理分类', 'category', 'shop', 2),
('订单管理', 'order', 'shop', 3),
('批量发货', 'orderbat', 'shop', 4),
('商城基础设置', 'config', 'shop', 5),
('首页广告', 'adv', 'shop', 6),
('模板设置', 'themes', 'shop', 7),
('支付方式', 'payment', 'modules', 8),
('快捷登录', 'thirdlogin', 'modules', 9),
('配送方式', 'dispatch', 'shop', 10),
('会员管理', 'list', 'member', 11),
('权限管理', 'user', 'user', 12),
('云服务', 'update', 'modules', 13),
('微信设置', 'weixin', 'weixin', 14),
('支付宝服务窗设置', 'alipay', 'alipay', 15),
('促销管理', 'bonus', 'bonus', 16);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_address`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `isdefault` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_adv`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_cart`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `goodstype` tinyint(1) NOT NULL DEFAULT '1',
  `session_id` varchar(50) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `optionid` int(10) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_category`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commission` int(10) unsigned DEFAULT '0' COMMENT '推荐该类商品所能获得的佣金',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `thumb` varchar(255) NOT NULL COMMENT '分类图片',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) NOT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_dispatch`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchname` varchar(50) NOT NULL,
  `sendtype` int(5) NOT NULL DEFAULT '1' COMMENT '0为快递，1为自提',
  `firstprice` decimal(10,2) NOT NULL,
  `secondprice` decimal(10,2) NOT NULL,
  `provance` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `firstweight` int(10) NOT NULL,
  `secondweight` int(10) NOT NULL,
  `express` varchar(50) NOT NULL,
  `deleted` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_dispatch_area`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_dispatch_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchid` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `provance` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_diymenu`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_diymenu` (
  `menu_type` varchar(10) NOT NULL,
  `torder` int(2) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `url` varchar(350) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0为实体，1为虚拟',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `goodssn` varchar(50) NOT NULL DEFAULT '',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productsn` varchar(50) NOT NULL DEFAULT '',
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` int(10) NOT NULL DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0' COMMENT '0 拍下减库存 1 付款减库存 2 永久不减',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `credit` int(11) DEFAULT '0',
  `hasoption` int(11) DEFAULT '0',
  `isnew` int(1) DEFAULT '0',
  `issendfree` int(11) DEFAULT NULL,
  `ishot` int(1) DEFAULT '0',
  `isfirst` int(1) DEFAULT '0',
  `isjingping` int(1) DEFAULT '0',
  `isdiscount` int(1) DEFAULT '0',
  `isrecommand` int(1) DEFAULT '0',
  `istime` int(1) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `remark` text,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods_comment`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods_comment` (
  `createtime` int(10) NOT NULL,
  `optionname` varchar(100) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `ordersn` varchar(20) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `comment` text,
  `rate` int(1) DEFAULT '0' COMMENT '0差评 1中评 2好评',
  `goodsid` int(10) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods_option`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods_piclist`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods_piclist` (
  `picurl` varchar(255) NOT NULL,
  `goodid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods_spec`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `displaytype` tinyint(3) unsigned NOT NULL,
  `content` text NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_goods_spec_item`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_goods_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_specid` (`specid`),
  KEY `indx_show` (`show`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_order`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '-6已退款 -5已退货 -4退货中， -3换货中， -2退款中，-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `sendtype` tinyint(1) unsigned NOT NULL COMMENT '0为快递，1为自提',
  `paytype` tinyint(1) NOT NULL COMMENT '1为余额，2为在线，3为到付',
  `paytypecode` varchar(30) NOT NULL COMMENT '0货到付款，1微支付，2支付宝付款，3余额支付，4积分支付',
  `paytypename` varchar(50) NOT NULL,
  `transid` varchar(50) NOT NULL DEFAULT '0' COMMENT '外部单号(微支付单号等)',
  `remark` varchar(1000) NOT NULL DEFAULT '',
  `expresscom` varchar(30) NOT NULL,
  `expresssn` varchar(50) NOT NULL,
  `express` varchar(30) NOT NULL,
  `addressid` int(10) unsigned NOT NULL,
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatchexpress` varchar(50) DEFAULT '',
  `dispatch` int(10) DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `address_address` varchar(100) NOT NULL,
  `address_area` varchar(10) NOT NULL,
  `address_city` varchar(10) NOT NULL,
  `address_province` varchar(10) NOT NULL,
  `address_realname` varchar(10) NOT NULL,
  `address_mobile` varchar(20) NOT NULL,
  `rsreson` varchar(500) DEFAULT '' COMMENT '退货款退原因',
  `isrest` int(1) NOT NULL DEFAULT '0',
  `updatetime` int(10) DEFAULT '0' COMMENT '订单更新时间',
  `hasbonus` int(1) DEFAULT '0' COMMENT '是否使用优惠券',
  `bonusprice` decimal(10,2) DEFAULT '0.00' COMMENT '优惠券抵消金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_order_goods`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `status` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2为标志删除，-1为审核无效，0为未申请，1为正在申请，2为审核通过',
  `content` text,
  `price` decimal(10,2) DEFAULT '0.00',
  `iscomment` int(1) DEFAULT '0' COMMENT '是否已评论0否1是',
  `total` int(10) unsigned NOT NULL DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `optionname` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_order_paylog`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_order_paylog` (
  `createtime` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_shop_pormotions`
--

CREATE TABLE IF NOT EXISTS `baijiacms_shop_pormotions` (
  `description` varchar(200) DEFAULT NULL COMMENT '描述(预留)',
  `endtime` int(10) NOT NULL COMMENT '束结时间',
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `condition` decimal(10,2) NOT NULL COMMENT '条件',
  `promoteType` int(11) NOT NULL COMMENT '0 按订单数包邮 1满额包邮',
  `pname` varchar(100) NOT NULL COMMENT '名称',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_thirdlogin`
--

CREATE TABLE IF NOT EXISTS `baijiacms_thirdlogin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_code` (`code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `baijiacms_thirdlogin`
--

INSERT INTO `baijiacms_thirdlogin` (`id`, `code`, `name`, `desc`, `configs`, `enabled`) VALUES
(1, 'weixin', '微信快捷登录', '', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_user`
--

CREATE TABLE IF NOT EXISTS `baijiacms_user` (
  `createtime` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `baijiacms_user`
--

INSERT INTO `baijiacms_user` (`createtime`, `password`, `username`, `id`) VALUES
(1499933758, 'e10adc3949ba59abbe56e057f20f883e', 'admin', 1);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_user_rule`
--

CREATE TABLE IF NOT EXISTS `baijiacms_user_rule` (
  `moddo` varchar(15) NOT NULL,
  `modname` varchar(15) NOT NULL,
  `uid` int(10) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `baijiacms_user_rule`
--

INSERT INTO `baijiacms_user_rule` (`moddo`, `modname`, `uid`, `id`) VALUES
('goods', 'shop', 1, 1),
('category', 'shop', 1, 2),
('order', 'shop', 1, 3),
('orderbat', 'shop', 1, 4),
('config', 'shop', 1, 5),
('adv', 'shop', 1, 6),
('themes', 'shop', 1, 7),
('payment', 'modules', 1, 8),
('thirdlogin', 'modules', 1, 9),
('dispatch', 'shop', 1, 10),
('list', 'member', 1, 11),
('user', 'user', 1, 12),
('update', 'modules', 1, 13),
('weixin', 'weixin', 1, 14),
('alipay', 'alipay', 1, 15),
('bonus', 'bonus', 1, 16);

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_weixin_rule`
--

CREATE TABLE IF NOT EXISTS `baijiacms_weixin_rule` (
  `url` varchar(500) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ruletype` int(11) NOT NULL COMMENT '1文本回复 2图文回复',
  `content` text,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `baijiacms_weixin_wxfans`
--

CREATE TABLE IF NOT EXISTS `baijiacms_weixin_wxfans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `weixin_openid` varchar(50) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否订阅',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`weixin_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
