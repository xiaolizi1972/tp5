-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.1.19-MariaDB - mariadb.org binary distribution
-- 服务器操作系统:                      Win32
-- HeidiSQL 版本:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 cms 的数据库结构
DROP DATABASE IF EXISTS `cms`;
CREATE DATABASE IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cms`;

-- 导出  表 cms.tp_admin 结构
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE IF NOT EXISTS `tp_admin` (
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `last_login` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `role_id` smallint(5) DEFAULT '0' COMMENT '角色id',
  `avatar_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '头像id',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态1正常，0禁用',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) unsigned DEFAULT NULL COMMENT '软删除',
  PRIMARY KEY (`admin_id`),
  KEY `user_name` (`user_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_admin 的数据：~0 rows (大约)
DELETE FROM `tp_admin`;
/*!40000 ALTER TABLE `tp_admin` DISABLE KEYS */;
INSERT INTO `tp_admin` (`admin_id`, `user_name`, `password`, `last_login`, `last_ip`, `phone`, `role_id`, `avatar_id`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
	(1, 'admin', '$2y$10$saJ/umhxma.8NlJlaWInx.jiYRUlmwK51hmTFGcyVpzH8fZmRZMhe', 0, '', '13402858313', 1, 0, 1, 1506586284, 1506586284, NULL),
	(2, 'xiaolizi', '$2y$10$5IX.W8B2FvFivMzoy/D8Q.Y0ZOzm3LUzj.C2BWlvLJ/AYWJWHLUPi', 0, '', '13402858514', 2, 0, 1, 1506586352, 1506587568, NULL);
/*!40000 ALTER TABLE `tp_admin` ENABLE KEYS */;

-- 导出  表 cms.tp_goods 结构
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE IF NOT EXISTS `tp_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cat_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `extend_cat_id` int(11) DEFAULT '0' COMMENT '扩展分类id',
  `goods_sn` varchar(60) NOT NULL DEFAULT '' COMMENT '商品编号',
  `goods_name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id',
  `store_count` smallint(5) unsigned NOT NULL DEFAULT '10' COMMENT '库存数量',
  `comment_count` smallint(5) DEFAULT '0' COMMENT '商品评论数',
  `weight` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品重量克为单位',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '本店价',
  `cost_price` decimal(10,2) DEFAULT '0.00' COMMENT '商品成本价',
  `price_ladder` text COMMENT '价格阶梯',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '商品关键词',
  `goods_remark` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_content` text COMMENT '商品详细描述',
  `original_img` varchar(255) NOT NULL DEFAULT '' COMMENT '商品上传原始图',
  `is_real` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否为实物',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架',
  `is_free_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否包邮0否1是',
  `on_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品上架时间',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '50' COMMENT '商品排序',
  `is_recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品',
  `is_hot` tinyint(1) DEFAULT '0' COMMENT '是否热卖',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `goods_type` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类型id，取值表goods_type的cat_id',
  `spec_type` smallint(5) DEFAULT '0' COMMENT '商品规格类型，取值表goods_type的cat_id',
  `give_integral` mediumint(8) DEFAULT '0' COMMENT '购买商品赠送积分',
  `exchange_integral` int(10) NOT NULL DEFAULT '0' COMMENT '积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置',
  `suppliers_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '供货商ID',
  `sales_sum` int(11) DEFAULT '0' COMMENT '商品销量',
  `prom_type` tinyint(1) DEFAULT '0' COMMENT '0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠,4预售',
  `prom_id` int(11) DEFAULT '0' COMMENT '优惠活动id',
  `commission` decimal(10,2) DEFAULT '0.00' COMMENT '佣金用于分销分成',
  `spu` varchar(128) DEFAULT '' COMMENT 'SPU',
  `sku` varchar(128) DEFAULT '' COMMENT 'SKU',
  `shipping_area_ids` varchar(255) NOT NULL DEFAULT '' COMMENT '配送物流shipping_area_id,以逗号分隔',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_number` (`store_count`),
  KEY `goods_weight` (`weight`),
  KEY `sort_order` (`sort`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_goods 的数据：~0 rows (大约)
DELETE FROM `tp_goods`;
/*!40000 ALTER TABLE `tp_goods` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_goods` ENABLE KEYS */;

-- 导出  表 cms.tp_menu 结构
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE IF NOT EXISTS `tp_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(30) DEFAULT NULL,
  `pid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(60) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_menu 的数据：12 rows
DELETE FROM `tp_menu`;
/*!40000 ALTER TABLE `tp_menu` DISABLE KEYS */;
INSERT INTO `tp_menu` (`id`, `icon`, `pid`, `name`, `sort`, `status`, `url`, `create_time`, `update_time`, `delete_time`) VALUES
	(1, 'glyphicon glyphicon-user', 0, '管理员', 0, 1, 'admin/admin/index', 0, 0, NULL),
	(2, '', 1, '管理员列表', 0, 1, 'admin/admin/index', 0, 0, NULL),
	(3, 'glyphicon glyphicon-lock', 0, '权限管理', 0, 1, 'admin/rule/index', 0, 0, NULL),
	(4, '', 3, '权限列表', 0, 1, 'admin/rule/index', 0, 0, NULL),
	(5, 'glyphicon glyphicon-cog', 0, '权限组', 0, 1, 'admin/role/index', 0, 0, NULL),
	(6, '', 5, '权限组列表', 0, 1, 'admin/role/index', 0, 0, NULL),
	(7, 'glyphicon glyphicon-th-list', 0, '菜单管理', 0, 1, 'admin/menu/index', 0, 0, NULL),
	(8, NULL, 7, '菜单列表', 0, 1, 'admin/menu/index', 0, 0, NULL),
	(9, '', 1, '管理员日志', 0, 1, 'admin/admin/log', 0, 0, NULL),
	(10, '', 0, '添加测试', 0, 1, 'admin/art/index', 0, 0, 1506496873),
	(11, '', 11, 'adfasdf', 0, 1, 'artisa', 0, 0, 1),
	(12, '', 10, '添加', 0, 1, 'admin/index/index', 0, 0, 1506496870);
/*!40000 ALTER TABLE `tp_menu` ENABLE KEYS */;

-- 导出  表 cms.tp_role 结构
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE IF NOT EXISTS `tp_role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '角色ID',
  `name` varchar(30) DEFAULT NULL COMMENT '角色名称',
  `rule_id` text COMMENT '权限列表',
  `desc` varchar(255) DEFAULT NULL COMMENT '角色描述',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(11) DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT '0' COMMENT '修改时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_role 的数据：~1 rows (大约)
DELETE FROM `tp_role`;
/*!40000 ALTER TABLE `tp_role` DISABLE KEYS */;
INSERT INTO `tp_role` (`role_id`, `name`, `rule_id`, `desc`, `status`, `create_time`, `update_time`, `delete_time`) VALUES
	(1, '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', NULL, 1, 1506586250, 1506586250, NULL),
	(2, '普通组', '1', NULL, 1, 1506587397, 1506588632, NULL);
/*!40000 ALTER TABLE `tp_role` ENABLE KEYS */;

-- 导出  表 cms.tp_rule 结构
DROP TABLE IF EXISTS `tp_rule`;
CREATE TABLE IF NOT EXISTS `tp_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(60) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- 正在导出表  cms.tp_rule 的数据：30 rows
DELETE FROM `tp_rule`;
/*!40000 ALTER TABLE `tp_rule` DISABLE KEYS */;
INSERT INTO `tp_rule` (`id`, `pid`, `name`, `status`, `url`, `create_time`, `update_time`, `delete_time`) VALUES
	(1, 0, '管理员', 1, 'admin/admin/index', 1506578793, 1506588859, NULL),
	(2, 1, '管理员列表', 1, 'admin/admin/index', 1506578813, 1506578813, NULL),
	(3, 1, '添加管理员', 1, 'admin/admin/create', 1506578833, 1506578833, NULL),
	(4, 1, '保存管理员', 1, 'admin/admin/save', 1506578852, 1506578852, NULL),
	(5, 1, '编辑管理员', 1, 'admin/admin/edit', 1506578873, 1506578873, NULL),
	(6, 1, '修改管理员', 1, 'admin/admin/update', 1506578904, 1506578904, NULL),
	(7, 1, '删除管理员', 1, 'admin/admin/delete', 1506578924, 1506578924, NULL),
	(8, 1, '管理员状态', 1, 'admin/admin/status', 1506578940, 1506578940, NULL),
	(9, 0, '权限管理', 1, 'admin/rule/index', 1506578960, 1506588867, NULL),
	(10, 9, '权限列表', 1, 'admin/rule/index', 1506578973, 1506578973, NULL),
	(11, 9, '添加权限', 1, 'admin/rule/create', 1506578999, 1506578999, NULL),
	(12, 9, '编辑权限', 1, 'admin/rule/edit', 1506579024, 1506579024, NULL),
	(13, 9, '删除权限', 1, 'admin/rule/delete', 1506579056, 1506579056, NULL),
	(14, 9, '权限状态', 1, 'admin/rule/status', 1506579076, 1506579076, NULL),
	(15, 0, '权限组管理', 1, 'admin/role/index', 1506579110, 1506588876, NULL),
	(16, 15, '权限组列表', 1, 'admin/role/index', 1506579127, 1506579127, NULL),
	(17, 15, '添加权限组', 1, 'admin/role/create', 1506579157, 1506579157, NULL),
	(18, 15, '保存权限组', 1, 'admin/role/save', 1506579185, 1506579185, NULL),
	(19, 15, '编辑权限组', 1, 'admin/role/edit', 1506579210, 1506579210, NULL),
	(20, 15, '修改权限组', 1, 'admin/role/update', 1506579234, 1506579234, NULL),
	(21, 15, '删除权限组', 1, 'admin/role/delete', 1506579275, 1506579275, NULL),
	(22, 15, '权限组状态', 1, 'admin/admin/status', 1506579301, 1506579301, NULL),
	(23, 0, '菜单管理', 1, 'admin/menu/index', 1506579348, 1506588884, NULL),
	(24, 23, '菜单列表', 1, 'admin/menu/index', 1506579366, 1506579366, NULL),
	(25, 23, '添加菜单', 1, 'admin/menu/create', 1506579381, 1506579434, NULL),
	(26, 23, '保存菜单', 1, 'admin/menu/save', 1506579471, 1506579471, NULL),
	(27, 23, '编辑菜单', 1, 'admin/menu/edit', 1506579489, 1506579489, NULL),
	(28, 23, '修改菜单', 1, 'admin/menu/update', 1506579510, 1506579510, NULL),
	(29, 23, '删除权限', 1, 'admin/menu/delete', 1506579565, 1506579565, NULL),
	(30, 23, '菜单状态', 1, 'admin/menu/status', 1506579585, 1506579585, NULL);
/*!40000 ALTER TABLE `tp_rule` ENABLE KEYS */;

-- 导出  表 cms.tp_sms_log 结构
DROP TABLE IF EXISTS `tp_sms_log`;
CREATE TABLE IF NOT EXISTS `tp_sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '表id',
  `mobile` varchar(11) DEFAULT '' COMMENT '手机号',
  `session_id` varchar(128) DEFAULT '' COMMENT 'session_id',
  `add_time` int(11) DEFAULT '0' COMMENT '发送时间',
  `code` varchar(10) DEFAULT '' COMMENT '验证码',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '发送状态,1:成功,0:失败',
  `msg` varchar(255) DEFAULT NULL COMMENT '短信内容',
  `scene` int(1) DEFAULT '0' COMMENT '发送场景,1:用户注册,2:找回密码,3:客户下单,4:客户支付,5:商家发货,6:身份验证',
  `error_msg` text COMMENT '发送短信异常内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_sms_log 的数据：~0 rows (大约)
DELETE FROM `tp_sms_log`;
/*!40000 ALTER TABLE `tp_sms_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tp_sms_log` ENABLE KEYS */;

-- 导出  表 cms.tp_users 结构
DROP TABLE IF EXISTS `tp_users`;
CREATE TABLE IF NOT EXISTS `tp_users` (
  `user_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `user_name` varchar(60) NOT NULL DEFAULT '' COMMENT '邮件',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '用户金额',
  `address_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '默认收货地址',
  `last_login` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_ip` varchar(15) NOT NULL DEFAULT '' COMMENT '最后登录ip',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `city` int(6) DEFAULT '0' COMMENT '市区',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `email` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- 正在导出表  cms.tp_users 的数据：~2 rows (大约)
DELETE FROM `tp_users`;
/*!40000 ALTER TABLE `tp_users` DISABLE KEYS */;
INSERT INTO `tp_users` (`user_id`, `user_name`, `password`, `user_money`, `address_id`, `last_login`, `last_ip`, `mobile`, `status`, `city`, `delete_time`, `create_time`, `update_time`) VALUES
	(1, '小李子', '123456', 0.00, 0, 0, '', '', 0, 0, 0, NULL, 1506066544),
	(2, '小李', '', 0.00, 0, 0, '', '', 0, 0, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tp_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
