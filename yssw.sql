-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-12 06:52:54
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yssw`
--

-- --------------------------------------------------------

--
-- 表的结构 `ys_cate`
--

CREATE TABLE `ys_cate` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父ID',
  `type` varchar(255) DEFAULT NULL COMMENT '0:人才管理的栏目 1：供求管理的栏目 2：租转管理的栏目',
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `content` text,
  `img` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `levle` tinyint(4) NOT NULL DEFAULT '0' COMMENT '等级',
  `sort` int(11) DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ys_cate`
--

INSERT INTO `ys_cate` (`cid`, `pid`, `type`, `name`, `content`, `img`, `addtime`, `levle`, `sort`) VALUES
(1, 0, '0', '招聘大栏目', NULL, NULL, 1497229066, 0, 0),
(2, 0, '1', '求职大栏目', NULL, NULL, 1497229066, 0, 0),
(3, 0, '2', '供应大栏目', NULL, NULL, 1497229066, 0, 0),
(4, 0, '3', '求购大栏目', NULL, NULL, 1497229066, 0, 0),
(5, 0, '4', '出租大栏目', NULL, NULL, 1497229066, 0, 0),
(6, 0, '5', '转让大栏目', NULL, NULL, 1497229066, 0, 0),
(7, 1, '0', '招聘小栏目1', NULL, NULL, 1497229066, 1, 0),
(8, 1, '0', '招聘小栏目2', NULL, NULL, 1497229066, 1, 0),
(10, 0, '0', '招聘大栏目2123', NULL, '', 1497229066, 0, 0),
(11, 3, '2', '子类供应', NULL, '', 1497229066, 0, 0),
(23, 0, '0', '123', NULL, '/Uploads/Logos/0__23.png', 1497235043, 0, 0),
(26, 0, '0', '1', NULL, '/Uploads/Logos/0__26.png', 1497235724, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ys_company`
--

CREATE TABLE `ys_company` (
  `gid` int(11) NOT NULL COMMENT '自增公司ID',
  `name` varchar(64) DEFAULT NULL COMMENT '公司名称',
  `tel` varchar(32) DEFAULT NULL COMMENT '电话',
  `fax` varchar(32) DEFAULT NULL COMMENT '传真',
  `address` varchar(64) DEFAULT NULL COMMENT '地址',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐 0：不推荐 1：推荐',
  `content` text COMMENT '公司简介',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `img` varchar(255) DEFAULT NULL COMMENT '公司LOGO'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ys_company`
--

INSERT INTO `ys_company` (`gid`, `name`, `tel`, `fax`, `address`, `recommend`, `content`, `addtime`, `img`) VALUES
(1, '测试公司', '18805831155', '1', 'XXX路XX号', 0, NULL, NULL, '/Uploads/Logos/company__.png'),
(2, '12311', '123', '123', '123', 0, NULL, 1497248575, '/Uploads/Logos/company__2.png');

-- --------------------------------------------------------

--
-- 表的结构 `ys_information`
--

CREATE TABLE `ys_information` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `uid` int(11) DEFAULT NULL COMMENT '所属用户ID',
  `cid` int(11) DEFAULT NULL COMMENT '分类ID',
  `img_id` varchar(255) DEFAULT NULL COMMENT '图片ID，最多4张',
  `img` varchar(255) DEFAULT NULL COMMENT '缩略图一张',
  `content` text COMMENT '内容',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '修改时间',
  `address` varchar(255) DEFAULT NULL COMMENT '地址',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未通过 1：通过',
  `mobile` int(11) DEFAULT NULL COMMENT '手机号',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '阅读数',
  `type` tinyint(4) DEFAULT NULL COMMENT '0:招聘 1：求职 2：供应 3：求购 4：出租 5：转让'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='招聘信息表';

--
-- 转存表中的数据 `ys_information`
--

INSERT INTO `ys_information` (`id`, `title`, `uid`, `cid`, `img_id`, `img`, `content`, `addtime`, `updatetime`, `address`, `status`, `mobile`, `recommend`, `click`, `type`) VALUES
(1, '我是招聘', 1, 1, NULL, NULL, '<p>我是招聘我是招聘</p>', 1497074854, 1497233513, NULL, 0, NULL, 0, 0, 0),
(2, '我是求职', 1, 1, NULL, NULL, '我是求职我是求职我是求职', 1497074854, 1497074854, NULL, 0, NULL, 0, 0, 1),
(3, '我是供应', 1, 1, NULL, NULL, '<p>我是供应我是供应</p>', 1497074854, 1497081822, NULL, 0, NULL, 0, 0, 2),
(4, '我是求购', 1, 1, NULL, NULL, '我是求购我是求购我是求购我是求购我是求购', 1497074854, 1497074854, NULL, 0, NULL, 0, 0, 3),
(5, '我是出租', 1, 1, NULL, NULL, '<p>我是出租我是出租我是出租我是出租</p>', 1497074854, 1497233276, NULL, 0, NULL, 0, 0, 4),
(6, '我是转让', 1, 1, NULL, NULL, '我是转让我是转让我是转让我是转让我是转让我是转让', 1497074854, 1497074854, NULL, 0, NULL, 0, 0, 5),
(8, '测试第二条', 1, 1, NULL, '/Uploads/Logos/0_8.png', NULL, 1497077684, 1497080932, NULL, 0, NULL, 0, 0, 0),
(10, '1', 1, 1, NULL, NULL, NULL, 1497081232, 1497081232, NULL, 0, NULL, 0, 0, 0),
(11, '123', 1, 1, NULL, '/Uploads/Logos/0_11.png', '<p>1</p>', 1497233530, 1497233530, NULL, 0, NULL, 0, 0, 0),
(12, '123', 1, 1, NULL, '/Uploads/Logos/0_12.png', '<p>123</p>', 1497235503, 1497235503, NULL, 0, NULL, 0, 0, 0),
(13, '123', 1, 1, NULL, '/Uploads/Logos/0__13.png', '<p>123</p>', 1497236319, 1497236319, NULL, 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ys_manager`
--

CREATE TABLE `ys_manager` (
  `id` int(11) NOT NULL,
  `username` varchar(10) DEFAULT NULL COMMENT '用户名',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '密码',
  `loginnum` int(6) DEFAULT '0' COMMENT '登录次数',
  `lastlogintime` datetime DEFAULT NULL COMMENT '最后登录时间',
  `lastloginip` varchar(15) DEFAULT NULL COMMENT '最后登录ip',
  `flag` int(1) DEFAULT '1' COMMENT '状态',
  `memo` varchar(100) DEFAULT NULL COMMENT '备注',
  `joindate` datetime DEFAULT NULL COMMENT '注册日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员' ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `ys_manager`
--

INSERT INTO `ys_manager` (`id`, `username`, `password`, `loginnum`, `lastlogintime`, `lastloginip`, `flag`, `memo`, `joindate`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2017-06-12 08:15:50', '127.0.0.1', 1, '管理员默认账户', '2016-12-01 12:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `ys_money_detail`
--

CREATE TABLE `ys_money_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户 ID',
  `type` tinyint(1) NOT NULL COMMENT '0:充值 1：消费 2：提现',
  `money` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0：未成功 1：成功',
  `addtime` int(11) DEFAULT NULL COMMENT '记录时间',
  `return_code` varchar(64) DEFAULT NULL,
  `transaction_id` int(32) DEFAULT NULL,
  `time_end` varchar(14) DEFAULT NULL,
  `bank_type` varchar(16) DEFAULT NULL,
  `trade_type` varchar(16) DEFAULT NULL,
  `nonce_str` varchar(32) DEFAULT NULL,
  `sign` varchar(32) DEFAULT NULL,
  `appid` varchar(32) DEFAULT NULL,
  `openid` varchar(128) DEFAULT NULL,
  `fee_type` varchar(8) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ys_page`
--

CREATE TABLE `ys_page` (
  `id` int(11) NOT NULL COMMENT '自增ID',
  `pid` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ys_table`
--

CREATE TABLE `ys_table` (
  `bid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL COMMENT '发表时间',
  `down_number` int(11) DEFAULT NULL,
  `format` varchar(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ys_user`
--

CREATE TABLE `ys_user` (
  `uid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL COMMENT '推荐人ID',
  `pwd` varchar(255) DEFAULT '' COMMENT '密码',
  `name` varchar(255) DEFAULT NULL,
  `wechat` varchar(64) DEFAULT NULL,
  `qq` int(64) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0' COMMENT '性别 0：男 1：女',
  `address` varchar(128) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `click` int(11) DEFAULT NULL COMMENT '阅读数',
  `gid` int(11) DEFAULT NULL,
  `money` double NOT NULL DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `vip_star` int(11) DEFAULT NULL,
  `vip_end` int(11) DEFAULT NULL,
  `reg_time` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '0:未通过 1 通过',
  `find_work` tinyint(1) DEFAULT NULL COMMENT '0：关闭求职 1：求职中',
  `edu_level` varchar(32) DEFAULT NULL COMMENT '教育程度',
  `work_experience` text COMMENT '工作经历',
  `opendId` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ys_user`
--

INSERT INTO `ys_user` (`uid`, `tid`, `pwd`, `name`, `wechat`, `qq`, `sex`, `address`, `img`, `click`, `gid`, `money`, `score`, `addtime`, `ip`, `vip_star`, `vip_end`, `reg_time`, `status`, `find_work`, `edu_level`, `work_experience`, `opendId`) VALUES
(1, NULL, '', '我是第一个', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, '', '我是第er个', '222', 141, 0, '', '/Uploads/Logos/user__.png', NULL, NULL, 0, 0, 1497244902, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ys_cate`
--
ALTER TABLE `ys_cate`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ys_company`
--
ALTER TABLE `ys_company`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `ys_information`
--
ALTER TABLE `ys_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `type` (`type`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `ys_manager`
--
ALTER TABLE `ys_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ys_money_detail`
--
ALTER TABLE `ys_money_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ys_page`
--
ALTER TABLE `ys_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ys_table`
--
ALTER TABLE `ys_table`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `ys_user`
--
ALTER TABLE `ys_user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ys_cate`
--
ALTER TABLE `ys_cate`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- 使用表AUTO_INCREMENT `ys_company`
--
ALTER TABLE `ys_company`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增公司ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `ys_information`
--
ALTER TABLE `ys_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `ys_manager`
--
ALTER TABLE `ys_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `ys_money_detail`
--
ALTER TABLE `ys_money_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ys_page`
--
ALTER TABLE `ys_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID';
--
-- 使用表AUTO_INCREMENT `ys_table`
--
ALTER TABLE `ys_table`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ys_user`
--
ALTER TABLE `ys_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
