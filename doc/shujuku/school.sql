-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-21 00:13:48
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `bs_number` int(11) NOT NULL DEFAULT '1' COMMENT '商品数量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='结算表';

-- --------------------------------------------------------

--
-- 表的结构 `appraise`
--

CREATE TABLE `appraise` (
  `appr_id` int(11) NOT NULL COMMENT '评价id',
  `appr_content` varchar(255) DEFAULT NULL COMMENT AS `评价内容`,
  `appr_score` float NOT NULL COMMENT '评分',
  `si_iddd` int(11) NOT NULL COMMENT '店家id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `ci_iddd` int(11) NOT NULL COMMENT '客户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='评价表';

--
-- 转存表中的数据 `appraise`
--

INSERT INTO `appraise` (`appr_id`, `appr_content`, `appr_score`, `si_iddd`, `bs_gid`, `ci_iddd`) VALUES
(1, '商品还不错', 4.5, 4, 2, 3),
(2, '商品还不错', 4.5, 4, 2, 1),
(3, '商品还行', 4, 5, 1, 3),
(6, '很愉快的一次购物哈哈哈', 4.5, 1, 6, 4),
(7, '商品非常棒', 5, 1, 5, 3),
(8, '服务很好', 5, 2, 11, 3),
(9, '商品还不错', 4.5, 4, 10, 2),
(10, '商品质量好', 4.5, 5, 12, 4),
(11, '商品不是很满意', 4, 5, 8, 1),
(12, '头发很符合理想的颜色', 5, 2, 10, 4),
(13, '头发很顺直', 5, 2, 5, 4),
(14, '兼职一般般理想', 4.5, 3, 9, 5),
(15, '兼职信息没有完善，不满意', 4, 3, 8, 1),
(16, '很愉快的一次购物', 5, 6, 5, 5),
(17, '物有所值，满意', 5, 6, 11, 1),
(18, '商品不值这个价格', 4, 6, 7, 4),
(4, ' 兼职很愉快', 5, 3, 2, 2),
(5, '商品一般', 4, 1, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `bs_goods`
--

CREATE TABLE `bs_goods` (
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `bs_gname` varchar(255) NOT NULL COMMENT '商品名称',
  `bs_gsize` varchar(255) NOT NULL COMMENT '商品型号（颜色）',
  `bs_gprice` float NOT NULL COMMENT '商品单价',
  `bs_gnumber` int(11) NOT NULL COMMENT '商品库存',
  `bs_gurl` varchar(255) NOT NULL COMMENT '商品图片url',
  `bs_gmaketime` datetime NOT NULL COMMENT '商品制作时间',
  `bs_tid` int(11) NOT NULL COMMENT '商品种类id',
  `bs_gsid` int(11) NOT NULL COMMENT '商品状态id',
  `bs_rid` int(11) NOT NULL COMMENT '商品推荐id',
  `bs_gdescription` varchar(255) NOT NULL,
  `if_renzheng` int(11) DEFAULT '1' COMMENT 'renzheng是否认证（0为未认证）1为认证未认证的不可以显示到前台',
  `bs_gifshow` int(11) DEFAULT '1' COMMENT '软删除是否删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品信息表';

--
-- 转存表中的数据 `bs_goods`
--

INSERT INTO `bs_goods` (`bs_gid`, `bs_gname`, `bs_gsize`, `bs_gprice`, `bs_gnumber`, `bs_gurl`, `bs_gmaketime`, `bs_tid`, `bs_gsid`, `bs_rid`, `bs_gdescription`, `if_renzheng`, `bs_gifshow`) VALUES
(1, '可口可乐', '720ml大瓶', 7, 100, '/uploads/2016-12-08/kele.jpg', '2016-09-01 14:16:14', 6, 1, 1, '好喝的可口可乐', 1, 1),
(2, '雪碧', '200ml小瓶', 3.5, 20, '/uploads/2016-12-08/xuebi.jpg', '2016-11-29 14:20:45', 7, 1, 1, '美味的雪碧', 1, 1),
(3, '面包', '一包18个', 10, 20, '/uploads/2016-12-08/mianbao.jpg', '2016-11-29 14:24:35', 9, 1, 1, '好吃的面包', 1, 1),
(5, '草莓炒酸奶', '小杯', 8, 4, '/uploads/2016-12-08/caomei.jpg', '0000-00-00 00:00:00', 1, 1, 1, '酸奶', 1, 1),
(6, '香芋味奶茶', '大杯', 12, 12, '/uploads/2016-12-08/xiangyu.jpg', '0000-00-00 00:00:00', 2, 1, 1, '香芋味奶茶', 1, 1),
(7, '蓝莓味炒酸奶', '小杯', 8, 3, '/uploads/2016-12-08/lanmei.jpg', '0000-00-00 00:00:00', 1, 1, 1, '炒酸奶', 1, 1),
(8, '红豆奶', '小杯', 30, 10, '/uploads/2016-12-08/hongdou.jpg', '0000-00-00 00:00:00', 11, 1, 1, '红豆奶', 1, 1),
(9, '柠檬汁', '小杯', 3, 3, '/uploads/2016-12-08/ningmeng.jpg', '0000-00-00 00:00:00', 13, 1, 1, '柠檬汁、、、、', 1, 1),
(10, '西瓜汁', '小杯', 4, 30, '/uploads/2016-12-08/xigua.jpg', '0000-00-00 00:00:00', 14, 1, 1, '西瓜汁精品', 1, 1),
(11, '咖啡', '大杯', 5, 20, '/uploads/2016-12-08/kafei.jpg', '0000-00-00 00:00:00', 12, 1, 1, '咖啡豆研磨而成', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bs_goods_state`
--

CREATE TABLE `bs_goods_state` (
  `bs_gsid` int(11) NOT NULL,
  `bs_gsname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `bs_many_goods` (
  `bs_mgid` int(11) NOT NULL COMMENT '交易多种商品id',
  `bs_tr_id` int(11) NOT NULL COMMENT '交易id',
  `bs_giddd` int(11) NOT NULL COMMENT '商品id',
  `bs_mgnum` int(11) NOT NULL COMMENT '商品数量',
  `sh_cid` int(11) NOT NULL COMMENT '购物车id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='交易多种商品表';

--
-- 转存表中的数据 `bs_many_goods`
--

INSERT INTO `bs_many_goods` (`bs_mgid`, `bs_tr_id`, `bs_giddd`, `bs_mgnum`, `sh_cid`) VALUES
(1, 1, 3, 2, 1),
(2, 5, 2, 3, 1),
(3, 2, 1, 2, 3),
(4, 1, 2, 1, 2),
(5, 7, 7, 3, 3),
(6, 8, 8, 2, 1),
(7, 9, 8, 3, 1),
(8, 10, 7, 4, 3),
(9, 7, 6, 2, 2),
(10, 8, 11, 1, 3),
(11, 7, 10, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `bs_recommend`
--

CREATE TABLE `bs_recommend` (
  `bs_rid` int(11) NOT NULL COMMENT '商品推荐id',
  `bs_rname` varchar(255) NOT NULL COMMENT '商品推荐名称id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品推荐';

--
-- 转存表中的数据 `bs_recommend`
--

INSERT INTO `bs_recommend` (`bs_rid`, `bs_rname`) VALUES
(1, '推荐'),
(3, '不推荐');

-- --------------------------------------------------------

--
-- 表的结构 `bs_ recommend`
--

CREATE TABLE `bs_ recommend` (
  `bs_rid` int(11) NOT NULL COMMENT '商品推荐id',
  `bs_rname` varchar(255) NOT NULL COMMENT '商品推荐名称id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品推荐';

--
-- 转存表中的数据 `bs_ recommend`
--

INSERT INTO `bs_ recommend` (`bs_rid`, `bs_rname`) VALUES
(1, '推荐'),
(3, '不推荐');

-- --------------------------------------------------------

--
-- 表的结构 `bs_trade`
--

CREATE TABLE `bs_trade` (
  `bs_tr_id` int(11) NOT NULL COMMENT '交易id',
  `ci_id5` int(11) NOT NULL COMMENT '交易客户id',
  `bs_sid` int(11) NOT NULL COMMENT '交易商家id',
  `bs_tr_xtime` datetime NOT NULL COMMENT '下单时间',
  `bs_tr_time` datetime NOT NULL COMMENT '交易时间',
  `bs_tr_way` varchar(255) NOT NULL COMMENT '交易方式',
  `ts_iddd` int(11) NOT NULL COMMENT '交易状态id',
  `ifshow` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品类交易表';

--
-- 转存表中的数据 `bs_trade`
--

INSERT INTO `bs_trade` (`bs_tr_id`, `ci_id5`, `bs_sid`, `bs_tr_xtime`, `bs_tr_time`, `bs_tr_way`, `ts_iddd`, `ifshow`) VALUES
(1, 1, 4, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1),
(2, 5, 4, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', 7, 1),
(3, 3, 5, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1),
(4, 2, 2, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', 7, 1),
(5, 3, 4, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1),
(6, 2, 2, '2016-12-07 00:00:00', '2016-12-08 00:00:00', '自取', 7, 1),
(7, 3, 1, '2016-12-07 00:00:00', '2016-12-08 00:00:00', '自取', 5, 1),
(8, 2, 1, '2016-12-07 00:00:00', '2016-12-09 00:00:00', '在线支付', 7, 1),
(9, 1, 1, '2016-12-07 00:00:00', '2016-12-15 00:00:00', '自取', 6, 1),
(10, 4, 1, '2016-12-07 00:00:00', '2016-12-09 00:00:00', '在线支付', 7, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bs_trade_information`
--

CREATE TABLE `bs_trade_information` (
  `bs_tr_inid` int(11) NOT NULL COMMENT '详情id',
  `bs_tr_idd` int(11) NOT NULL COMMENT '交易id',
  `bs_tr_inaddress` varchar(255) NOT NULL COMMENT '交易地址',
  `bs_tr_inmoney` varchar(255) NOT NULL COMMENT '成交金额',
  `bs_tr_intime` datetime NOT NULL COMMENT '成交时间',
  `bs_tr_inphone` char(11) NOT NULL COMMENT '客户联系方式'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='交易详情表';

--
-- 转存表中的数据 `bs_trade_information`
--

INSERT INTO `bs_trade_information` (`bs_tr_inid`, `bs_tr_idd`, `bs_tr_inaddress`, `bs_tr_inmoney`, `bs_tr_intime`, `bs_tr_inphone`) VALUES
(1, 2, '一期宿舍', '20元', '2016-11-29 16:10:58', '13731756789'),
(2, 1, '二期宿舍', '10元', '2016-11-29 16:10:58', '13731756789'),
(3, 4, '软件学院', '3元', '2016-11-29 16:10:58', '13731756789'),
(4, 3, '公交楼', '8.8元', '2016-11-29 16:10:58', '13731756789'),
(5, 7, '二期宿舍', '52元', '2016-12-07 00:00:00', '12343456543'),
(6, 8, '一期宿舍', '65元', '2016-12-07 00:00:00', '12456765432'),
(7, 9, '软件学院', '60元', '2016-12-06 00:00:00', '34123212321'),
(8, 10, '师大科技', '32', '2016-12-07 00:00:00', '12378678567');

-- --------------------------------------------------------

--
-- 表的结构 `bs_type`
--

CREATE TABLE `bs_type` (
  `bs_tid` int(11) NOT NULL COMMENT '商品种类id',
  `bs_tname` varchar(255) NOT NULL COMMENT '商品种类名称',
  `si_id` int(11) NOT NULL COMMENT '店家id',
  `bs_tyifshow` int(11) DEFAULT '1' COMMENT '是否软删除'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品种类表';

--
-- 转存表中的数据 `bs_type`
--

INSERT INTO `bs_type` (`bs_tid`, `bs_tname`, `si_id`, `bs_tyifshow`) VALUES
(1, '炒酸奶', 1, 1),
(2, '奶茶', 1, 1),
(3, '烫头发', 2, 1),
(4, '染头发', 2, 1),
(5, '拉直', 2, 1),
(6, '饮料', 4, 1),
(7, '饮料', 5, 1),
(8, '高中物理家教', 3, 1),
(9, '面包', 4, 1),
(10, '花茶', 1, 1),
(11, '红豆奶', 1, 1),
(12, '热饮', 1, 1),
(13, '冷饮', 1, 1),
(14, '果汁', 1, 1),
(15, '珍珠奶茶', 1, 1),
(16, '碳酸饮料', 4, 1),
(17, '自制酸奶', 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `customer_address`
--

CREATE TABLE `customer_address` (
  `ca_id` int(11) NOT NULL COMMENT '地址id',
  `ca_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ca_address` varchar(255) NOT NULL COMMENT '具体地址',
  `ca_phone` char(11) NOT NULL COMMENT '手机号',
  `ci_idd` int(11) NOT NULL COMMENT '客户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT=' 客户地址表';

--
-- 转存表中的数据 `customer_address`
--

INSERT INTO `customer_address` (`ca_id`, `ca_name`, `ca_address`, `ca_phone`, `ci_idd`) VALUES
(1, '妮', '二期宿舍', '15232167589', 1),
(2, '妮妮', '软件学院', '15232167589', 1),
(3, '贝', '二期宿舍', '15232167589', 2),
(4, '栗', '一期宿舍', '15232167589', 5),
(5, '骆静静', '河北师范大学', '1872222222', 1);

-- --------------------------------------------------------

--
-- 表的结构 `customer_information`
--

CREATE TABLE `customer_information` (
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `ci_name` varchar(255) DEFAULT NULL COMMENT AS `客户昵称`,
  `ca_idd` varchar(255) DEFAULT NULL COMMENT AS `客户地址`,
  `openid` varchar(255) NOT NULL COMMENT '用户微信登陆id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='客户信息表';

--
-- 转存表中的数据 `customer_information`
--

INSERT INTO `customer_information` (`ci_id`, `ci_name`, `ca_idd`, `openid`) VALUES
(1, '妮妮', '1', ''),
(2, '贝贝', '1', ''),
(3, '蕾蕾', '1', ''),
(4, '舒雅', '1', ''),
(5, '阳阳', '1', ''),
(6, '&L', NULL, 'oGmF1wmvKUmi_ZOFOpQ86UAaTOgY'),
(7, '测试小号', NULL, 'oGmF1wn5ecjNQaC2HxlG0nR828c0'),
(8, 'Amber', NULL, 'oGmF1whYFbVqIcCJq9MZUqiZDrfk'),
(13, '&L', NULL, 'oGmF1wmvKUmi_ZOFOpQ86UAaTOgY'),
(12, '暖雪', NULL, 'oGmF1wmhdaeYoCpjARtkgq-QkykA'),
(14, '&L', NULL, 'oGmF1wmvKUmi_ZOFOpQ86UAaTOgY'),
(15, '&L', NULL, 'oGmF1wmvKUmi_ZOFOpQ86UAaTOgY'),
(16, '昱暘', NULL, 'oGmF1wqaNslRpUhRMtq1oFTt0O-k'),
(17, '小栗子', NULL, 'oGmF1wqfggQY5kxcg9NXTV7MFImQ');

-- --------------------------------------------------------

--
-- 表的结构 `findpwd`
--

CREATE TABLE `findpwd` (
  `id` int(255) NOT NULL COMMENT 'id主键',
  `si_name` varchar(255) NOT NULL COMMENT '店铺名称',
  `st_pon` varchar(255) NOT NULL COMMENT '店主名称',
  `si_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `idnumber` varchar(255) NOT NULL COMMENT '身份证号',
  `s_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `findpwd`
--

INSERT INTO `findpwd` (`id`, `si_name`, `st_pon`, `si_phone`, `idnumber`, `s_type`) VALUES
(1, 'ni', 'ad', 'dd', 'ss', '1'),
(2, 'fdsaf', 'ref', 'fasd', 'fdsa', '商铺'),
(3, 'fadsafd', 'adsf', 'afds', 'afsd', '商铺'),
(4, 'ad', 'df', 'afd', 'afdsf', '商铺'),
(5, 'fasd', 'fads', 'fasd', 'fdas', '兼职');

-- --------------------------------------------------------

--
-- 表的结构 `haircut_order_type`
--

CREATE TABLE `haircut_order_type` (
  `ho_tyid` int(11) NOT NULL COMMENT '预约类型id',
  `ho_tyname` varchar(255) NOT NULL COMMENT '预约名称',
  `si_idd` int(11) NOT NULL COMMENT '店家id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='理发可预约类型表';

--
-- 转存表中的数据 `haircut_order_type`
--

INSERT INTO `haircut_order_type` (`ho_tyid`, `ho_tyname`, `si_idd`) VALUES
(1, '剪发', 2),
(2, '烫发', 2),
(3, '剪发', 6),
(4, '染发', 6);

-- --------------------------------------------------------

--
-- 表的结构 `home_page_pic`
--

CREATE TABLE `home_page_pic` (
  `pic_one` varchar(255) NOT NULL,
  `pic_two` varchar(255) NOT NULL,
  `pic_three` varchar(255) NOT NULL,
  `pic_four` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='首页轮播图';

-- --------------------------------------------------------

--
-- 表的结构 `order_time_pmun`
--

CREATE TABLE `order_time_pmun` (
  `ot_pnid` int(11) NOT NULL COMMENT 'id',
  `ot_pntime` varchar(255) NOT NULL COMMENT '可预约时间段',
  `ot_pnpnum` int(11) NOT NULL COMMENT '可预约人数',
  `si_idddd` int(11) NOT NULL COMMENT '预约类型id',
  `ot_ifshow` int(11) DEFAULT '1' COMMENT '是否显示假性删除1 为显示',
  `ot_type` varchar(255) DEFAULT NULL COMMENT AS `预约类型名称`
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='可预约时间人数';

--
-- 转存表中的数据 `order_time_pmun`
--

INSERT INTO `order_time_pmun` (`ot_pnid`, `ot_pntime`, `ot_pnpnum`, `si_idddd`, `ot_ifshow`, `ot_type`) VALUES
(1, '6：00-14：00', 4, 2, 1, '理发'),
(3, '6：00-14：00', 6, 2, 1, '染发'),
(4, '6：00-14：00', 4, 6, 1, '拉直'),
(6, '12:00-14：00', 1, 2, 1, '烫发'),
(7, '12:00-14：00', 111, 2, 0, '剃光头'),
(8, '08:00-12 : 00', 2, 2, 1, '烫发'),
(9, '8:00-12:00', 1, 2, 1, '剪发烫发染发');

-- --------------------------------------------------------

--
-- 表的结构 `order_trade`
--

CREATE TABLE `order_trade` (
  `or_tdid` int(11) NOT NULL COMMENT '预约id',
  `or_tdday` date DEFAULT NULL COMMENT AS `理发预约时间（天）`,
  `or_tdtime` varchar(255) NOT NULL COMMENT '预约时间(时间段)',
  `hair_name` varchar(255) DEFAULT NULL COMMENT AS `客户名称`,
  `hair_gender` varchar(255) DEFAULT NULL COMMENT AS `预约者的性别`,
  `hair_number` varchar(11) DEFAULT NULL COMMENT AS `预约者的手机号`,
  `hair_long` varchar(255) DEFAULT NULL COMMENT AS `头发长度`,
  `hair_content` varchar(255) DEFAULT NULL COMMENT AS `备注`,
  `or_typename` varchar(255) DEFAULT NULL COMMENT AS `预约类型id`,
  `ci_idid` int(11) DEFAULT NULL COMMENT AS `客户id`,
  `storeid` int(11) DEFAULT NULL COMMENT AS `理发商家id`,
  `ts_idd` int(11) NOT NULL COMMENT '交易状态id',
  `or_ifshow` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示1为显示(后台假性删除)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT=' 预约类交易表';

--
-- 转存表中的数据 `order_trade`
--

INSERT INTO `order_trade` (`or_tdid`, `or_tdday`, `or_tdtime`, `hair_name`, `hair_gender`, `hair_number`, `hair_long`, `hair_content`, `or_typename`, `ci_idid`, `storeid`, `ts_idd`, `or_ifshow`) VALUES
(1, '2016-12-06', '8:00-12:00', '李小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 6, 4, 1),
(2, '2016-12-06', '8:00-12:00', '李小二', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 6, 4, 1),
(3, '2016-12-07', '8:00-12:00', '黄小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 2, 2, 1),
(5, '2016-12-07', '8:00-12:00', '王小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 2, 3, 1),
(7, '2016-12-06', '8:00-12:00', '李小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 2, 1, 1),
(8, '2016-12-07', '8:00-12:00', '王小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 6, 3, 1),
(9, '2016-12-07', '8:00-12:00', '王小冰', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 6, 4, 1),
(10, '2016-12-06', '8:00-12:00', '钱小二', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 2, 2, 1),
(11, '2016-12-06', '8:00-12:00', '孙小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 2, 3, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pt_information`
--

CREATE TABLE `pt_information` (
  `pt_inid` int(11) NOT NULL COMMENT '兼职id',
  `pt_inname` varchar(255) NOT NULL COMMENT '兼职名称',
  `pt_inmoney` varchar(255) NOT NULL COMMENT '兼职报酬',
  `pt_intime_a` date DEFAULT NULL COMMENT AS `兼职时间起`,
  `pt_intime_b` date DEFAULT NULL COMMENT AS `兼职时间止`,
  `pt_inweeka` varchar(255) DEFAULT NULL COMMENT AS `兼职的周几到周几 第一个`,
  `pt_inweekb` varchar(255) DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `pt_information`
--

INSERT INTO `pt_information` (`pt_inid`, `pt_inname`, `pt_inmoney`, `pt_intime_a`, `pt_intime_b`, `pt_inweeka`, `pt_inweekb`, `pt_innum`, `pt_inabstract`, `pt_inaddress`, `pt_ifshow`, `pt_min_id`, `pt_min_phonee`, `if_renzheng`) VALUES
(1, '传单', '一天50', '2016-12-06', '2016-12-13', '一', '三', 1, '给食堂的饭做宣传讯息换                                                                                                       ', '师大大食堂', 1, 6, '12323982748', 1),
(2, '物理家教', '一小时50', '2016-12-06', '2016-12-13', '一', '二', 1, '高中物理家教                                                                ', '裕华区', 1, 7, '32431235345', 1),
(3, '数学家教', '一小时50', '2016-12-04', '2016-12-10', '一', '三', 1, '高中数学家教', '裕华区', 1, 6, '23435426454', 1),
(4, '物理家教', '一小时50', '2016-12-05', '2016-12-29', '三', '七', 1, '高中物理家教', '裕华区', 1, 7, '34534212325', 1),
(5, '手工', '一小时50', '2016-11-29', '2016-12-27', '四', '四', 1, '做玩具', '裕华区', 1, 9, '23415465734', 1),
(6, '兼职超市促销', '120元/天', '2016-12-29', '2016-12-31', '四', '六', 4, '兼职超市促销促销', '北国超市', 1, 8, '18733161391', 1),
(7, '12232', '1', '2016-12-14', '2016-12-22', '一', '五', 5, '1', '1', 0, 9, '1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `pt_manager_information`
--

CREATE TABLE `pt_manager_information` (
  `pt_min_id` int(11) NOT NULL COMMENT '发表者id',
  `pt_min_name` varchar(255) NOT NULL COMMENT '发表者姓名',
  `pt_min_image` varchar(255) DEFAULT '/uploads/2016-12-10/jianzhi.jpg' COMMENT '兼职发布者头像',
  `pt_min_IDnum` char(18) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `pt_manager_information`
--

INSERT INTO `pt_manager_information` (`pt_min_id`, `pt_min_name`, `pt_min_image`, `pt_min_IDnum`, `pt_min_phone`, `pt_min_type`, `pt_min_app_state`) VALUES
(6, '张建立', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证'),
(7, '吴丽华', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证'),
(8, '马浩宇', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证'),
(9, '张晓桑', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证');

-- --------------------------------------------------------

--
-- 表的结构 `pt_person_information`
--

CREATE TABLE `pt_person_information` (
  `pt_pid` int(11) NOT NULL COMMENT '兼职者id',
  `pt_pname` varchar(255) NOT NULL COMMENT '兼职者昵称',
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_pphone` varchar(11) NOT NULL COMMENT '手机号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兼职者信息表';

--
-- 转存表中的数据 `pt_person_information`
--

INSERT INTO `pt_person_information` (`pt_pid`, `pt_pname`, `pt_sid`, `pt_pphone`) VALUES
(1, '张三', 0, '11111111111'),
(2, '李四', 1, '12345632123'),
(3, '王五', 0, '13454345432');

-- --------------------------------------------------------

--
-- 表的结构 `pt_state`
--

CREATE TABLE `pt_state` (
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_sname` varchar(255) NOT NULL COMMENT '兼职状态名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兼职者状态表';

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

CREATE TABLE `pt_trade` (
  `pt_trid` int(11) NOT NULL COMMENT '兼职交易id',
  `pt_trtime` datetime NOT NULL COMMENT '交易时间',
  `pt_trremark` varchar(255) NOT NULL COMMENT '交易备注',
  `pt_inid` int(11) NOT NULL COMMENT '兼职id',
  `ts_id` int(11) NOT NULL COMMENT '交易状态id',
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `pt_trifshow` int(11) NOT NULL DEFAULT '1' COMMENT '订单是否显示（后台假性删除）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='兼职类交易表';

--
-- 转存表中的数据 `pt_trade`
--

INSERT INTO `pt_trade` (`pt_trid`, `pt_trtime`, `pt_trremark`, `pt_inid`, `ts_id`, `ci_id`, `pt_trifshow`) VALUES
(1205001, '2016-11-29 16:14:16', '备注些什么', 1, 7, 1, 1),
(1205002, '2016-11-29 16:14:16', '备注', 2, 8, 5, 1),
(1205003, '2016-11-29 16:14:16', '有多种兼职经验', 4, 7, 4, 1),
(1205004, '2016-11-29 16:14:16', '兼职备注', 6, 9, 1, 1),
(1205005, '2016-11-29 16:14:16', '备注些什么', 7, 7, 3, 1),
(1205006, '2016-12-21 19:53:27', '有多种兼职经验', 4, 7, 3, 1),
(1205007, '2016-12-19 14:22:25', 'fddddddddd', 2, 7, 1, 1),
(1205008, '2016-12-19 15:34:30', '我要预约', 2, 8, 1, 1),
(1205009, '2016-12-20 14:27:52', 'fds', 0, 7, 1, 1),
(1205010, '2016-12-20 14:29:24', 'df', 0, 7, 1, 1),
(1205011, '2016-12-20 14:29:30', 'dffdffffd', 0, 7, 1, 1),
(1205012, '2016-12-20 14:29:41', 'fgs', 2, 7, 1, 1),
(1205013, '2016-12-20 14:36:09', 'afd', 3, 7, 1, 1),
(1205014, '2016-12-20 14:37:15', 'fds', 2, 7, 1, 1),
(1205015, '2016-12-20 14:41:35', 'ghhhhhbn', 3, 7, 1, 1),
(1205016, '2016-12-20 15:28:37', 'AFD', 1, 7, 1, 1),
(1205017, '2016-12-20 15:37:21', 'GHJJJJJJJJ', 2, 8, 1, 1),
(1205018, '2016-12-20 15:39:57', 'FYUGH', 2, 8, 1, 1),
(1205019, '2016-12-20 16:01:02', 'FHGHB', 4, 8, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL COMMENT '发布者id',
  `name` varchar(255) NOT NULL COMMENT '发布者姓名',
  `idnumber` varchar(255) NOT NULL COMMENT '身份证号',
  `phonenumber` varchar(255) NOT NULL COMMENT '手机号',
  `type` varchar(255) NOT NULL COMMENT '发布者类型（兼职,理发，商品，发布者）',
  `state` varchar(255) DEFAULT '待认证' COMMENT '发布者状态',
  `address` varchar(255) DEFAULT NULL COMMENT AS `商铺所在地址`,
  `userpwd` varchar(255) NOT NULL DEFAULT '123456' COMMENT '登陆密码',
  `si_id` int(11) DEFAULT NULL COMMENT AS `店铺id`
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `idnumber`, `phonenumber`, `type`, `state`, `address`, `userpwd`, `si_id`) VALUES
(9, 'jianzhi', '1234567890', '1234567890', '兼职', '已认证', '河北师大启智园3楼', 'e10adc3949ba59abbe56e057f20f883e', 3),
(1, '李丽华', '1234567890', '1234567890', '商品', '已认证', '河北师大烤冷面', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, '王珊珊', '1234567890', '1234567890', '理发', '已认证', '河北师大启智园3楼', 'e10adc3949ba59abbe56e057f20f883e', 2),
(3, 'shangpin', '1234567890', '1234567890', '商品', '已认证', '河北师大科技楼那家粉店', 'e10adc3949ba59abbe56e057f20f883e', 4),
(4, '王晓丽', '2134567890', '2134567890', '商品', '待认证', '科技楼底下一层小丽麻辣烫', 'e10adc3949ba59abbe56e057f20f883e', 5),
(5, 'lifa', '3243475034', '3545347938', '理发', '待认证', '科技楼北侧101', 'e10adc3949ba59abbe56e057f20f883e', 6),
(6, '张建立', '1234567890', '1234567890', '兼职', '待认证', '河北师大', 'e10adc3949ba59abbe56e057f20f883e', 3),
(7, '吴丽华', '1234567890', '1234567890', '兼职', '待认证', '河北师大启打扫房间', 'e10adc3949ba59abbe56e057f20f883e', 3),
(8, '马浩宇', '1234567890', '1234567890', '兼职', '待认证', '河北师大启打扫房间', 'e10adc3949ba59abbe56e057f20f883e', 3),
(10, '骆静静', '1111111111', '1111111111', '商品', '待认证', '水电费你', 'e10adc3949ba59abbe56e057f20f883e', 4),
(11, '高小力', '1111111111', '1111111111', 'djie', '待认证', 'sdf', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(12, 'boss', '1234567890', '1234567890', 'boss', '已认证', '水电费', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(13, 'you', 'dddddd', 'dddddd', '商铺', '待认证', 'aaaaaaaaaaaaa', '123456', NULL),
(14, '123', '123', '123', '商铺', '待认证', 'aaaaaaaaaaaaa', '123456', NULL),
(15, 'ka', 'dddddd', 'dda', '商铺', '待认证', 'aadd', '123456', NULL),
(16, 'fdas', 'afdsf', 'afsd', '商铺', '待认证', 'afd', '123456', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `sh_cid` int(11) NOT NULL COMMENT '购物车id',
  `sh_cnum` int(11) NOT NULL COMMENT '商品数量',
  `bs_gidd` int(11) NOT NULL COMMENT '商品id',
  `ci_idddd` int(11) NOT NULL COMMENT '客户id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车';

--
-- 转存表中的数据 `shopping_cart`
--

INSERT INTO `shopping_cart` (`sh_cid`, `sh_cnum`, `bs_gidd`, `ci_idddd`) VALUES
(1, 2, 1, 1),
(2, 1, 2, 1),
(3, 2, 2, 3);

-- --------------------------------------------------------

--
-- 表的结构 `store_information`
--

CREATE TABLE `store_information` (
  `si_id` int(11) NOT NULL COMMENT '店家id',
  `si_name` varchar(255) NOT NULL COMMENT '店家名称',
  `si_sintroduce` text NOT NULL COMMENT '店家简介',
  `si_image` varchar(255) NOT NULL,
  `si_address` varchar(255) NOT NULL COMMENT '店家地址',
  `si_stime` time NOT NULL COMMENT '店家营业时间起',
  `si_etime` time NOT NULL COMMENT '店家营业时间止',
  `si_phone` varchar(11) NOT NULL COMMENT '店家联系方式',
  `s_type_id` int(11) NOT NULL COMMENT '店家类型id',
  `ss_id` int(11) NOT NULL COMMENT '店家状态id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店家信息表';

--
-- 转存表中的数据 `store_information`
--

INSERT INTO `store_information` (`si_id`, `si_name`, `si_sintroduce`, `si_image`, `si_address`, `si_stime`, `si_etime`, `si_phone`, `s_type_id`, `ss_id`) VALUES
(1, '大个饮品炒酸奶店', '大个炒酸奶周六日全部半价进店优惠，双十二全场半价', '/uploads/2016-12-10/chaosuannai.jpg', '国大超市', '08:00:00', '20:00:00', '18733161391', 2, 1),
(2, '蓝调理发店', '蓝调理发店烫染优惠', '/uploads/2016-12-10/landiao.jpg', '地下三层', '08:00:00', '21:00:00', '19824793274', 1, 1),
(3, '家教中介店', '各种类型家教兼职', '/uploads/2016-12-10/jianzhi.jpg', '师生活动中心', '09:00:00', '20:00:00', '15256732456', 3, 1),
(4, '国大超市', '国大超市优惠啦，位与二期宿舍', '/uploads/2016-12-10/guoda.jpg', '二期后', '08:30:00', '22:15:00', '12733937654', 2, 1),
(5, '地下畅购超市', '超市优惠，位与师大东门', '/uploads/2016-12-10/changgou.jpg', '地下一层', '10:00:00', '21:00:00', '14543443565', 2, 1),
(6, '炫动理发店', '服务周到12', '/uploads/2016-12-10/xuandong.jpg', '科楼南', '15:43:26', '15:43:24', '18733161391', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `store_state`
--

CREATE TABLE `store_state` (
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  `ss_name` varchar(255) NOT NULL COMMENT '店家状态名称'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='店家状态表';

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

CREATE TABLE `store_type` (
  `s_type_id` int(11) NOT NULL COMMENT '店家种类id',
  `s_type_name` varchar(255) NOT NULL COMMENT '店家类型'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

CREATE TABLE `trade_state` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(255) NOT NULL,
  `s_type_idd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='交易状态表';

--
-- 转存表中的数据 `trade_state`
--

INSERT INTO `trade_state` (`ts_id`, `ts_name`, `s_type_idd`) VALUES
(1, '理发预约取消', 1),
(2, '理发预约完成', 1),
(3, '理发预约进行中', 1),
(4, '理发预约推迟十分钟', 1),
(5, '购物交易取消', 2),
(6, '购物交易完成', 2),
(7, '购物交易进行中', 2),
(8, '兼职预约成功', 3),
(9, '发布人同意雇佣', 3),
(10, '发布人取消预约', 3),
(11, '兼职人取消雇佣', 3),
(12, '发布者取消雇佣', 3),
(13, '兼职人取消预约', 3);

-- --------------------------------------------------------

--
-- 表的结构 `trade_state_copy`
--

CREATE TABLE `trade_state_copy` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(255) NOT NULL,
  `s_type_idd` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='交易状态表';

--
-- 转存表中的数据 `trade_state_copy`
--

INSERT INTO `trade_state_copy` (`ts_id`, `ts_name`, `s_type_idd`) VALUES
(1, '理发预约取消', 1),
(2, '理发预约完成', 1),
(3, '理发预约取消', 1),
(4, '理发预约推迟十分钟', 1),
(5, '购物交易取消', 2),
(6, '购物交易完成', 2),
(7, '购物交易进行中', 2),
(8, '兼职预约成功', 3),
(9, '发布人同意雇佣', 3),
(10, '发布人取消预约', 3),
(11, '兼职人取消雇佣', 3),
(12, '发布者取消雇佣', 3),
(13, '兼职人取消预约', 3);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_save_goods`
--
CREATE TABLE `view_save_goods` (
`ci_id` int(11)
,`bs_gid` int(11)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `view_save_store`
--
CREATE TABLE `view_save_store` (
`ci_id` int(11)
,`si_id` int(11)
);

-- --------------------------------------------------------

--
-- 视图结构 `view_save_goods`
--
DROP TABLE IF EXISTS `view_save_goods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_goods`  AS  select `customer_information`.`ci_id` AS `ci_id`,`bs_goods`.`bs_gid` AS `bs_gid` from (`customer_information` join `bs_goods`) ;

-- --------------------------------------------------------

--
-- 视图结构 `view_save_store`
--
DROP TABLE IF EXISTS `view_save_store`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_store`  AS  select `customer_information`.`ci_id` AS `ci_id`,`store_information`.`si_id` AS `si_id` from (`customer_information` join `store_information`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appraise`
--
ALTER TABLE `appraise`
  ADD PRIMARY KEY (`appr_id`),
  ADD KEY `si_iddd` (`si_iddd`),
  ADD KEY `bs_gid` (`bs_gid`),
  ADD KEY `ci_iddd` (`ci_iddd`);

--
-- Indexes for table `bs_goods`
--
ALTER TABLE `bs_goods`
  ADD PRIMARY KEY (`bs_gid`),
  ADD KEY `bs_tid` (`bs_tid`),
  ADD KEY `bs_gsid` (`bs_gsid`),
  ADD KEY `bs_rid` (`bs_rid`);

--
-- Indexes for table `bs_goods_state`
--
ALTER TABLE `bs_goods_state`
  ADD PRIMARY KEY (`bs_gsid`);

--
-- Indexes for table `bs_many_goods`
--
ALTER TABLE `bs_many_goods`
  ADD PRIMARY KEY (`bs_mgid`),
  ADD KEY `bs_tr_id` (`bs_tr_id`),
  ADD KEY `bs_giddd` (`bs_giddd`),
  ADD KEY `sh_cid` (`sh_cid`);

--
-- Indexes for table `bs_recommend`
--
ALTER TABLE `bs_recommend`
  ADD PRIMARY KEY (`bs_rid`);

--
-- Indexes for table `bs_ recommend`
--
ALTER TABLE `bs_ recommend`
  ADD PRIMARY KEY (`bs_rid`);

--
-- Indexes for table `bs_trade`
--
ALTER TABLE `bs_trade`
  ADD PRIMARY KEY (`bs_tr_id`),
  ADD KEY `ci_id5` (`ci_id5`),
  ADD KEY `bs_sid` (`bs_sid`),
  ADD KEY `ts_iddd` (`ts_iddd`);

--
-- Indexes for table `bs_trade_information`
--
ALTER TABLE `bs_trade_information`
  ADD PRIMARY KEY (`bs_tr_inid`),
  ADD KEY `bs_tr_idd` (`bs_tr_idd`);

--
-- Indexes for table `bs_type`
--
ALTER TABLE `bs_type`
  ADD PRIMARY KEY (`bs_tid`),
  ADD KEY `si_id` (`si_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`ca_id`),
  ADD KEY `ci_idd` (`ci_idd`);

--
-- Indexes for table `customer_information`
--
ALTER TABLE `customer_information`
  ADD PRIMARY KEY (`ci_id`,`openid`);

--
-- Indexes for table `findpwd`
--
ALTER TABLE `findpwd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `haircut_order_type`
--
ALTER TABLE `haircut_order_type`
  ADD PRIMARY KEY (`ho_tyid`),
  ADD KEY `si_idd` (`si_idd`);

--
-- Indexes for table `order_time_pmun`
--
ALTER TABLE `order_time_pmun`
  ADD PRIMARY KEY (`ot_pnid`),
  ADD KEY `si_idddd` (`si_idddd`);

--
-- Indexes for table `order_trade`
--
ALTER TABLE `order_trade`
  ADD PRIMARY KEY (`or_tdid`),
  ADD KEY `ts_idd` (`ts_idd`),
  ADD KEY `storeid` (`storeid`),
  ADD KEY `ci_idid` (`ci_idid`);

--
-- Indexes for table `pt_person_information`
--
ALTER TABLE `pt_person_information`
  ADD PRIMARY KEY (`pt_pid`),
  ADD KEY `pt_sid` (`pt_sid`);

--
-- Indexes for table `pt_state`
--
ALTER TABLE `pt_state`
  ADD PRIMARY KEY (`pt_sid`);

--
-- Indexes for table `pt_trade`
--
ALTER TABLE `pt_trade`
  ADD PRIMARY KEY (`pt_trid`),
  ADD KEY `pt_inid` (`pt_inid`),
  ADD KEY `ts_id` (`ts_id`),
  ADD KEY `ci_id` (`ci_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pb_s_type_id` (`type`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`sh_cid`),
  ADD KEY `bs_gidd` (`bs_gidd`),
  ADD KEY `ci_idddd` (`ci_idddd`);

--
-- Indexes for table `store_information`
--
ALTER TABLE `store_information`
  ADD PRIMARY KEY (`si_id`),
  ADD KEY `s_type_id` (`s_type_id`),
  ADD KEY `ss_id` (`ss_id`);

--
-- Indexes for table `store_state`
--
ALTER TABLE `store_state`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `store_type`
--
ALTER TABLE `store_type`
  ADD PRIMARY KEY (`s_type_id`);

--
-- Indexes for table `trade_state`
--
ALTER TABLE `trade_state`
  ADD PRIMARY KEY (`ts_id`),
  ADD KEY `s_type_idd` (`s_type_idd`);

--
-- Indexes for table `trade_state_copy`
--
ALTER TABLE `trade_state_copy`
  ADD PRIMARY KEY (`ts_id`),
  ADD KEY `s_type_idd` (`s_type_idd`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `appraise`
--
ALTER TABLE `appraise`
  MODIFY `appr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价id', AUTO_INCREMENT=19;
--
-- 使用表AUTO_INCREMENT `bs_goods`
--
ALTER TABLE `bs_goods`
  MODIFY `bs_gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `bs_many_goods`
--
ALTER TABLE `bs_many_goods`
  MODIFY `bs_mgid` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易多种商品id', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `bs_recommend`
--
ALTER TABLE `bs_recommend`
  MODIFY `bs_rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品推荐id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `bs_ recommend`
--
ALTER TABLE `bs_ recommend`
  MODIFY `bs_rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品推荐id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `bs_trade`
--
ALTER TABLE `bs_trade`
  MODIFY `bs_tr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易id', AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `bs_trade_information`
--
ALTER TABLE `bs_trade_information`
  MODIFY `bs_tr_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '详情id', AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `bs_type`
--
ALTER TABLE `bs_type`
  MODIFY `bs_tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品种类id', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址id', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `customer_information`
--
ALTER TABLE `customer_information`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id', AUTO_INCREMENT=18;
--
-- 使用表AUTO_INCREMENT `findpwd`
--
ALTER TABLE `findpwd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id主键', AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `order_time_pmun`
--
ALTER TABLE `order_time_pmun`
  MODIFY `ot_pnid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `order_trade`
--
ALTER TABLE `order_trade`
  MODIFY `or_tdid` int(11) NOT NULL AUTO_INCREMENT COMMENT '预约id', AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `pt_information`
--
ALTER TABLE `pt_information`
  MODIFY `pt_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职id';
--
-- 使用表AUTO_INCREMENT `pt_person_information`
--
ALTER TABLE `pt_person_information`
  MODIFY `pt_pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职者id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `pt_trade`
--
ALTER TABLE `pt_trade`
  MODIFY `pt_trid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职交易id', AUTO_INCREMENT=1205020;
--
-- 使用表AUTO_INCREMENT `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '发布者id', AUTO_INCREMENT=17;
--
-- 使用表AUTO_INCREMENT `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `sh_cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id', AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `store_information`
--
ALTER TABLE `store_information`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家id', AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `store_type`
--
ALTER TABLE `store_type`
  MODIFY `s_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家种类id', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
