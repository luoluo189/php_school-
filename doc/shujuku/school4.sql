-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-28 16:23:36
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='结算表';

-- --------------------------------------------------------

--
-- 表的结构 `appraise`
--

CREATE TABLE IF NOT EXISTS `appraise` (
  `appr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价id',
  `appr_content` varchar(255) DEFAULT NULL COMMENT '评价内容',
  `appr_score` float NOT NULL COMMENT '评分',
  `si_iddd` int(11) NOT NULL COMMENT '店家id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `ci_iddd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`appr_id`),
  KEY `si_iddd` (`si_iddd`),
  KEY `bs_gid` (`bs_gid`),
  KEY `ci_iddd` (`ci_iddd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评价表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_goods`
--

CREATE TABLE IF NOT EXISTS `bs_goods` (
  `bs_gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `bs_gname` varchar(255) NOT NULL COMMENT '商品名称',
  `bs_gsize` varchar(255) NOT NULL COMMENT '商品型号（颜色）',
  `bs_gprice` float NOT NULL COMMENT '商品单价',
  `bs_gnumber` int(11) NOT NULL COMMENT '商品库存',
  `bs_gurl` varchar(255) NOT NULL COMMENT '商品图片url',
  `bs_gmaketime` datetime NOT NULL COMMENT '商品制作时间',
  `bs_tid` int(11) NOT NULL COMMENT '商品种类id',
  `bs_gsid` int(11) NOT NULL COMMENT '商品状态id',
  `bs_rid` int(11) NOT NULL COMMENT '商品推荐id',
  PRIMARY KEY (`bs_gid`),
  KEY `bs_tid` (`bs_tid`),
  KEY `bs_gsid` (`bs_gsid`),
  KEY `bs_rid` (`bs_rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_goods_state`
--

CREATE TABLE IF NOT EXISTS `bs_goods_state` (
  `bs_gsid` int(11) NOT NULL,
  `bs_gsname` varchar(255) NOT NULL,
  PRIMARY KEY (`bs_gsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bs_goods_state`
--

INSERT INTO `bs_goods_state` (`bs_gsid`, `bs_gsname`) VALUES
(0, '已售完'),
(1, '售卖中');

-- --------------------------------------------------------

--
-- 表的结构 `bs_many_goods`
--

CREATE TABLE IF NOT EXISTS `bs_many_goods` (
  `bs_mgid` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易多种商品id',
  `bs_tr_id` int(11) NOT NULL COMMENT '交易id',
  `bs_giddd` int(11) NOT NULL COMMENT '商品id',
  `bs_mgnum` int(11) NOT NULL COMMENT '商品数量',
  `sh_cid` int(11) NOT NULL COMMENT '购物车id',
  PRIMARY KEY (`bs_mgid`),
  KEY `bs_tr_id` (`bs_tr_id`),
  KEY `bs_giddd` (`bs_giddd`),
  KEY `sh_cid` (`sh_cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易多种商品表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_ recommend`
--

CREATE TABLE IF NOT EXISTS `bs_ recommend` (
  `bs_rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品推荐id',
  `bs_rname` varchar(255) NOT NULL COMMENT '商品推荐名称id',
  PRIMARY KEY (`bs_rid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品推荐' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_trade`
--

CREATE TABLE IF NOT EXISTS `bs_trade` (
  `bs_tr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易id',
  `ci_id5` int(11) NOT NULL COMMENT '交易客户id',
  `bs_sid` int(11) NOT NULL COMMENT '交易商家id',
  `bs_tr_xtime` datetime NOT NULL COMMENT '下单时间',
  `bs_tr_time` datetime NOT NULL COMMENT '交易时间',
  `bs_tr_way` varchar(255) NOT NULL COMMENT '交易方式',
  `ts_iddd` int(11) NOT NULL COMMENT '交易状态id',
  PRIMARY KEY (`bs_tr_id`),
  KEY `ci_id5` (`ci_id5`),
  KEY `bs_sid` (`bs_sid`),
  KEY `ts_iddd` (`ts_iddd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品类交易表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_trade_information`
--

CREATE TABLE IF NOT EXISTS `bs_trade_information` (
  `bs_tr_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '详情id',
  `bs_tr_idd` int(11) NOT NULL COMMENT '交易id',
  `bs_tr_inaddress` int(11) NOT NULL COMMENT '交易地址',
  `bs_tr_inmoney` int(11) NOT NULL COMMENT '成交金额',
  `bs_tr_intime` datetime NOT NULL COMMENT '成交时间',
  `bs_tr_inphone` int(11) NOT NULL COMMENT '客户联系方式',
  PRIMARY KEY (`bs_tr_inid`),
  KEY `bs_tr_idd` (`bs_tr_idd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易详情表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bs_type`
--

CREATE TABLE IF NOT EXISTS `bs_type` (
  `bs_tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品种类id',
  `bs_tname` varchar(255) NOT NULL COMMENT '商品种类名称',
  `si_id` int(11) NOT NULL COMMENT '店家id',
  PRIMARY KEY (`bs_tid`),
  KEY `si_id` (`si_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品种类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `customer_address`
--

CREATE TABLE IF NOT EXISTS `customer_address` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址id',
  `ca_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ca_address` varchar(255) NOT NULL COMMENT '具体地址',
  `ca_phone` int(11) NOT NULL COMMENT '手机号',
  `ci_idd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`ca_id`),
  KEY `ci_idd` (`ci_idd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=' 客户地址表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `customer_information`
--

CREATE TABLE IF NOT EXISTS `customer_information` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `ci_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ci_address` varchar(255) DEFAULT NULL COMMENT '客户地址',
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `haircut_order_type`
--

CREATE TABLE IF NOT EXISTS `haircut_order_type` (
  `ho_tyid` int(11) NOT NULL COMMENT '预约类型id',
  `ho_tyname` varchar(255) NOT NULL COMMENT '预约名称',
  `si_idd` int(11) NOT NULL COMMENT '店家id',
  PRIMARY KEY (`ho_tyid`),
  KEY `si_idd` (`si_idd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='理发可预约类型表';

-- --------------------------------------------------------

--
-- 表的结构 `home_page_pic`
--

CREATE TABLE IF NOT EXISTS `home_page_pic` (
  `pic_one` varchar(255) NOT NULL,
  `pic_two` varchar(255) NOT NULL,
  `pic_three` varchar(255) NOT NULL,
  `pic_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='首页轮播图';

-- --------------------------------------------------------

--
-- 表的结构 `order_time_pmun`
--

CREATE TABLE IF NOT EXISTS `order_time_pmun` (
  `ot_pnid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ot_pntime` int(11) NOT NULL COMMENT '可预约时间段',
  `ot_pnpnum` int(11) NOT NULL COMMENT '可预约人数',
  `ho_tyidd` int(11) NOT NULL COMMENT '预约类型id',
  PRIMARY KEY (`ot_pnid`),
  KEY `ho_tyidd` (`ho_tyidd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='可预约时间人数' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `order_trade`
--

CREATE TABLE IF NOT EXISTS `order_trade` (
  `or_tdid` int(11) NOT NULL AUTO_INCREMENT COMMENT '预约id',
  `or_tdtime` datetime NOT NULL COMMENT '预约时间',
  `ho_tyid` int(11) NOT NULL COMMENT '预约类型id',
  `ts_idd` int(11) NOT NULL COMMENT '交易状态id',
  PRIMARY KEY (`or_tdid`),
  KEY `ho_tyid` (`ho_tyid`),
  KEY `ts_idd` (`ts_idd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=' 预约类交易表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_information`
--

CREATE TABLE IF NOT EXISTS `pt_information` (
  `pt_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职id',
  `pt_inname` varchar(255) NOT NULL COMMENT '兼职名称',
  `pt_inmoney` varchar(255) NOT NULL COMMENT '兼职报酬',
  `pt_inabstract` varchar(255) NOT NULL COMMENT '兼职简介',
  `pt_inaddress` varchar(255) NOT NULL COMMENT '兼职地址',
  `pt_min_id` int(11) NOT NULL COMMENT '发布者id',
  PRIMARY KEY (`pt_inid`),
  KEY `pt_min_id` (`pt_min_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_manager_information`
--

CREATE TABLE IF NOT EXISTS `pt_manager_information` (
  `pt_min_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '发表者id',
  `pt_min_name` varchar(255) NOT NULL COMMENT '发表者姓名',
  `pt_min_IDnum` char(18) NOT NULL COMMENT '发表者身份证号',
  `pt_min_phone` char(11) NOT NULL COMMENT '发表者手机号',
  `pt_min_type` varchar(255) NOT NULL COMMENT '发表者种类',
  `pt_min_app_state` tinyint(1) NOT NULL COMMENT '发表者认证状态',
  PRIMARY KEY (`pt_min_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职发布者信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_person_information`
--

CREATE TABLE IF NOT EXISTS `pt_person_information` (
  `pt_pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职者id',
  `pt_pname` varchar(255) NOT NULL COMMENT '兼职者昵称',
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_pphone` int(11) NOT NULL COMMENT '手机号',
  PRIMARY KEY (`pt_pid`),
  KEY `pt_sid` (`pt_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职者信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `pt_state`
--

CREATE TABLE IF NOT EXISTS `pt_state` (
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_sname` varchar(255) NOT NULL COMMENT '兼职状态名称',
  PRIMARY KEY (`pt_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职者状态表';

--
-- 转存表中的数据 `pt_state`
--

INSERT INTO `pt_state` (`pt_sid`, `pt_sname`) VALUES
(0, '不兼职'),
(1, '兼职中');

-- --------------------------------------------------------

--
-- 表的结构 `pt_trade`
--

CREATE TABLE IF NOT EXISTS `pt_trade` (
  `pt_trid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职交易id',
  `pt_trtime` datetime NOT NULL COMMENT '可预约时间',
  `pt_trremark` varchar(255) NOT NULL COMMENT '交易备注',
  `pt_inid` int(11) NOT NULL COMMENT '兼职id',
  `ts_id` int(11) NOT NULL COMMENT '交易状态id',
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`pt_trid`),
  KEY `pt_inid` (`pt_inid`),
  KEY `ts_id` (`ts_id`),
  KEY `ci_id` (`ci_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职类交易表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `sh_cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `sh_cnum` int(11) NOT NULL COMMENT '商品数量',
  `bs_gidd` int(11) NOT NULL COMMENT '商品id',
  `ci_idddd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`sh_cid`),
  KEY `bs_gidd` (`bs_gidd`),
  KEY `ci_idddd` (`ci_idddd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='购物车' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `store_information`
--

CREATE TABLE IF NOT EXISTS `store_information` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家id',
  `si_name` varchar(255) NOT NULL COMMENT '店家名称',
  `si_sintroduce` text NOT NULL COMMENT '店家简介',
  `si_stime` datetime NOT NULL COMMENT '店家营业时间起',
  `si_etime` datetime NOT NULL COMMENT '店家营业时间止',
  `si_phone` int(11) NOT NULL COMMENT '店家联系方式',
  `s_type_id` int(11) NOT NULL COMMENT '店家类型id',
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  PRIMARY KEY (`si_id`),
  KEY `s_type_id` (`s_type_id`),
  KEY `ss_id` (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店家信息表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `store_state`
--

CREATE TABLE IF NOT EXISTS `store_state` (
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  `ss_name` varchar(255) NOT NULL COMMENT '店家状态名称',
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店家状态表';

--
-- 转存表中的数据 `store_state`
--

INSERT INTO `store_state` (`ss_id`, `ss_name`) VALUES
(0, '不营业'),
(1, '营业中');

-- --------------------------------------------------------

--
-- 表的结构 `store_type`
--

CREATE TABLE IF NOT EXISTS `store_type` (
  `s_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家种类id',
  `s_type_name` varchar(255) NOT NULL COMMENT '店家类型',
  PRIMARY KEY (`s_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `store_type`
--

INSERT INTO `store_type` (`s_type_id`, `s_type_name`) VALUES
(1, '美发'),
(2, '购物'),
(3, '兼职');

-- --------------------------------------------------------

--
-- 表的结构 `trade_state`
--

CREATE TABLE IF NOT EXISTS `trade_state` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(255) NOT NULL,
  `s_type_idd` int(11) NOT NULL,
  PRIMARY KEY (`ts_id`),
  KEY `s_type_idd` (`s_type_idd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易状态表';

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_save_goods`
--
CREATE TABLE IF NOT EXISTS `view_save_goods` (
`ci_id` int(11)
,`bs_gid` int(11)
);
-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_save_store`
--
CREATE TABLE IF NOT EXISTS `view_save_store` (
`ci_id` int(11)
,`si_id` int(11)
);
-- --------------------------------------------------------

--
-- 视图结构 `view_save_goods`
--
DROP TABLE IF EXISTS `view_save_goods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_goods` AS select `customer_information`.`ci_id` AS `ci_id`,`bs_goods`.`bs_gid` AS `bs_gid` from (`customer_information` join `bs_goods`);

-- --------------------------------------------------------

--
-- 视图结构 `view_save_store`
--
DROP TABLE IF EXISTS `view_save_store`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_store` AS select `customer_information`.`ci_id` AS `ci_id`,`store_information`.`si_id` AS `si_id` from (`customer_information` join `store_information`);

--
-- 限制导出的表
--

--
-- 限制表 `appraise`
--
ALTER TABLE `appraise`
  ADD CONSTRAINT `ci_iddd` FOREIGN KEY (`ci_iddd`) REFERENCES `customer_information` (`ci_id`),
  ADD CONSTRAINT `bs_gid` FOREIGN KEY (`bs_gid`) REFERENCES `bs_goods` (`bs_gid`),
  ADD CONSTRAINT `si_iddd` FOREIGN KEY (`si_iddd`) REFERENCES `store_information` (`si_id`);

--
-- 限制表 `bs_goods`
--
ALTER TABLE `bs_goods`
  ADD CONSTRAINT `bs_gsid` FOREIGN KEY (`bs_gsid`) REFERENCES `bs_goods_state` (`bs_gsid`),
  ADD CONSTRAINT `bs_rid` FOREIGN KEY (`bs_rid`) REFERENCES `bs_ recommend` (`bs_rid`),
  ADD CONSTRAINT `bs_tid` FOREIGN KEY (`bs_tid`) REFERENCES `bs_type` (`bs_tid`);

--
-- 限制表 `bs_many_goods`
--
ALTER TABLE `bs_many_goods`
  ADD CONSTRAINT `sh_cid` FOREIGN KEY (`sh_cid`) REFERENCES `shopping_cart` (`sh_cid`),
  ADD CONSTRAINT `bs_giddd` FOREIGN KEY (`bs_giddd`) REFERENCES `bs_goods` (`bs_gid`),
  ADD CONSTRAINT `bs_tr_id` FOREIGN KEY (`bs_tr_id`) REFERENCES `bs_trade` (`bs_tr_id`);

--
-- 限制表 `bs_trade`
--
ALTER TABLE `bs_trade`
  ADD CONSTRAINT `ts_iddd` FOREIGN KEY (`ts_iddd`) REFERENCES `trade_state` (`ts_id`),
  ADD CONSTRAINT `bs_sid` FOREIGN KEY (`bs_sid`) REFERENCES `store_information` (`si_id`),
  ADD CONSTRAINT `ci_id5` FOREIGN KEY (`ci_id5`) REFERENCES `customer_information` (`ci_id`);

--
-- 限制表 `bs_trade_information`
--
ALTER TABLE `bs_trade_information`
  ADD CONSTRAINT `bs_tr_idd` FOREIGN KEY (`bs_tr_idd`) REFERENCES `bs_trade` (`bs_tr_id`);

--
-- 限制表 `bs_type`
--
ALTER TABLE `bs_type`
  ADD CONSTRAINT `si_id` FOREIGN KEY (`si_id`) REFERENCES `store_information` (`si_id`);

--
-- 限制表 `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `ci_idd` FOREIGN KEY (`ci_idd`) REFERENCES `customer_information` (`ci_id`);

--
-- 限制表 `haircut_order_type`
--
ALTER TABLE `haircut_order_type`
  ADD CONSTRAINT `si_idd` FOREIGN KEY (`si_idd`) REFERENCES `store_information` (`si_id`);

--
-- 限制表 `order_time_pmun`
--
ALTER TABLE `order_time_pmun`
  ADD CONSTRAINT `ho_tyidd` FOREIGN KEY (`ho_tyidd`) REFERENCES `haircut_order_type` (`ho_tyid`);

--
-- 限制表 `order_trade`
--
ALTER TABLE `order_trade`
  ADD CONSTRAINT `ts_idd` FOREIGN KEY (`ts_idd`) REFERENCES `trade_state` (`ts_id`),
  ADD CONSTRAINT `ho_tyid` FOREIGN KEY (`ho_tyid`) REFERENCES `haircut_order_type` (`ho_tyid`);

--
-- 限制表 `pt_information`
--
ALTER TABLE `pt_information`
  ADD CONSTRAINT `pt_min_id` FOREIGN KEY (`pt_min_id`) REFERENCES `pt_manager_information` (`pt_min_id`);

--
-- 限制表 `pt_person_information`
--
ALTER TABLE `pt_person_information`
  ADD CONSTRAINT `pt_sid` FOREIGN KEY (`pt_sid`) REFERENCES `pt_state` (`pt_sid`);

--
-- 限制表 `pt_trade`
--
ALTER TABLE `pt_trade`
  ADD CONSTRAINT `ci_id` FOREIGN KEY (`ci_id`) REFERENCES `customer_information` (`ci_id`),
  ADD CONSTRAINT `pt_inid` FOREIGN KEY (`pt_inid`) REFERENCES `pt_information` (`pt_inid`),
  ADD CONSTRAINT `ts_id` FOREIGN KEY (`ts_id`) REFERENCES `trade_state` (`ts_id`);

--
-- 限制表 `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `ci_idddd` FOREIGN KEY (`ci_idddd`) REFERENCES `customer_information` (`ci_id`),
  ADD CONSTRAINT `bs_gidd` FOREIGN KEY (`bs_gidd`) REFERENCES `bs_goods` (`bs_gid`);

--
-- 限制表 `store_information`
--
ALTER TABLE `store_information`
  ADD CONSTRAINT `ss_id` FOREIGN KEY (`ss_id`) REFERENCES `store_state` (`ss_id`),
  ADD CONSTRAINT `s_type_id` FOREIGN KEY (`s_type_id`) REFERENCES `store_type` (`s_type_id`);

--
-- 限制表 `trade_state`
--
ALTER TABLE `trade_state`
  ADD CONSTRAINT `s_type_idd` FOREIGN KEY (`s_type_idd`) REFERENCES `store_type` (`s_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
