-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-14 08:48:42
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
  `sort` int(11) DEFAULT '0' COMMENT '排序'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ys_cate`
--

INSERT INTO `ys_cate` (`cid`, `pid`, `type`, `name`, `content`, `img`, `addtime`, `sort`) VALUES
(1, 0, '0', '销售', NULL, NULL, 1497229066, 0),
(2, 0, '1', '人力资源管理', NULL, NULL, 1497229066, 0),
(3, 0, '2', '缝纫机', NULL, NULL, 1497229066, 0),
(4, 0, '3', '求购大栏目', NULL, NULL, 1497229066, 0),
(5, 0, '4', '出租大栏目', NULL, NULL, 1497229066, 0),
(6, 0, '5', '转让大栏目', NULL, NULL, 1497229066, 0),
(7, 0, '0', '文员', NULL, NULL, 1497229066, 0),
(8, 0, '0', '研发工程师', NULL, NULL, 1497229066, 0),
(10, 0, '0', '司机', NULL, '', 1497229066, 0),
(11, 0, '2', '摩托车', NULL, '', 1497229066, 0),
(23, 0, '0', '厨师', NULL, '/Uploads/Logos/0__23.png', 1497235043, 0),
(26, 0, '0', '配送员', NULL, '/Uploads/Logos/0__26.png', 1497235724, 0),
(27, 0, '4', '房子', NULL, NULL, 1497400432, 0),
(28, 0, '5', '房屋', NULL, NULL, 1497400441, 0),
(29, 0, '1', '财务', NULL, NULL, 1497402288, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ys_company`
--

CREATE TABLE `ys_company` (
  `gid` int(11) NOT NULL COMMENT '自增公司ID',
  `uid` int(11) DEFAULT NULL,
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

INSERT INTO `ys_company` (`gid`, `uid`, `name`, `tel`, `fax`, `address`, `recommend`, `content`, `addtime`, `img`) VALUES
(1, 1, '测试公司', '18805831155', '1', 'XXX路XX号', 0, '12', NULL, '/Uploads/Logos/company__.png'),
(2, NULL, '12311', '123', '123', '123', 0, NULL, 1497248575, '/Uploads/Logos/company__2.png');

-- --------------------------------------------------------

--
-- 表的结构 `ys_images`
--

CREATE TABLE `ys_images` (
  `id` int(11) NOT NULL,
  `savepath` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `price` double DEFAULT NULL,
  `content` text COMMENT '内容',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `updatetime` int(11) DEFAULT NULL COMMENT '修改时间',
  `address` varchar(64) DEFAULT NULL COMMENT '地址',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未通过 1：通过',
  `name` varchar(64) DEFAULT NULL COMMENT '联系人',
  `mobile` varchar(64) DEFAULT NULL COMMENT '手机号',
  `recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '阅读数',
  `type` tinyint(4) DEFAULT NULL COMMENT '0:招聘 1：求职 2：供应 3：求购 4：出租 5：转让'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='招聘信息表';

--
-- 转存表中的数据 `ys_information`
--

INSERT INTO `ys_information` (`id`, `title`, `uid`, `cid`, `img_id`, `img`, `price`, `content`, `addtime`, `updatetime`, `address`, `status`, `name`, `mobile`, `recommend`, `click`, `type`) VALUES
(1, '招厨师', 1, 23, NULL, NULL, 8000, '<p>招厨师招厨师招厨师招厨师招厨师招厨师招厨师招厨师招厨师招厨师</p>', 1497074854, 1497426651, '', 0, '', '', 0, 1, 0),
(2, '找实习人力方面的工作', 1, 2, NULL, NULL, 1000, '<p>本人刚从学校毕业，希望能找一份实习生工作</p>', 1497074854, 1497402379, NULL, 0, NULL, NULL, 0, 13, 1),
(3, '提供各种各样的缝纫机', 1, 3, NULL, '/Uploads/Logos/2__1.png', 200, '<p>提供各种各样的缝纫机提供各种各样的缝纫机提供各种各样的缝纫机提供各种各样的缝纫机提供各种各样的缝纫机</p>', 1497074854, 1497402484, NULL, 0, NULL, NULL, 0, 3, 2),
(4, '我是求购', 1, 4, NULL, NULL, 1000, '我是求购我是求购我是求购我是求购我是求购', 1497074854, 1497074854, NULL, 0, NULL, NULL, 0, 0, 3),
(5, '厂房出租', 1, 27, NULL, '/Uploads/Logos/4__1.png', 2000, '<p>厂房出租厂房出租厂房出租厂房出租厂房出租厂房出租</p>', 1497074854, 1497401533, NULL, 0, NULL, NULL, 0, 2, 4),
(6, '房屋转让', 6, 28, NULL, '/Uploads/Logos/5__1.png', 1300, '<p>房屋转让</p>', 1497074854, 1497401518, NULL, 0, NULL, NULL, 0, 14, 5),
(8, '配送员', 1, 26, NULL, '', 1600, '<p>配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员配送员</p>', 1497077684, 1497426631, '', 0, '', '', 0, 1, 0),
(10, '公司需要3名文员', 1, 7, NULL, NULL, 3000, '<p>公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员公司需要3名文员</p>', 1497081232, 1497426596, '', 0, '老陈', '', 0, 0, 0),
(11, '招聘研发工程师', 1, 8, NULL, '', 5000, '<p>1</p>', 1497233530, 1497426507, '', 0, '老哥', '18805813155', 0, 2, 0),
(12, '123', 1, 0, NULL, '/Uploads/Logos/0_12.png', 400, '<p>123</p>', 1497235503, 1497426451, '', 0, '', '', 0, 4, 0),
(13, '急需销售', 1, 1, NULL, '/Uploads/Logos/0__13.png', 3000, '<p>急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售急需销售</p>', 1497236319, 1497426441, 'XX路', 0, '小马', '1333555588', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ys_interactive`
--

CREATE TABLE `ys_interactive` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '访问的ID',
  `fid` int(11) NOT NULL DEFAULT '0' COMMENT '被访问的信息ID',
  `fuid` int(11) NOT NULL DEFAULT '0' COMMENT '被访问的信息所属者',
  `type` tinyint(1) NOT NULL COMMENT '被访问的信息类型0:招聘 1：求职 2：供应 3：求购 4：出租 5：转让 6：个人信息',
  `click` int(11) DEFAULT '1' COMMENT '阅读数',
  `addtime` int(11) NOT NULL COMMENT '访问时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ys_interactive`
--

INSERT INTO `ys_interactive` (`id`, `uid`, `fid`, `fuid`, `type`, `click`, `addtime`) VALUES
(1, 6, 1, 1, 0, 1, 1497233513),
(2, 7, 2, 1, 1, 1, 1497233514),
(3, 1, 13, 2, 0, 1, 1497233515),
(4, 1, 6, 6, 5, 4, 1497411092);

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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '2017-06-14 08:33:39', '127.0.0.1', 1, '管理员默认账户', '2016-12-01 12:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `ys_money_detail`
--

CREATE TABLE `ys_money_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户 ID',
  `type` tinyint(1) NOT NULL COMMENT '0:充值 1：消费 2：提现 3：推广所得',
  `money` double DEFAULT NULL,
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

--
-- 转存表中的数据 `ys_money_detail`
--

INSERT INTO `ys_money_detail` (`id`, `uid`, `type`, `money`, `addtime`, `return_code`, `transaction_id`, `time_end`, `bank_type`, `trade_type`, `nonce_str`, `sign`, `appid`, `openid`, `fee_type`) VALUES
(1, 1, 1, 100, 1497425286, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 2, 200, 1497425285, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 0, 300, 1497425284, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 3, 400, 1497425283, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- 表的结构 `ys_setting`
--

CREATE TABLE `ys_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(64) DEFAULT NULL COMMENT '公司名字',
  `person` varchar(64) DEFAULT NULL,
  `mobile` varchar(64) DEFAULT NULL COMMENT '联系电话',
  `email` varchar(64) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text COMMENT '描述',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `content` text COMMENT '公司介绍',
  `score` int(11) DEFAULT '0' COMMENT '推广所获得的积分',
  `money` double DEFAULT '0' COMMENT '推广所获得的钱',
  `lunbo` varchar(255) DEFAULT NULL COMMENT '轮播图ID',
  `notice` text COMMENT '公告'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ys_setting`
--

INSERT INTO `ys_setting` (`id`, `name`, `person`, `mobile`, `email`, `address`, `description`, `keywords`, `content`, `score`, `money`, `lunbo`, `notice`) VALUES
(1, '台州银刷商务服务有限公司', '', '', '', 'XX路XX号', NULL, '', '', 1, 1, NULL, '台州银刷商务服务有限公司微信号开始立刻运营了！');

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
  `mobile` varchar(64) DEFAULT NULL COMMENT '手机',
  `pwd` varchar(255) DEFAULT '' COMMENT '密码',
  `name` varchar(255) DEFAULT NULL,
  `wechat` varchar(64) DEFAULT NULL,
  `qq` int(64) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT '0' COMMENT '性别 0：男 1：女',
  `province` varchar(32) DEFAULT '' COMMENT '省',
  `city` varchar(32) DEFAULT NULL COMMENT '市',
  `area` varchar(32) DEFAULT NULL COMMENT '区',
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
  `vip_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:未通过 1 通过',
  `find_work` tinyint(1) DEFAULT NULL COMMENT '0：关闭求职 1：求职中',
  `edu_level` varchar(32) DEFAULT NULL COMMENT '教育程度',
  `work_experience` text COMMENT '工作经历',
  `opendId` varchar(64) DEFAULT NULL,
  `gname` varchar(64) DEFAULT NULL COMMENT '公司名字'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `ys_user`
--

INSERT INTO `ys_user` (`uid`, `tid`, `mobile`, `pwd`, `name`, `wechat`, `qq`, `sex`, `province`, `city`, `area`, `address`, `img`, `click`, `gid`, `money`, `score`, `addtime`, `ip`, `vip_star`, `vip_end`, `reg_time`, `vip_status`, `find_work`, `edu_level`, `work_experience`, `opendId`, `gname`) VALUES
(1, NULL, '18805813155', 'e10adc3949ba59abbe56e057f20f883e', '陈得柱', 'wechat', 420021436, 0, '', NULL, NULL, 'xx路XX号', '/Uploads/Logos/user__1.png', NULL, NULL, 0, 0, 1497244901, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '木头公司'),
(6, 1, NULL, '', '我是第er个', '222', 141, 0, '', NULL, NULL, '', '/Uploads/Logos/user__.png', NULL, NULL, 0, 0, 1497244902, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(7, 6, NULL, '', '我是个二级下线', NULL, NULL, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1497244903, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `ys_images`
--
ALTER TABLE `ys_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ys_information`
--
ALTER TABLE `ys_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `type` (`type`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `ys_interactive`
--
ALTER TABLE `ys_interactive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fuid` (`fuid`);

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
-- Indexes for table `ys_setting`
--
ALTER TABLE `ys_setting`
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
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `mobile_2` (`mobile`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ys_cate`
--
ALTER TABLE `ys_cate`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `ys_company`
--
ALTER TABLE `ys_company`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增公司ID', AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `ys_images`
--
ALTER TABLE `ys_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ys_information`
--
ALTER TABLE `ys_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `ys_interactive`
--
ALTER TABLE `ys_interactive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `ys_manager`
--
ALTER TABLE `ys_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `ys_money_detail`
--
ALTER TABLE `ys_money_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ys_page`
--
ALTER TABLE `ys_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID';
--
-- 使用表AUTO_INCREMENT `ys_setting`
--
ALTER TABLE `ys_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ys_table`
--
ALTER TABLE `ys_table`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ys_user`
--
ALTER TABLE `ys_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
