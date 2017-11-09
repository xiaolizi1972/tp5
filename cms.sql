/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-08 17:48:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tp_ad
-- ----------------------------
DROP TABLE IF EXISTS `tp_ad`;
CREATE TABLE `tp_ad` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `p_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '广告位置ID',
  `ad_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告名称',
  `ad_link` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `desc` varchar(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `img` text NOT NULL COMMENT '图片地址',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示',
  `orderby` smallint(6) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`ad_id`),
  KEY `ad_name` (`ad_name`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_ad
-- ----------------------------

-- ----------------------------
-- Table structure for tp_admin
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
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

-- ----------------------------
-- Records of tp_admin
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1', 'admin', '$2y$10$saJ/umhxma.8NlJlaWInx.jiYRUlmwK51hmTFGcyVpzH8fZmRZMhe', '0', '', '13402858313', '1', '1', '1', '1506586284', '1506586284', null);
INSERT INTO `tp_admin` VALUES ('2', 'xiaolizi', '$2y$10$5IX.W8B2FvFivMzoy/D8Q.Y0ZOzm3LUzj.C2BWlvLJ/AYWJWHLUPi', '0', '', '13402858514', '2', '0', '1', '1506586352', '1506587568', null);

-- ----------------------------
-- Table structure for tp_config
-- ----------------------------
DROP TABLE IF EXISTS `tp_config`;
CREATE TABLE `tp_config` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT COMMENT '表id',
  `name` varchar(50) DEFAULT NULL COMMENT '配置的key键名',
  `value` varchar(255) DEFAULT NULL COMMENT '配置的val值',
  `desc` varchar(255) DEFAULT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_config
-- ----------------------------

-- ----------------------------
-- Table structure for tp_goods
-- ----------------------------
DROP TABLE IF EXISTS `tp_goods`;
CREATE TABLE `tp_goods` (
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

-- ----------------------------
-- Records of tp_goods
-- ----------------------------

-- ----------------------------
-- Table structure for tp_menu
-- ----------------------------
DROP TABLE IF EXISTS `tp_menu`;
CREATE TABLE `tp_menu` (
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_menu
-- ----------------------------
INSERT INTO `tp_menu` VALUES ('1', 'glyphicon glyphicon-user', '0', '管理员', '0', '1', 'admin/admin/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('2', '', '1', '管理员列表', '0', '1', 'admin/admin/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('3', 'glyphicon glyphicon-lock', '0', '权限管理', '0', '1', 'admin/rule/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('4', '', '3', '权限列表', '0', '1', 'admin/rule/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('5', 'fa fa-group  ', '0', '权限组', '0', '1', 'admin/role/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('6', '', '5', '权限组列表', '0', '1', 'admin/role/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('7', 'glyphicon glyphicon-th-list', '0', '菜单管理', '0', '1', 'admin/menu/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('8', null, '7', '菜单列表', '0', '1', 'admin/menu/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('9', '', '1', '管理员日志', '0', '1', 'admin/admin/log', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('10', '', '0', '添加测试', '0', '1', 'admin/art/index', '0', '0', '1506496873');
INSERT INTO `tp_menu` VALUES ('11', '', '11', 'adfasdf', '0', '1', 'artisa', '0', '0', '1');
INSERT INTO `tp_menu` VALUES ('12', '', '10', '添加', '0', '1', 'admin/index/index', '0', '0', '1506496870');
INSERT INTO `tp_menu` VALUES ('13', 'glyphicon glyphicon-cog', '0', '系统配置', '0', '1', 'admin/system/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('14', '', '13', '系统列表', '0', '1', 'admin/system/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('15', '', '13', '支付列表', '0', '1', 'admin/pay/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('16', 'glyphicon glyphicon-file', '0', '文章管理', '0', '1', 'admin/article/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('17', '', '16', '文章列表', '0', '1', 'admin/article/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('18', '', '16', '文章分类', '0', '1', 'admin/category/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('19', 'glyphicon glyphicon-bed', '0', '广告管理', '0', '1', 'admin/advs/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('20', '', '19', '广告列表', '0', '1', 'admin/advs/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('21', '', '19', '广告位置', '0', '1', 'admin/position/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('22', '', '16', '删除文章', '0', '0', 'admin/article/delete', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('23', '', '16', '文章状态', '0', '0', 'admin/article/status', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('24', '', '16', '文章分类', '0', '0', 'admin/category/index', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('25', '', '16', '添加分类', '0', '0', 'admin/category/create', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('26', '', '16', '保存分类', '0', '0', 'admin/category/save', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('27', '', '16', '编辑分类', '0', '0', 'admin/category/edit', '0', '0', null);
INSERT INTO `tp_menu` VALUES ('28', '', '16', '修改分类', '0', '0', 'admin/category', '0', '0', null);

-- ----------------------------
-- Table structure for tp_pay
-- ----------------------------
DROP TABLE IF EXISTS `tp_pay`;
CREATE TABLE `tp_pay` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '支付id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '支付方式',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '支付标题',
  `app_id` varchar(100) NOT NULL DEFAULT '' COMMENT 'appid',
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT '商户私钥',
  `return_url` varchar(255) NOT NULL DEFAULT '' COMMENT '同步回调地址',
  `cover_id` int(10) NOT NULL DEFAULT '0' COMMENT '封面图',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_pay
-- ----------------------------
INSERT INTO `tp_pay` VALUES ('1', 'aliPay', '支付宝支付', '', '', '', '0', '1', null, null, null);
INSERT INTO `tp_pay` VALUES ('2', 'wxPay', '微信支付', '', '', '', '0', '1', null, null, null);
INSERT INTO `tp_pay` VALUES ('3', 'k', 'asdf', '4845415', 'k', 'kk', '0', '0', null, '1509690569', '1509690569');
INSERT INTO `tp_pay` VALUES ('4', 'YlPay', '银联支付', '125412', '221245212', 'www.baid.com', '124512', '0', null, '1509930444', '1509930444');

-- ----------------------------
-- Table structure for tp_position
-- ----------------------------
DROP TABLE IF EXISTS `tp_position`;
CREATE TABLE `tp_position` (
  `position_id` int(3) unsigned NOT NULL AUTO_INCREMENT COMMENT '位置id',
  `position_name` varchar(60) NOT NULL DEFAULT '' COMMENT '广告位置名称',
  `position_desc` varchar(255) NOT NULL DEFAULT '' COMMENT '广告描述',
  `status` tinyint(1) DEFAULT '0' COMMENT '0关闭1开启',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tp_position
-- ----------------------------

-- ----------------------------
-- Table structure for tp_role
-- ----------------------------
DROP TABLE IF EXISTS `tp_role`;
CREATE TABLE `tp_role` (
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

-- ----------------------------
-- Records of tp_role
-- ----------------------------
INSERT INTO `tp_role` VALUES ('1', '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69', null, '1', '1506586250', '1509935657', null);
INSERT INTO `tp_role` VALUES ('2', '普通组', '1', null, '1', '1506587397', '1506588632', null);

-- ----------------------------
-- Table structure for tp_rule
-- ----------------------------
DROP TABLE IF EXISTS `tp_rule`;
CREATE TABLE `tp_rule` (
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
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of tp_rule
-- ----------------------------
INSERT INTO `tp_rule` VALUES ('1', '0', '管理员', '1', 'admin/admin/index', '1506578793', '1506588859', null);
INSERT INTO `tp_rule` VALUES ('2', '1', '管理员列表', '1', 'admin/admin/index', '1506578813', '1506578813', null);
INSERT INTO `tp_rule` VALUES ('3', '1', '添加管理员', '1', 'admin/admin/create', '1506578833', '1506578833', null);
INSERT INTO `tp_rule` VALUES ('4', '1', '保存管理员', '1', 'admin/admin/save', '1506578852', '1506578852', null);
INSERT INTO `tp_rule` VALUES ('5', '1', '编辑管理员', '1', 'admin/admin/edit', '1506578873', '1506578873', null);
INSERT INTO `tp_rule` VALUES ('6', '1', '修改管理员', '1', 'admin/admin/update', '1506578904', '1506578904', null);
INSERT INTO `tp_rule` VALUES ('7', '1', '删除管理员', '1', 'admin/admin/delete', '1506578924', '1506578924', null);
INSERT INTO `tp_rule` VALUES ('8', '1', '管理员状态', '1', 'admin/admin/status', '1506578940', '1506578940', null);
INSERT INTO `tp_rule` VALUES ('9', '0', '权限管理', '1', 'admin/rule/index', '1506578960', '1506588867', null);
INSERT INTO `tp_rule` VALUES ('10', '9', '权限列表', '1', 'admin/rule/index', '1506578973', '1506578973', null);
INSERT INTO `tp_rule` VALUES ('11', '9', '添加权限', '1', 'admin/rule/save', '1506578999', '1506578999', null);
INSERT INTO `tp_rule` VALUES ('12', '9', '编辑权限', '1', 'admin/rule/edit', '1506579024', '1506579024', null);
INSERT INTO `tp_rule` VALUES ('13', '9', '删除权限', '1', 'admin/rule/delete', '1506579056', '1506579056', null);
INSERT INTO `tp_rule` VALUES ('14', '9', '权限状态', '1', 'admin/rule/status', '1506579076', '1506579076', null);
INSERT INTO `tp_rule` VALUES ('15', '0', '权限组管理', '1', 'admin/role/index', '1506579110', '1506588876', null);
INSERT INTO `tp_rule` VALUES ('16', '15', '权限组列表', '1', 'admin/role/index', '1506579127', '1506579127', null);
INSERT INTO `tp_rule` VALUES ('17', '15', '添加权限组', '1', 'admin/role/create', '1506579157', '1506579157', null);
INSERT INTO `tp_rule` VALUES ('18', '15', '保存权限组', '1', 'admin/role/save', '1506579185', '1506579185', null);
INSERT INTO `tp_rule` VALUES ('19', '15', '编辑权限组', '1', 'admin/role/edit', '1506579210', '1506579210', null);
INSERT INTO `tp_rule` VALUES ('20', '15', '修改权限组', '1', 'admin/role/update', '1506579234', '1506579234', null);
INSERT INTO `tp_rule` VALUES ('21', '15', '删除权限组', '1', 'admin/role/delete', '1506579275', '1506579275', null);
INSERT INTO `tp_rule` VALUES ('22', '15', '权限组状态', '1', 'admin/admin/status', '1506579301', '1506579301', null);
INSERT INTO `tp_rule` VALUES ('23', '0', '菜单管理', '1', 'admin/menu/index', '1506579348', '1506588884', null);
INSERT INTO `tp_rule` VALUES ('24', '23', '菜单列表', '1', 'admin/menu/index', '1506579366', '1506579366', null);
INSERT INTO `tp_rule` VALUES ('25', '23', '添加菜单', '1', 'admin/menu/create', '1506579381', '1506579434', null);
INSERT INTO `tp_rule` VALUES ('26', '23', '保存菜单', '1', 'admin/menu/save', '1506579471', '1506579471', null);
INSERT INTO `tp_rule` VALUES ('27', '23', '编辑菜单', '1', 'admin/menu/edit', '1506579489', '1506579489', null);
INSERT INTO `tp_rule` VALUES ('28', '23', '修改菜单', '1', 'admin/menu/update', '1506579510', '1506579510', null);
INSERT INTO `tp_rule` VALUES ('29', '23', '删除权限', '1', 'admin/menu/delete', '1506579565', '1506579565', null);
INSERT INTO `tp_rule` VALUES ('30', '23', '菜单状态', '1', 'admin/menu/status', '1506579585', '1506579585', null);
INSERT INTO `tp_rule` VALUES ('31', '0', '系统配置', '1', 'admin/system/index', '1509673788', '1509673788', null);
INSERT INTO `tp_rule` VALUES ('32', '31', '配置列表', '1', 'admin/system/index', '1509673809', '1509673809', null);
INSERT INTO `tp_rule` VALUES ('33', '31', '添加配置', '1', 'admin/system/create', '1509673842', '1509673842', null);
INSERT INTO `tp_rule` VALUES ('34', '31', '保存配置', '1', 'admin/system/save', '1509673863', '1509673863', null);
INSERT INTO `tp_rule` VALUES ('35', '31', '编辑配置', '1', 'admin/system/edit', '1509673883', '1509673883', null);
INSERT INTO `tp_rule` VALUES ('36', '31', '修改配置', '1', 'admin/system/update', '1509673899', '1509673899', null);
INSERT INTO `tp_rule` VALUES ('37', '31', '删除配置', '1', 'admin/system/delete', '1509673917', '1509673917', null);
INSERT INTO `tp_rule` VALUES ('38', '31', '配置状态', '1', 'admin/system/status', '1509673933', '1509673933', null);
INSERT INTO `tp_rule` VALUES ('39', '31', '支付列表', '1', 'admin/pay/index', '1509675085', '1509675085', null);
INSERT INTO `tp_rule` VALUES ('40', '0', '文章管理', '1', 'admin/article/index', '1509931607', '1509931607', null);
INSERT INTO `tp_rule` VALUES ('41', '40', '文章列表', '1', 'admin/article/index', '1509931625', '1509931625', null);
INSERT INTO `tp_rule` VALUES ('42', '40', '添加文章', '1', 'admin/article/create', '1509931638', '1509931638', null);
INSERT INTO `tp_rule` VALUES ('43', '40', '保存文章', '1', 'admin/article/save', '1509931674', '1509931674', null);
INSERT INTO `tp_rule` VALUES ('44', '40', '编辑文章', '1', 'admin/article/edit', '1509932018', '1509932018', null);
INSERT INTO `tp_rule` VALUES ('45', '40', '修改文章', '1', 'admin/article/update', '1509932039', '1509932039', null);
INSERT INTO `tp_rule` VALUES ('46', '40', '删除文章', '1', 'admin/article/delete', '1509932064', '1509932064', null);
INSERT INTO `tp_rule` VALUES ('47', '40', '文章状态', '1', 'admin/article/status', '1509932107', '1509932107', null);
INSERT INTO `tp_rule` VALUES ('48', '40', '文章分类', '1', 'admin/category/index', '1509932131', '1509932131', null);
INSERT INTO `tp_rule` VALUES ('49', '40', '添加分类', '1', 'admin/category/create', '1509932187', '1509932187', null);
INSERT INTO `tp_rule` VALUES ('50', '40', '保存分类', '1', 'admin/category/save', '1509932209', '1509932241', null);
INSERT INTO `tp_rule` VALUES ('51', '40', '编辑分类', '1', 'admin/category/edit', '1509932272', '1509932272', null);
INSERT INTO `tp_rule` VALUES ('52', '40', '修改分类', '1', 'admin/category/update', '1509932294', '1509932294', null);
INSERT INTO `tp_rule` VALUES ('53', '40', '删除分类', '1', 'admin/category/delete', '1509932315', '1509932315', null);
INSERT INTO `tp_rule` VALUES ('54', '40', '分类状态', '1', 'admin/category/status', '1509932331', '1509932331', null);
INSERT INTO `tp_rule` VALUES ('55', '0', '广告管理', '1', 'admin/advs/index', '1509935098', '1509935098', null);
INSERT INTO `tp_rule` VALUES ('56', '55', '广告列表', '1', 'admin/advs/index', '1509935115', '1509935115', null);
INSERT INTO `tp_rule` VALUES ('57', '55', '添加广告', '1', 'admin/advs/create', '1509935135', '1509935135', null);
INSERT INTO `tp_rule` VALUES ('58', '55', '保存广告', '1', 'admin/advs/save', '1509935154', '1509935154', null);
INSERT INTO `tp_rule` VALUES ('59', '55', '编辑广告', '1', 'admin/advs/edit', '1509935178', '1509935178', null);
INSERT INTO `tp_rule` VALUES ('60', '55', '修改广告', '1', 'admin/advs/update', '1509935197', '1509935197', null);
INSERT INTO `tp_rule` VALUES ('61', '55', '删除广告', '1', 'admin/advs/delete', '1509935212', '1509935212', null);
INSERT INTO `tp_rule` VALUES ('62', '55', '广告状态', '1', 'admin/advs/status', '1509935314', '1509935314', null);
INSERT INTO `tp_rule` VALUES ('63', '55', '广告位置', '1', 'admin/position/index', '1509935477', '1509935477', null);
INSERT INTO `tp_rule` VALUES ('64', '55', '添加广告位', '1', 'admin/position/create', '1509935502', '1509935502', null);
INSERT INTO `tp_rule` VALUES ('65', '55', '保存广告位', '1', 'admin/position/save', '1509935522', '1509935522', null);
INSERT INTO `tp_rule` VALUES ('66', '55', '编辑广告位', '1', 'admin/position/edit', '1509935546', '1509935546', null);
INSERT INTO `tp_rule` VALUES ('67', '55', '修改广告位', '1', 'admin/position/update', '1509935565', '1509935565', null);
INSERT INTO `tp_rule` VALUES ('68', '55', '删除广告位', '1', 'admin/position/delete', '1509935588', '1509935588', null);
INSERT INTO `tp_rule` VALUES ('69', '55', '广告位状态', '1', 'admin/position/status', '1509935626', '1509935626', null);

-- ----------------------------
-- Table structure for tp_sms_log
-- ----------------------------
DROP TABLE IF EXISTS `tp_sms_log`;
CREATE TABLE `tp_sms_log` (
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

-- ----------------------------
-- Records of tp_sms_log
-- ----------------------------

-- ----------------------------
-- Table structure for tp_users
-- ----------------------------
DROP TABLE IF EXISTS `tp_users`;
CREATE TABLE `tp_users` (
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

-- ----------------------------
-- Records of tp_users
-- ----------------------------
INSERT INTO `tp_users` VALUES ('1', '小李子', '123456', '0.00', '0', '0', '', '', '0', '0', '0', null, '1506066544');
INSERT INTO `tp_users` VALUES ('2', '小李', '', '0.00', '0', '0', '', '', '0', '0', null, null, null);
