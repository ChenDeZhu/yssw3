/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : station

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-24 15:55:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for nr_banner
-- ----------------------------
DROP TABLE IF EXISTS `nr_banner`;
CREATE TABLE `nr_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blogo` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `bdate` datetime DEFAULT NULL,
  `sort` smallint(1) DEFAULT NULL COMMENT '排序',
  `remarks` varchar(255) DEFAULT NULL COMMENT '幻灯备注',
  `url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_banner
-- ----------------------------
INSERT INTO `nr_banner` VALUES ('9', '/Uploads/Logos/bpic_9.png', '2017-04-24 15:43:33', '0', '', '');

-- ----------------------------
-- Table structure for nr_cate
-- ----------------------------
DROP TABLE IF EXISTS `nr_cate`;
CREATE TABLE `nr_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `cname` varchar(20) DEFAULT NULL COMMENT '分类名称',
  `cdate` datetime DEFAULT NULL COMMENT '更新时间',
  `sort` smallint(2) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_cate
-- ----------------------------
INSERT INTO `nr_cate` VALUES ('14', '公司新闻', '2017-04-22 15:44:31', '1');
INSERT INTO `nr_cate` VALUES ('15', '行业资讯', '2017-04-24 14:06:18', '2');

-- ----------------------------
-- Table structure for nr_manager
-- ----------------------------
DROP TABLE IF EXISTS `nr_manager`;
CREATE TABLE `nr_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  `loginnum` int(6) DEFAULT '0' COMMENT '登录次数',
  `lastlogintime` datetime DEFAULT NULL COMMENT '最后登录时间',
  `lastloginip` varchar(15) DEFAULT NULL COMMENT '最后登录ip',
  `flag` int(1) DEFAULT '1' COMMENT '状态',
  `memo` varchar(100) DEFAULT NULL COMMENT '备注',
  `joindate` datetime DEFAULT NULL COMMENT '注册日期',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员';

-- ----------------------------
-- Records of nr_manager
-- ----------------------------
INSERT INTO `nr_manager` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '2017-04-24 11:24:34', '127.0.0.1', '1', '管理员默认账户', '2016-12-01 12:00:00');

-- ----------------------------
-- Table structure for nr_news
-- ----------------------------
DROP TABLE IF EXISTS `nr_news`;
CREATE TABLE `nr_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `ndate` datetime DEFAULT NULL,
  `nlogo` varchar(255) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL COMMENT '分类ID',
  `hits` int(11) DEFAULT '0' COMMENT '点击量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_news
-- ----------------------------
INSERT INTO `nr_news` VALUES ('25', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:24:15', '/Uploads/Logos/npic_25.png', '14', '0');
INSERT INTO `nr_news` VALUES ('26', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。大数据库的环境爱神的箭爱仕达可视电话氨基酸的黄金爱看书的开始的就卡死的</p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20170424/1493014894562425.jpg\" title=\"1493014894562425.jpg\" alt=\"2.jpg\"/></p>', '2017-04-24 14:21:40', '/Uploads/Logos/npic_26.png', '14', '0');
INSERT INTO `nr_news` VALUES ('27', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 14:06:26', '/Uploads/Logos/npic_27.png', '15', '0');
INSERT INTO `nr_news` VALUES ('28', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_28.png', '14', '0');
INSERT INTO `nr_news` VALUES ('29', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_29.png', '14', '0');
INSERT INTO `nr_news` VALUES ('30', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_30.png', '14', '0');
INSERT INTO `nr_news` VALUES ('31', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_31.png', '14', '1');
INSERT INTO `nr_news` VALUES ('32', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_32.png', '14', '0');
INSERT INTO `nr_news` VALUES ('33', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_33.png', '14', '0');
INSERT INTO `nr_news` VALUES ('34', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_34.png', '14', '0');
INSERT INTO `nr_news` VALUES ('35', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_35.png', '14', '0');
INSERT INTO `nr_news` VALUES ('36', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_36.png', '14', '0');
INSERT INTO `nr_news` VALUES ('37', '采摘器的分类', '<p>根据不同的分类方式，可以将采摘机分为不同的类型，如图所示：多数的采摘机是按其使用性质分类的称呼的。</p>', '2017-04-24 11:25:03', '/Uploads/Logos/npic_37.png', '14', '5');

-- ----------------------------
-- Table structure for nr_pcate
-- ----------------------------
DROP TABLE IF EXISTS `nr_pcate`;
CREATE TABLE `nr_pcate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `cname` varchar(20) DEFAULT NULL COMMENT '分类名称',
  `pdate` datetime DEFAULT NULL COMMENT '更新时间',
  `sort` smallint(2) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_pcate
-- ----------------------------
INSERT INTO `nr_pcate` VALUES ('16', '枸杞采摘器', '2017-03-31 19:54:03', '1');

-- ----------------------------
-- Table structure for nr_product
-- ----------------------------
DROP TABLE IF EXISTS `nr_product`;
CREATE TABLE `nr_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `pdate` datetime DEFAULT NULL,
  `plogo` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT '分类ID',
  `hits` int(11) DEFAULT '0' COMMENT '点击量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_product
-- ----------------------------
INSERT INTO `nr_product` VALUES ('1', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:41:59', '/Uploads/Logos/ppic_1.png', '16', '4');
INSERT INTO `nr_product` VALUES ('2', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:42:24', '/Uploads/Logos/ppic_2.png', '16', '2');
INSERT INTO `nr_product` VALUES ('3', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 13:58:27', '/Uploads/Logos/ppic_3.png', '16', '2');
INSERT INTO `nr_product` VALUES ('4', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:41:59', '/Uploads/Logos/ppic_4.png', '16', '0');
INSERT INTO `nr_product` VALUES ('5', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:42:24', '/Uploads/Logos/ppic_5.png', '16', '0');
INSERT INTO `nr_product` VALUES ('6', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:42:54', '/Uploads/Logos/ppic_6.png', '16', '0');
INSERT INTO `nr_product` VALUES ('7', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:41:59', '/Uploads/Logos/ppic_7.png', '16', '0');
INSERT INTO `nr_product` VALUES ('8', '枸杞采摘器', '<p>枸杞采摘器</p>', '2017-04-24 10:42:24', '/Uploads/Logos/ppic_8.png', '16', '33');

-- ----------------------------
-- Table structure for nr_profile
-- ----------------------------
DROP TABLE IF EXISTS `nr_profile`;
CREATE TABLE `nr_profile` (
  `id` int(1) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `contacts` varchar(20) DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `address` varchar(255) DEFAULT NULL,
  `profiles` text COMMENT '公司简介',
  `emil` varchar(100) DEFAULT NULL COMMENT '公司邮箱',
  `qq` varchar(20) DEFAULT NULL COMMENT '公司qq',
  `company` varchar(100) DEFAULT NULL,
  `keywords` text,
  `pdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_profile
-- ----------------------------
INSERT INTO `nr_profile` VALUES ('1', '纳尔', '18737055059', '阿斯达所大所的', '<p style=\"text-align: center;\"><span style=\"color: rgb(192, 0, 0);\">大神的顶顶顶顶顶顶顶顶顶顶</span></p>', '864328615@qq.com', '864328615', '纳尔网络', '企业站建设，app开发', '2017-04-22 15:00:43');

-- ----------------------------
-- Table structure for nr_sub
-- ----------------------------
DROP TABLE IF EXISTS `nr_sub`;
CREATE TABLE `nr_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slogo` varchar(255) DEFAULT NULL,
  `sdate` datetime DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nr_sub
-- ----------------------------
INSERT INTO `nr_sub` VALUES ('13', '/Uploads/Logos/spic_13.png', '2017-04-23 09:53:12', '大萨达', 'asdddddddddddd');
