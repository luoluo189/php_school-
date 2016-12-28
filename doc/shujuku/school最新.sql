-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-26 09:47:28
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
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `bs_number` int(11) NOT NULL DEFAULT '1' COMMENT '商品数量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='结算表';

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='评价表' AUTO_INCREMENT=26 ;

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
(5, '商品一般', 4, 1, 2, 2),
(19, '理发不错，理发师很好，颜色很喜欢', 5, 2, 5, 1),
(20, '颜色很喜欢，拉直也很好', 5, 2, 5, 1),
(21, '很好很好很好', 5, 2, 5, 1),
(22, '国大超市很好，可乐冰冰的', 4, 4, 1, 1),
(23, '很好', 4, 4, 1, 1),
(24, '面包很好', 4, 4, 3, 1),
(25, '垃圾理发真的不好，叹气，叹气', 4, 2, 5, 6);

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
  `bs_gdescription` varchar(255) NOT NULL,
  `if_renzheng` int(11) DEFAULT '0' COMMENT 'renzheng是否认证（0为未认证）1为认证未认证的不可以显示到前台',
  `bs_gifshow` int(11) DEFAULT '1' COMMENT '软删除是否删除',
  PRIMARY KEY (`bs_gid`),
  KEY `bs_tid` (`bs_tid`),
  KEY `bs_gsid` (`bs_gsid`),
  KEY `bs_rid` (`bs_rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品信息表' AUTO_INCREMENT=210007 ;

--
-- 转存表中的数据 `bs_goods`
--

INSERT INTO `bs_goods` (`bs_gid`, `bs_gname`, `bs_gsize`, `bs_gprice`, `bs_gnumber`, `bs_gurl`, `bs_gmaketime`, `bs_tid`, `bs_gsid`, `bs_rid`, `bs_gdescription`, `if_renzheng`, `bs_gifshow`) VALUES
(20001, '可口可乐', '720ml大瓶', 7, 100, '/uploads/2016-12-08/kele.jpg', '2016-09-01 14:16:14', 6, 1, 1, '好喝的可口可乐', 1, 1),
(20002, '雪碧', '200ml小瓶', 3.5, 20, '/uploads/2016-12-08/xuebi.jpg', '2016-11-29 14:20:45', 7, 1, 1, '美味的雪碧', 1, 1),
(20003, '面包', '一包18个', 10, 20, '/uploads/2016-12-08/mianbao.jpg', '2016-11-29 14:24:35', 9, 1, 1, '好吃的面包', 1, 1),
(20005, '草莓炒酸奶', '小杯', 8, 5, '/uploads/2016-12-08/caomei.jpg', '0000-00-00 00:00:00', 0, 1, 1, '酸奶', 1, 1),
(20006, '香芋味奶茶', '大杯', 12, 12, '/uploads/2016-12-21/5859d94db02d5.jpg', '0000-00-00 00:00:00', 2, 1, 1, '香芋味奶茶', 1, 1),
(20007, '蓝莓味炒酸奶', '小杯', 8, 3, '/uploads/2016-12-08/lanmei.jpg', '0000-00-00 00:00:00', 1, 1, 1, '炒酸奶', 1, 1),
(20008, '红豆奶', '小杯', 30, 10, '/uploads/2016-12-08/hongdou.jpg', '0000-00-00 00:00:00', 11, 1, 1, '红豆奶', 1, 1),
(20009, '柠檬汁', '小杯', 4, 3, '/uploads/2016-12-08/ningmeng.jpg', '0000-00-00 00:00:00', 0, 1, 1, '柠檬汁、、、、', 1, 1),
(20010, '西瓜汁', '小杯', 5, 30, '/uploads/2016-12-08/xigua.jpg', '0000-00-00 00:00:00', 0, 1, 1, '西瓜汁精品', 1, 1),
(20011, '咖啡', '大杯', 5, 20, '/uploads/2016-12-08/kafei.jpg', '0000-00-00 00:00:00', 12, 1, 1, '咖啡豆研磨而成', 0, 1),
(20012, '柠檬红茶', '中杯', 5, 1, '/uploads/2016-12-21/5859da675794f.jpg', '0000-00-00 00:00:00', 16, 1, 1, '好喝的柠檬红茶', 1, 1),
(20013, '绿茶', '大杯', 6, 1, '/uploads/2016-12-21/5859db291006e.jpg', '0000-00-00 00:00:00', 17, 1, 1, '有浓浓的香味', 1, 1),
(20014, '营养快线', '500ml', 5, 39, '/uploads/2016-12-21/5859df0dcd8ec.jpg', '0000-00-00 00:00:00', 6, 1, 1, '营养快线，好喝有营养', 1, 1),
(20015, '蜂蜜柚子茶', '450ml', 4, 30, '/uploads/2016-12-21/5859df90e26af.jpg', '0000-00-00 00:00:00', 6, 1, 1, '柚子营养很高，蜂蜜柚子茶，清肺解渴，好喝不腻', 1, 1),
(20016, '老坛酸菜牛肉面', '一桶', 4, 46, '/uploads/2016-12-21/5859e02fcc3a4.jpg', '0000-00-00 00:00:00', 18, 1, 1, '老坛酸菜牛肉面，好吃不贵', 1, 1),
(20017, '酸辣牛肉面', '一桶', 4, 23, '/uploads/2016-12-21/5859e09d06511.jpg', '0000-00-00 00:00:00', 18, 1, 1, '酸辣牛肉面，酸酸的很好吃', 1, 1),
(20018, '君乐宝原味酸奶', '8杯', 10, 40, '/uploads/2016-12-21/5859e12124f96.jpg', '0000-00-00 00:00:00', 19, 1, 1, '君乐宝原味酸奶，有助于肠胃蠕动哦！', 1, 1),
(20019, '伊利纯牛奶', '一盒', 3, 86, '/uploads/2016-12-21/5859e18bdf8fe.jpg', '0000-00-00 00:00:00', 19, 1, 1, '伊利纯牛奶，好喝又营养', 1, 1),
(20020, '特仑苏牛奶', '一盒', 6, 39, '/uploads/2016-12-21/5859e1ec33ebd.jpg', '0000-00-00 00:00:00', 19, 1, 1, '特仑苏牛奶提供了市场稀缺的高品质奶源', 1, 1),
(20021, '毛巾', '1块', 10, 100, '/uploads/2016-12-22/585b2f6ed982b.jpg', '0000-00-00 00:00:00', 20, 1, 1, '毛巾很软，很舒服\r\n', 1, 0),
(20022, '中华牙膏', '1支', 10, 30, '/uploads/2016-12-21/5859e2b42c44f.jpg', '0000-00-00 00:00:00', 21, 1, 1, '中华牙膏，我的微笑，闪亮未来', 1, 1),
(20023, '相宜本草洗面奶', '1支', 30, 20, '/uploads/2016-12-21/5859e30f910ba.jpg', '0000-00-00 00:00:00', 21, 1, 1, '相宜本草洗面奶，清洁、营养、保护皮肤', 1, 1),
(20024, '爽肤水', '1支', 50, 20, '/uploads/2016-12-21/5859e38300d0d.jpg', '0000-00-00 00:00:00', 22, 1, 1, '8杯水爽肤水，买一赠一', 1, 1),
(20025, '乳液', '1支', 76, 32, '/uploads/2016-12-21/5859e3d472bf9.jpg', '0000-00-00 00:00:00', 22, 1, 1, '8杯水乳液，每天八杯水，美丽每一天', 1, 1),
(20026, '5455脉动', '550ml', 5, 23, '/uploads/2016-12-21/5859e5cfa8940.jpg', '0000-00-00 00:00:00', 6, 1, 1, '脉动,每天一瓶，脉动回来', 1, 0),
(20028, '原味紫菜包饭', '1份', 7, 22, '/uploads/2016-12-22/585b2f246b0d8.jpg', '0000-00-00 00:00:00', 28, 1, 1, '原味紫菜包饭，好吃不腻，给你最原的味道', 1, 1),
(20029, '泡菜紫菜包饭', '1份', 7, 30, '/uploads/2016-12-22/585b2fa02b0a1.jpg', '0000-00-00 00:00:00', 28, 1, 1, '泡菜紫菜包饭，添加好多泡菜，给你韩国特有的味道', 1, 1),
(20030, '肉松紫菜包饭', '1份', 8, 40, '/uploads/2016-12-22/585b30dfb4209.jpg', '0000-00-00 00:00:00', 28, 1, 1, '肉松紫菜包饭，有肉松哦，很好吃，尝尝吧', 1, 1),
(20031, '香蕉紫菜包饭', '1份', 9, 60, '/uploads/2016-12-22/585b3096aad40.jpg', '0000-00-00 00:00:00', 28, 1, 1, '香蕉紫菜包饭，有你最爱的水果，香蕉哦。', 1, 1),
(20032, '樱花紫菜包饭', '1份', 13, 50, '/uploads/2016-12-22/585b31e2f0e87.jpg', '0000-00-00 00:00:00', 28, 1, 1, '樱花紫菜包饭，好看又好吃', 1, 1),
(20033, '香菇鸡肉馄饨', '1份', 10, 19, '/uploads/2016-12-22/585b348d94bfc.jpg', '0000-00-00 00:00:00', 29, 1, 1, '香菇鸡肉馄饨，肉大，皮薄，很好吃哦', 1, 1),
(20034, '鲜肉大葱馄饨', '1份', 13, 13, '/uploads/2016-12-22/585b34fa7b1d6.jpg', '0000-00-00 00:00:00', 29, 1, 1, '鲜肉大葱馄饨，很好吃哦', 1, 1),
(20035, '酸菜肉丝面', '1份', 12, 13, '/uploads/2016-12-22/585b355eae877.jpg', '0000-00-00 00:00:00', 30, 1, 1, '酸菜肉丝面，面的味道很好哦，快来尝尝吧', 1, 1),
(20036, '玉米肉饺子', '1份', 13, 14, '/uploads/2016-12-22/585b35e13db36.jpg', '0000-00-00 00:00:00', 31, 1, 1, '玉米肉饺子，玉米和肉的味道结合起来了呢', 1, 1),
(20037, '云吞面', '1份', 15, 12, '/uploads/2016-12-22/585b36513c58d.jpg', '0000-00-00 00:00:00', 32, 1, 1, '云吞面，有面也有馄饨哦，很好吃哦', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bs_goods_state`
--

CREATE TABLE IF NOT EXISTS `bs_goods_state` (
  `bs_gsid` int(11) NOT NULL,
  `bs_gsname` varchar(255) NOT NULL,
  PRIMARY KEY (`bs_gsid`)
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='交易多种商品表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `bs_many_goods`
--

INSERT INTO `bs_many_goods` (`bs_mgid`, `bs_tr_id`, `bs_giddd`, `bs_mgnum`, `sh_cid`) VALUES
(1, 1, 20003, 2, 1),
(2, 5, 20002, 3, 1),
(3, 2, 20001, 2, 3),
(4, 1, 20002, 1, 2),
(5, 7, 20007, 3, 3),
(6, 8, 20008, 2, 1),
(7, 9, 20008, 3, 1),
(8, 10, 20007, 4, 3),
(9, 7, 20006, 2, 2),
(10, 8, 20011, 1, 3),
(11, 7, 20010, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `bs_recommend`
--

CREATE TABLE IF NOT EXISTS `bs_recommend` (
  `bs_rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品推荐id',
  `bs_rname` varchar(255) NOT NULL COMMENT '商品推荐名称id',
  PRIMARY KEY (`bs_rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品推荐' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `bs_recommend`
--

INSERT INTO `bs_recommend` (`bs_rid`, `bs_rname`) VALUES
(1, '推荐'),
(3, '不推荐');

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
  `ifshow` int(11) NOT NULL DEFAULT '1',
  `if_see` int(11) DEFAULT '1' COMMENT '客户是否删除订单1未删除 0为删除',
  PRIMARY KEY (`bs_tr_id`),
  KEY `ci_id5` (`ci_id5`),
  KEY `bs_sid` (`bs_sid`),
  KEY `ts_iddd` (`ts_iddd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品类交易表' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `bs_trade`
--

INSERT INTO `bs_trade` (`bs_tr_id`, `ci_id5`, `bs_sid`, `bs_tr_xtime`, `bs_tr_time`, `bs_tr_way`, `ts_iddd`, `ifshow`, `if_see`) VALUES
(1, 6, 1, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1, 1),
(2, 6, 1, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', 6, 1, 1),
(3, 6, 1, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1, 1),
(4, 6, 1, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', 7, 1, 1),
(5, 6, 4, '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', 7, 1, 1),
(6, 6, 2, '2016-12-07 00:00:00', '2016-12-08 00:00:00', '自取', 7, 1, 1),
(7, 6, 1, '2016-12-07 00:00:00', '2016-12-08 00:00:00', '自取', 6, 1, 1),
(8, 6, 1, '2016-12-07 00:00:00', '2016-12-09 00:00:00', '在线支付', 7, 1, 1),
(9, 6, 1, '2016-12-07 00:00:00', '2016-12-15 00:00:00', '自取', 5, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bs_trade_information`
--

CREATE TABLE IF NOT EXISTS `bs_trade_information` (
  `bs_tr_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '详情id',
  `bs_tr_idd` int(11) NOT NULL COMMENT '交易id',
  `bs_tr_inaddress` varchar(255) NOT NULL COMMENT '交易地址',
  `bs_tr_inmoney` varchar(255) NOT NULL COMMENT '成交金额',
  `bs_tr_intime` datetime NOT NULL COMMENT '成交时间',
  `bs_tr_inphone` char(11) NOT NULL COMMENT '客户联系方式',
  PRIMARY KEY (`bs_tr_inid`),
  KEY `bs_tr_idd` (`bs_tr_idd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='交易详情表' AUTO_INCREMENT=11 ;

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
(8, 10, '师大科技', '32', '2016-12-07 00:00:00', '12378678567'),
(9, 5, '软件学院', '60元', '2016-12-06 00:00:00', '34123212321'),
(10, 6, '师大科技', '32', '2016-12-07 00:00:00', '12378678567');

-- --------------------------------------------------------

--
-- 表的结构 `bs_type`
--

CREATE TABLE IF NOT EXISTS `bs_type` (
  `bs_tid` varchar(64) NOT NULL COMMENT '商品种类id',
  `bs_tname` varchar(255) NOT NULL COMMENT '商品种类名称',
  `si_id` int(11) NOT NULL COMMENT '店家id',
  `bs_tyifshow` int(11) DEFAULT '1' COMMENT '是否软删除',
  PRIMARY KEY (`bs_tid`),
  KEY `si_id` (`si_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品种类表';

--
-- 转存表中的数据 `bs_type`
--

INSERT INTO `bs_type` (`bs_tid`, `bs_tname`, `si_id`, `bs_tyifshow`) VALUES
('1', '炒酸奶', 1, 1),
('2', '奶茶', 1, 1),
('37', '骆静静1', 4, 0),
('38', '逻辑宁', 4, 0),
('6', '饮料', 4, 1),
('7', '饮料', 5, 1),
('39', '圣诞节佛 ', 4, 0),
('9', '面包', 4, 1),
('10', '花茶', 1, 0),
('11', '红豆奶', 1, 1),
('12', '热饮', 1, 1),
('13', '冷饮', 1, 0),
('14', '果汁', 1, 0),
('15', '珍珠奶茶', 1, 0),
('16', '柠檬红茶', 1, 1),
('17', '绿茶', 1, 1),
('18', '泡面', 4, 1),
('19', '牛奶', 4, 1),
('20', '毛巾', 4, 1),
('21', '洗漱用品', 4, 1),
('22', '护肤品', 4, 1),
('23', '宿舍用品', 5, 1),
('24', '小零食', 5, 1),
('25', '面包', 5, 0),
('26', '打折商品', 5, 1),
('40', '1', 4, 0),
('28', '紫菜包饭', 7, 1),
('29', '馄饨', 10, 1),
('30', '面食', 10, 1),
('31', '饺子', 10, 1),
('32', '云吞面', 10, 1),
('34', '红茶', 1, 0),
('41', '高小力2', 4, 1);

-- --------------------------------------------------------

--
-- 表的结构 `customer_address`
--

CREATE TABLE IF NOT EXISTS `customer_address` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址id',
  `ca_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ca_address` varchar(255) NOT NULL COMMENT '具体地址',
  `ca_phone` varchar(255) NOT NULL COMMENT '手机号',
  `ci_idd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`ca_id`),
  KEY `ci_idd` (`ci_idd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT=' 客户地址表' AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `customer_address`
--

INSERT INTO `customer_address` (`ca_id`, `ca_name`, `ca_address`, `ca_phone`, `ci_idd`) VALUES
(12, '洛洛', '河北师范大学', '18733161391', 6),
(4, '栗', '一期宿舍', '15232167589', 6),
(5, '骆静静', '河北师范大学', '1872222222', 6),
(6, '骆静静', '河北师范大学软件学院', '18733161391', 6),
(7, '骆静静', '河北师范大学软件学院', '18733161391', 6),
(19, '李雪1号', '河北师大', '15230153889', 47),
(20, '李雪2号', '河北师大', '15230153889', 47),
(18, '李雪', '河北师大', '15230153889', 47);

-- --------------------------------------------------------

--
-- 表的结构 `customer_information`
--

CREATE TABLE IF NOT EXISTS `customer_information` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `ci_name` varchar(255) DEFAULT NULL COMMENT '客户昵称',
  `ca_idd` varchar(255) DEFAULT NULL COMMENT '客户地址',
  `openid` varchar(255) NOT NULL COMMENT '用户微信登陆id',
  PRIMARY KEY (`ci_id`,`openid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='客户信息表' AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `customer_information`
--

INSERT INTO `customer_information` (`ci_id`, `ci_name`, `ca_idd`, `openid`) VALUES
(1, '妮妮', '18', ''),
(2, '贝贝', '1', ''),
(3, '蕾蕾', '1', ''),
(4, '舒雅', '1', ''),
(5, '阳阳', '1', ''),
(7, '测试小号', NULL, 'oGmF1wn5ecjNQaC2HxlG0nR828c0'),
(8, 'Amber', NULL, 'oGmF1whYFbVqIcCJq9MZUqiZDrfk'),
(32, 'crctz', NULL, 'oGmF1wu2gEtnUT7usOEydTRt9Gnc'),
(47, '暖雪', '20', 'oGmF1wmhdaeYoCpjARtkgq-QkykA'),
(51, '飞飞', NULL, 'oGmF1wl8p1cYvNiTaZs2WtFhrJ64'),
(16, '昱暘', NULL, 'oGmF1wqaNslRpUhRMtq1oFTt0O-k'),
(17, '小栗子', NULL, 'oGmF1wqfggQY5kxcg9NXTV7MFImQ'),
(21, 'Liheatyan', NULL, 'oGmF1wop2Jdinzr9iL97pNJbwjEY'),
(6, 'zaza', '5', 'oGmF1wmvKUmi_ZOFOpQ86UAaTOgY');

-- --------------------------------------------------------

--
-- 表的结构 `findpwd`
--

CREATE TABLE IF NOT EXISTS `findpwd` (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id主键',
  `si_name` varchar(255) NOT NULL COMMENT '店铺名称',
  `st_pon` varchar(255) NOT NULL COMMENT '店主名称',
  `si_phone` varchar(11) NOT NULL COMMENT '联系电话',
  `idnumber` varchar(255) NOT NULL COMMENT '身份证号',
  `s_type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `findpwd`
--

INSERT INTO `findpwd` (`id`, `si_name`, `st_pon`, `si_phone`, `idnumber`, `s_type`) VALUES
(1, 'ni', 'ad', 'dd', 'ss', '1'),
(2, 'fdsaf', 'ref', 'fasd', 'fdsa', '商铺'),
(3, 'fadsafd', 'adsf', 'afds', 'afsd', '商铺'),
(4, 'ad', 'df', 'afd', 'afdsf', '商铺'),
(5, 'fasd', 'fads', 'fasd', 'fdas', '兼职'),
(6, '丫丫饮品店', '骆静静', '18733161391', '13112619961029094X', '商铺');

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

CREATE TABLE IF NOT EXISTS `home_page_pic` (
  `pic_one` varchar(255) NOT NULL,
  `pic_two` varchar(255) NOT NULL,
  `pic_three` varchar(255) NOT NULL,
  `pic_four` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='首页轮播图';

-- --------------------------------------------------------

--
-- 表的结构 `order_time_pmun`
--

CREATE TABLE IF NOT EXISTS `order_time_pmun` (
  `ot_pnid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ot_pntime` varchar(255) NOT NULL COMMENT '可预约时间段',
  `ot_pnpnum` int(11) NOT NULL COMMENT '可预约人数',
  `si_idddd` int(11) NOT NULL COMMENT '预约类型id',
  `ot_ifshow` int(11) DEFAULT '1' COMMENT '是否显示假性删除1 为显示',
  `ot_type` varchar(255) DEFAULT NULL COMMENT '预约类型名称',
  PRIMARY KEY (`ot_pnid`),
  KEY `si_idddd` (`si_idddd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='可预约时间人数' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `order_time_pmun`
--

INSERT INTO `order_time_pmun` (`ot_pnid`, `ot_pntime`, `ot_pnpnum`, `si_idddd`, `ot_ifshow`, `ot_type`) VALUES
(1, '6：00-14：00', 4, 2, 0, '理发'),
(3, '6：00-14：00', 6, 2, 0, '染发'),
(4, '6：00-14：00', 4, 6, 1, '拉直'),
(6, '12:00-14：00', 1, 2, 0, '烫发'),
(7, '12:00-14：00', 111, 2, 0, '剃光头'),
(8, '08:00-12 : 00', 2, 2, 0, '烫发'),
(9, '8:00-12:00', 1, 2, 0, '剪发烫发染发'),
(10, '8:00-12:00', 4, 6, 1, '烫发'),
(11, '8：00-11:00', 4, 2, 1, '剪发'),
(12, '14:00-16:00', 3, 2, 1, '离子烫'),
(13, '15:00-18:00', 3, 2, 1, '烫发'),
(14, '18:00-20:00', 4, 2, 1, '时尚造型'),
(15, '8:00-10:00', 2, 8, 1, '离子烫'),
(16, '15:00-18:00', 5, 8, 1, '剪发'),
(17, '19:00-21:00', 4, 8, 1, '染、烫'),
(18, '9:00-12:00', 2, 11, 1, '离子烫、染'),
(19, '14:00-18:00', 4, 11, 1, '精品烫、染'),
(20, '19:00-21:00', 5, 11, 1, '时尚造型'),
(21, '8:00-11:00', 4, 13, 1, '剪发'),
(22, '14:00-18:00', 5, 13, 1, '离子烫、染'),
(23, '18:00-21:00', 6, 13, 1, '时尚造型'),
(24, '8:00-10:00', 5, 9, 1, '剪发'),
(25, '11:00-14:00', 3, 9, 1, '离子烫'),
(26, '16:00-18:00', 4, 9, 1, '护理'),
(27, '19:00-21:00', 4, 9, 1, '时尚造型');

-- --------------------------------------------------------

--
-- 表的结构 `order_trade`
--

CREATE TABLE IF NOT EXISTS `order_trade` (
  `or_tdid` int(11) NOT NULL AUTO_INCREMENT COMMENT '预约id',
  `or_tdday` date DEFAULT NULL COMMENT '理发预约时间（天）',
  `or_tdtime` varchar(255) NOT NULL COMMENT '预约时间(时间段)',
  `hair_name` varchar(255) DEFAULT NULL COMMENT '客户名称',
  `hair_gender` varchar(255) DEFAULT NULL COMMENT '预约者的性别',
  `hair_number` varchar(11) DEFAULT NULL COMMENT '预约者的手机号',
  `hair_long` varchar(255) DEFAULT NULL COMMENT '头发长度',
  `hair_content` varchar(255) DEFAULT NULL COMMENT '备注',
  `or_typename` varchar(255) DEFAULT NULL COMMENT '预约类型id',
  `ci_idid` int(11) DEFAULT NULL COMMENT '客户id',
  `storeid` int(11) DEFAULT NULL COMMENT '理发商家id',
  `ts_idd` int(11) NOT NULL COMMENT '交易状态id',
  `or_ifshow` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示1为显示(后台假性删除)',
  `or_ifsee` int(11) NOT NULL DEFAULT '1' COMMENT '客户软删除',
  PRIMARY KEY (`or_tdid`),
  KEY `ts_idd` (`ts_idd`),
  KEY `storeid` (`storeid`),
  KEY `ci_idid` (`ci_idid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT=' 预约类交易表' AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `order_trade`
--

INSERT INTO `order_trade` (`or_tdid`, `or_tdday`, `or_tdtime`, `hair_name`, `hair_gender`, `hair_number`, `hair_long`, `hair_content`, `or_typename`, `ci_idid`, `storeid`, `ts_idd`, `or_ifshow`, `or_ifsee`) VALUES
(1, '2016-12-06', '8:00-12:00', '李小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 6, 4, 1, 1),
(2, '2016-12-06', '8:00-12:00', '李小二', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 6, 4, 1, 1),
(3, '2016-12-07', '8:00-12:00', '黄小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 2, 2, 1, 1),
(5, '2016-12-07', '8:00-12:00', '王小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 6, 2, 1, 1, 1),
(7, '2016-12-06', '8:00-12:00', '李小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 6, 2, 1, 1, 1),
(8, '2016-12-07', '8:00-12:00', '王小二', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', 2, 6, 3, 1, 1),
(9, '2016-12-07', '8:00-12:00', '王小冰', '女', '12345678901', '中长发', '发质黑粗', '拉直，染色', NULL, 6, 4, 1, 1),
(10, '2016-12-06', '8:00-12:00', '钱小二', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 6, 2, 2, 1, 1),
(11, '2016-12-06', '8:00-12:00', '孙小四', '男', '12345678901', '长发', '烫染发质较为枯黄', '染发', 1, 2, 1, 1, 1),
(22, '2016-12-31', '19:00-21:00', '李雪', '男', '12378190238', '中长发', '拉直，发质较粗糙', '拉直', 6, 6, 4, 1, 1),
(14, '2016-12-23', '8:00-12:00', '骆静静', '女', '18733161391', '中长发', '骆静静', '拉直', 2, 2, 1, 0, 1),
(19, '2016-12-24', '9:00-11:30', '李雪', '女', '12', '中长发', '124124', '理发染发', 2, 2, 1, 0, 1),
(23, '2016-12-20', '9:00-11:30', '李雪', '女', '15230153889', '短发', '12412', '理发染发', NULL, 2, 3, 1, 1),
(20, '2016-12-30', '16:00-18:00', '骆静静', '女', '18733161391', '中长发', '拉直加烫染，中长发', '拉直', 6, 6, 4, 1, 1),
(24, '2016-12-22', '9:00-11:30', '李雪', '女', '15230153889', '短发', '1124', '理发染发', 12, 2, 3, 1, 1),
(25, '2016-12-20', '9:00-11:30', '李雪', '女', '15230153889', '短发', '12124', '理发染发', 12, 2, 3, 1, 1),
(26, '2016-12-30', '9:00-11:30', '12241', '男', '15230153889', '短发', '124124', '拉直烫发', 12, 6, 3, 1, 1),
(27, '2016-12-28', '9:00-11:30', '李雪', '女', '15230153889', '短发', '12421', '拉直烫发', 12, 6, 3, 1, 1),
(28, '2016-12-31', '9:00-11:30', '李雪', '女', '15230153889', '中长发', '24124', '理发染发', 43, 2, 3, 0, 1),
(29, '2016-12-21', '9:00-11:30', '李雪', '女', '15230153889', '短发', '124124', '理发染发', 47, 2, 1, 1, 1),
(30, '2016-12-21', '9:00-11:30', '李雪', '女', '15230153889', '短发', '124124', '拉直烫发', 47, 6, 3, 1, 1),
(31, '2016-12-21', '9:00-11:30', '李雪', '女', '15230153889', '中长发', '124124', '剪发离子烫', 47, 9, 3, 1, 1),
(32, '2017-01-24', '9:00-11:30', '李雪', '女', '15230153889', '中长发', '(´இ皿இ｀)', '剪发离子烫、染', 47, 13, 3, 1, 1),
(33, '2016-12-31', '9:00-11:30', '123', '女', '15230153889', '短发', '1按需求', '理发染发', 6, 2, 3, 1, 1),
(34, '2016-12-29', '9:00-11:30', '123', '女', '15230153889', '短发', '1空', '理发烫发', 6, 2, 3, 1, 1),
(35, '2016-12-30', '16:00-18:00', '骆静静25', '女', '18733161391', '中长发', '发质较硬', '离子烫护理', 6, 9, 3, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pt_information`
--

CREATE TABLE IF NOT EXISTS `pt_information` (
  `pt_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职id',
  `pt_inname` varchar(255) NOT NULL COMMENT '兼职名称',
  `pt_inmoney` varchar(255) NOT NULL COMMENT '兼职报酬',
  `pt_intime_a` date DEFAULT NULL COMMENT '兼职时间起',
  `pt_intime_b` date DEFAULT NULL COMMENT '兼职时间止',
  `pt_inweeka` varchar(255) DEFAULT NULL COMMENT '兼职的周几到周几 第一个',
  `pt_inweekb` varchar(255) DEFAULT '' COMMENT '兼职的周几到周几 第二个',
  `pt_innum` int(11) DEFAULT '1' COMMENT '兼职所需人数',
  `pt_inabstract` varchar(255) NOT NULL COMMENT '兼职简介',
  `pt_inaddress` varchar(255) NOT NULL COMMENT '兼职地址',
  `pt_ifshow` int(11) DEFAULT '1',
  `pt_min_id` int(11) NOT NULL COMMENT '发布者id',
  `pt_min_phonee` varchar(11) NOT NULL,
  `if_renzheng` int(11) DEFAULT '1' COMMENT 'renzheng是否认证（0为未认证）1为认证未认证的不可以显示到前台',
  PRIMARY KEY (`pt_inid`),
  KEY `pt_min_id` (`pt_min_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='兼职信息表' AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `pt_information`
--

INSERT INTO `pt_information` (`pt_inid`, `pt_inname`, `pt_inmoney`, `pt_intime_a`, `pt_intime_b`, `pt_inweeka`, `pt_inweekb`, `pt_innum`, `pt_inabstract`, `pt_inaddress`, `pt_ifshow`, `pt_min_id`, `pt_min_phonee`, `if_renzheng`) VALUES
(1, '传单', '一天50', '2016-12-06', '2016-12-13', '一', '三', 1, '给食堂的饭做宣传讯息换                                                                                                       ', '师大大食堂', 0, 6, '12323982748', 1),
(2, '物理家教', '一小时50', '2016-12-06', '2016-12-13', '一', '二', 1, '高中物理家教                                                                ', '裕华区', 0, 6, '32431235345', 1),
(3, '数学家教', '一小时50', '2016-12-04', '2016-12-10', '一', '三', 1, '高中数学家教', '裕华区', 0, 6, '23435426454', 1),
(4, '物理家教', '一小时50', '2016-12-05', '2016-12-29', '三', '七', 1, '高中物理家教', '裕华区', 0, 6, '34534212325', 1),
(5, '手工', '一小时50', '2016-11-29', '2016-12-27', '四', '四', 1, '做玩具', '裕华区', 0, 6, '23415465734', 1),
(6, '兼职超市促销', '120元/天', '2016-12-29', '2016-12-31', '四', '六', 4, '兼职超市促销促销', '北国超市', 0, 6, '18733161391', 1),
(7, '12232', '1', '2016-12-14', '2016-12-22', '一', '五', 5, '1', '1', 0, 9, '1', 1),
(18, '北国超市扮演圣诞老人', '80元/3个小时', '2016-12-23', '2016-12-25', '五', '日', 16, '北国超市扮演圣诞老人，三个小时', '北国超市蓝山店', 0, 6, '18733161391', 1),
(19, '校内传单', '50元', '2016-12-21', '2016-12-23', '二', '四', 23, '在校内发撺掇', '师大校内', 0, 7, '235634235', 1),
(20, '校内传单2', '50元/天', '2016-12-24', '2016-12-25', '一', '一', 7, '在高校内宣传分期乐，让分期乐融入大学生活。                                                                        ', '河北师范大学校内', 1, 6, '15230090762', 1),
(21, '物理家教', '50元/小时', '2016-09-22', '2016-12-23', '一', '一', 1, '辅导初三学生物理内容：辅导写作业和讲解                                    ', '石门小区3#303 槐中路翟营大街附近', 1, 6, '15230090762', 1),
(22, '英语家教', '50元/小时', '2016-09-19', '2016-12-31', '一', '日', 2, '辅助高三学生进一步提高英语成绩', '青园小区7#303青园街', 1, 6, '15231190062', 1),
(28, '店铺店员', '25元/小时', '2016-09-06', '2016-12-31', '三', '五', 1, '根据顾客皮肤状况，推荐合适护肤品，有经验者优先', '河北师范大学东门地下商场柚子美妆', 1, 7, '15230090763', 1),
(24, '超市促销', '50元/天', '2016-12-24', '2016-12-25', '六', '日', 6, '超市促销，疯狂甩卖', '河北师范大学东门畅购超市', 1, 6, '15130190762', 1),
(25, '玩偶促销', '100元/天', '2016-12-01', '2016-12-31', '六', '日', 10, '玩偶扮演，宣传红木家具', '裕华区红星美凯龙家具城', 1, 7, '15231180762', 1),
(26, '婚纱模特', '100元/天', '2016-12-24', '2016-12-25', '六', '日', 1, '充当婚纱模特，吸引顾客目光', '裕华区万达店', 1, 7, '13731190762', 1),
(27, '数学家教', '50元/小时', '2016-10-01', '2016-12-31', '一', '日', 1, '辅导初中数学，进行答疑解惑', '东方花园5#505裕华路高速路口附近', 1, 7, '15531190762', 1),
(29, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 0, 6, '', 1),
(30, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 0, 6, '', 1),
(31, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 1, 6, '', 1),
(32, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 1, 6, '', 1),
(37, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 1, 6, '', 1),
(36, '', '', '0000-00-00', '0000-00-00', '一', '一', 0, '', '', 1, 6, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `pt_manager_information`
--

CREATE TABLE IF NOT EXISTS `pt_manager_information` (
  `pt_min_id` int(11) NOT NULL COMMENT '发表者id',
  `pt_min_name` varchar(255) NOT NULL COMMENT '发表者姓名',
  `pt_min_image` varchar(255) DEFAULT '/uploads/2016-12-10/jianzhi.jpg' COMMENT '兼职发布者头像',
  `pt_min_IDnum` char(18) NOT NULL DEFAULT '' COMMENT '发表者身份证号',
  `pt_min_phone` char(11) NOT NULL COMMENT '发表者手机号',
  `pt_min_type` varchar(255) NOT NULL COMMENT '发表者种类',
  `pt_min_app_state` varchar(255) NOT NULL COMMENT '发表者认证状态',
  PRIMARY KEY (`pt_min_id`),
  KEY `pt_min_phone` (`pt_min_phone`),
  KEY `pt_min_id` (`pt_min_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='兼职发布者信息表';

--
-- 转存表中的数据 `pt_manager_information`
--

INSERT INTO `pt_manager_information` (`pt_min_id`, `pt_min_name`, `pt_min_image`, `pt_min_IDnum`, `pt_min_phone`, `pt_min_type`, `pt_min_app_state`) VALUES
(6, 'jianzhi', '/uploads/2016-12-22/585b7f9f2574c.jpg', '13044512086122', '15232156786', '兼职', '已认证'),
(7, '李丽', '/uploads/2016-12-22/585b900bd1301.jpg', '1234567890', '1234567890', '兼职', '已认证'),
(8, '马浩宇', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证'),
(9, '张晓桑', '/uploads/2016-12-10/jianzhi.jpg', '1234567890', '1234567890', '兼职', '已认证');

-- --------------------------------------------------------

--
-- 表的结构 `pt_person_information`
--

CREATE TABLE IF NOT EXISTS `pt_person_information` (
  `pt_pid` int(11) NOT NULL COMMENT '兼职者id',
  `pt_pname` varchar(255) NOT NULL COMMENT '兼职者昵称',
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_pphone` varchar(11) NOT NULL COMMENT '手机号',
  PRIMARY KEY (`pt_pid`),
  KEY `pt_sid` (`pt_sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='兼职者信息表';

--
-- 转存表中的数据 `pt_person_information`
--

INSERT INTO `pt_person_information` (`pt_pid`, `pt_pname`, `pt_sid`, `pt_pphone`) VALUES
(1, '张三', 0, '11111111111'),
(2, '李四', 1, '12345632123'),
(3, '王五', 0, '13454345432'),
(6, '骆静静', 0, '18733333333'),
(47, '暖雪', 0, '15230153889');

-- --------------------------------------------------------

--
-- 表的结构 `pt_state`
--

CREATE TABLE IF NOT EXISTS `pt_state` (
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_sname` varchar(255) NOT NULL COMMENT '兼职状态名称',
  PRIMARY KEY (`pt_sid`)
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

CREATE TABLE IF NOT EXISTS `pt_trade` (
  `pt_trid` int(11) NOT NULL COMMENT '兼职交易id(由客户id，兼职id，时间戳组合而成)',
  `pt_trtime` datetime NOT NULL COMMENT '交易时间',
  `pt_trremark` varchar(255) NOT NULL COMMENT '交易备注',
  `pt_inid` int(11) NOT NULL COMMENT '兼职id',
  `ts_id` int(11) NOT NULL DEFAULT '8' COMMENT '交易状态id',
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `pt_trifshow` int(11) NOT NULL DEFAULT '1' COMMENT '订单是否显示（后台假性删除）',
  `pt_trifsee` int(11) DEFAULT '1',
  PRIMARY KEY (`pt_trid`),
  KEY `pt_inid` (`pt_inid`),
  KEY `ts_id` (`ts_id`),
  KEY `ci_id` (`ci_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='兼职类交易表';

--
-- 转存表中的数据 `pt_trade`
--

INSERT INTO `pt_trade` (`pt_trid`, `pt_trtime`, `pt_trremark`, `pt_inid`, `ts_id`, `ci_id`, `pt_trifshow`, `pt_trifsee`) VALUES
(1482588236, '2016-12-24 22:03:56', '！1164846', 5, 8, 6, 1, 1),
(4317, '2016-12-22 14:58:46', '14124124', 1, 13, 43, 1, 1),
(1205006, '2016-12-21 19:53:27', '有多种兼职经验', 4, 9, 6, 1, 1),
(1205009, '2016-12-20 16:35:47', '有丰富兼职经验', 6, 13, 6, 0, 1),
(1205010, '2016-12-20 16:40:48', '骆静静', 6, 11, 6, 1, 0),
(17, '2016-12-22 10:47:16', '124124124', 6, 9, 6, 1, 1),
(77, '2016-12-22 10:48:53', '兼职经验丰富', 6, 9, 6, 1, 1),
(187, '2016-12-22 11:36:07', '骆静静，有丰富的兼职经验认真仔细', 18, 9, 6, 1, 1),
(4327, '2016-12-22 16:07:05', '12321', 6, 8, 43, 1, 1),
(43267, '2016-12-22 16:08:35', '为', 6, 9, 6, 1, 1),
(4367, '2016-12-22 16:16:01', '兼职经验丰富', 6, 13, 43, 1, 1),
(43187, '2016-12-22 16:36:50', '12412', 18, 8, 6, 1, 1),
(43277, '2016-12-22 16:58:59', '12412', 6, 8, 6, 1, 1),
(1482404309, '2016-12-22 18:58:29', '人请问若无若', 6, 8, 43, 1, 1),
(1482404639, '2016-12-22 19:03:59', '124124', 2, 8, 6, 1, 1),
(1482407908, '2016-12-22 19:58:28', '15230153889', 6, 8, 6, 1, 1),
(1482407921, '2016-12-22 19:58:41', '15230153889', 19, 8, 47, 1, 1),
(1482408032, '2016-12-22 20:00:32', '15230153889', 26, 8, 6, 1, 1),
(1482408109, '2016-12-22 20:01:49', '15230153889', 27, 8, 47, 1, 1),
(1482408115, '2016-12-22 20:01:55', '15230153889', 27, 8, 6, 1, 1),
(1482408123, '2016-12-22 20:02:03', '15230153889', 27, 8, 47, 1, 1),
(1482586038, '2016-12-24 21:27:18', '第三方多个', 18, 8, 6, 1, 1),
(1482586214, '2016-12-24 21:30:14', '各家各户', 22, 8, 47, 1, 1),
(1482586472, '2016-12-24 21:34:32', '张天艺', 27, 8, 6, 1, 1),
(1482586739, '2016-12-24 21:38:59', '店铺店员', 28, 8, 6, 1, 1),
(1482587447, '2016-12-24 21:50:47', '我去问他', 6, 8, 47, 1, 1),
(1482636205, '2016-12-25 11:23:25', '留下您的联系方式', 26, 8, 6, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `idnumber` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `userpwd` varchar(255) DEFAULT NULL,
  `si_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `idnumber`, `phonenumber`, `type`, `state`, `address`, `userpwd`, `si_id`) VALUES
('9', 'jianzhi', '1234567890', '1234567890', '兼职', '已认证', '河北师大启智园3楼', 'e10adc3949ba59abbe56e057f20f883e', '3'),
('1', '李丽华', '1234567890', '1234567890', '商品', '已认证', '河北师大烤冷面', 'e10adc3949ba59abbe56e057f20f883e', '1'),
('2', '王珊珊', '1234567890', '1234567890', '理发', '已认证', '河北师大启智园3楼', 'e10adc3949ba59abbe56e057f20f883e', '2'),
('3', 'shangpin', '1234567890', '1234567890', '商品', '已认证', '河北师大科技楼那家粉店', 'e10adc3949ba59abbe56e057f20f883e', '4'),
('4', '王晓丽', '2134567890', '2134567890', '商品', '待认证', '科技楼底下一层小丽麻辣烫', 'e10adc3949ba59abbe56e057f20f883e', '5'),
('5', 'lifa', '3243475034', '3545347938', '理发', '待认证', '科技楼北侧101', 'e10adc3949ba59abbe56e057f20f883e', '6'),
('6', '张建立', '1234567890', '1234567890', '商品', '已认证', '河北师大', 'e10adc3949ba59abbe56e057f20f883e', '7'),
('7', '吴丽华', '1234567890', '1234567890', '兼职', '待认证', '河北师大启打扫房间', 'e10adc3949ba59abbe56e057f20f883e', '3'),
('8', '马浩宇', '1234567890', '1234567890', '商品', '已认证', '河北师大', 'e10adc3949ba59abbe56e057f20f883e', '10'),
('10', '骆静静', '1111111111', '1111111111', 'boss', '待认证', '水电费你', 'e10adc3949ba59abbe56e057f20f883e', ''),
('11', '高小力', '1111111111', '1111111111', 'boss', '待认证', 'sdf', 'e10adc3949ba59abbe56e057f20f883e', ''),
('12', 'boss', '1234567890', '1234567890', 'boss', '已认证', '水电费', 'e10adc3949ba59abbe56e057f20f883e', ''),
('13', '李雪', '13262373894212', '18733161391', 'boss', '待认证', '启智园3号', 'e10adc3949ba59abbe56e057f20f883e', ''),
('14', '马力', '142644145345456753', '16434647537', '理发', '已认证', '河北师大科技楼', 'e10adc3949ba59abbe56e057f20f883e', '8'),
('15', '赵丹', '254323745534635', '17443643456', '理发', '已认证', '地下三层', 'e10adc3949ba59abbe56e057f20f883e', '9'),
('16', '钱前', '2543237436844635', '17449203456', '理发', '已认证', '地下三层', 'e10adc3949ba59abbe56e057f20f883e', '11'),
('17', '李丽', '1534745234667453', '15365336643', '兼职', '已认证', '国培大厦 ', 'e10adc3949ba59abbe56e057f20f883e', '12'),
('18', '周舟', '19585948383924', '17534647633', '理发', '已认证', '东门地下', 'e10adc3949ba59abbe56e057f20f883e', '13');

-- --------------------------------------------------------

--
-- 表的结构 `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `sh_cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `sh_cnum` int(11) NOT NULL DEFAULT '1' COMMENT '商品数量',
  `bs_gidd` int(11) NOT NULL COMMENT '商品id',
  `ci_idddd` int(11) NOT NULL COMMENT '客户id',
  `si_ids` int(11) NOT NULL COMMENT '店家id',
  PRIMARY KEY (`sh_cid`),
  KEY `bs_gidd` (`bs_gidd`),
  KEY `ci_idddd` (`ci_idddd`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='购物车' AUTO_INCREMENT=82 ;

--
-- 转存表中的数据 `shopping_cart`
--

INSERT INTO `shopping_cart` (`sh_cid`, `sh_cnum`, `bs_gidd`, `ci_idddd`, `si_ids`) VALUES
(81, 2, 20028, 0, 7),
(80, 1, 20008, 47, 1),
(71, 1, 20014, 47, 4),
(79, 1, 20033, 6, 10);

-- --------------------------------------------------------

--
-- 表的结构 `store_information`
--

CREATE TABLE IF NOT EXISTS `store_information` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家id',
  `si_name` varchar(255) NOT NULL COMMENT '店家名称',
  `si_sintroduce` text NOT NULL COMMENT '店家简介',
  `si_image` varchar(255) NOT NULL,
  `si_address` varchar(255) NOT NULL COMMENT '店家地址',
  `si_stime` time NOT NULL COMMENT '店家营业时间起',
  `si_etime` time NOT NULL COMMENT '店家营业时间止',
  `si_phone` varchar(11) NOT NULL COMMENT '店家联系方式',
  `s_type_id` int(11) NOT NULL COMMENT '店家类型id',
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  PRIMARY KEY (`si_id`),
  KEY `s_type_id` (`s_type_id`),
  KEY `ss_id` (`ss_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='店家信息表' AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `store_information`
--

INSERT INTO `store_information` (`si_id`, `si_name`, `si_sintroduce`, `si_image`, `si_address`, `si_stime`, `si_etime`, `si_phone`, `s_type_id`, `ss_id`) VALUES
(1, '大个饮品炒酸奶店', '大个炒酸奶周六日全部半价进店优惠，双十二全场半价', '/uploads/2016-12-22/585b7e23a1c19.jpg', '国大超市', '08:00:00', '20:00:00', '18733161393', 2, 1),
(2, '蓝调理发店', '蓝调理发店烫染优惠。', '/uploads/2016-12-10/landiao.jpg', '地下三层', '08:00:00', '21:00:00', '19824793274', 1, 1),
(3, '家教中介店', '各种类型家教兼职', '/uploads/2016-12-10/jianzhi.jpg', '师生活动中心', '09:00:00', '20:00:00', '15256732456', 3, 1),
(4, '国大超市', '国大超市优惠啦，位与二期宿舍', '/uploads/2016-12-22/585b2f5153df4.jpg', '二期后', '08:30:00', '22:15:00', '12733937654', 2, 1),
(5, '地下畅购超市', '超市优惠，位与师大东门', '/uploads/2016-12-10/changgou.jpg', '地下一层', '10:00:00', '21:00:00', '14543443565', 2, 1),
(6, '炫动理发店', '服务周到22', '/uploads/2016-12-10/xuandong.jpg', '科楼南', '15:43:26', '15:43:24', '18733161391', 1, 1),
(7, '紫菜包饭', '​紫菜包饭多用鸡蛋，胡萝卜，菠菜再搭配一些熟芝麻，爽脆微辣的辣白菜混合着米饭和紫菜的清香，让你越嚼越有滋味。', '/uploads/2016-12-22/585b3379d4a91.jpg', '师生活动中心', '08:30:00', '22:15:00', '12735937654', 2, 1),
(8, '美格发型设计', '我们与时俱进，在各个领域中不断发展、完善，让我们为中国的美发事业奉献出一份力，打造出一个健康、向上、时尚、专业的新美发文化。', '/uploads/2016-12-22/585b368e55158.jpg', '科技楼南', '08:30:00', '22:15:00', '12735937653', 1, 1),
(9, '千艺发型室', ' 聚集了众多富有激情和极具创意的发型师，为女性带来至炫至酷的发型。演绎潮流、享受时尚，让你沉醉于浪族人给您带来的美妙感觉。', '/uploads/2016-12-22/585b3784de040.jpg', '地下一层', '08:30:00', '22:15:00', '13294832942', 1, 1),
(10, '吉祥馄饨', '吉祥馄饨是秉承千年中国饮食文化传统创造了“皮嫩、个大、馅多、汤浓”的新式特色馄饨，源于上海、风靡大江南北、名扬海内外。', '/uploads/2016-12-22/585b32ae094e3.jpg', '地下一层', '09:00:00', '20:00:00', '15464246453', 2, 1),
(11, '美酷发之家', ' 美酷发之家价格合理。美酷发之家重信用、守合同、保证产品质量，以多品种经营特色和薄利多销的原则，赢得了广大客户的信任', '/uploads/2016-12-22/585b37b74f582.jpg', '地下三层', '09:00:00', '22:15:00', '15346547564', 1, 1),
(12, '兼职网络中心', '我们兼职是从网上发布，你可以看到各种类型的兼职，满足每个人想要的类型，快来看看吧。', '/uploads/2016-12-10/guoda.jpg', '地下一层', '08:30:00', '20:00:00', '16434536543', 3, 1),
(13, '顶头尚丝发廊', '我们的发型使用的是TONI&GUY中的“自然V线”和“方形层次”，另外是今秋主打的“柔和双色”挑染，营造出一种灵动和自然的感觉。', '/uploads/2016-12-22/585b386470b7f.jpg', '师生活动中心', '09:00:00', '22:15:00', '13928483782', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `store_state`
--

CREATE TABLE IF NOT EXISTS `store_state` (
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  `ss_name` varchar(255) NOT NULL COMMENT '店家状态名称',
  PRIMARY KEY (`ss_id`)
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

CREATE TABLE IF NOT EXISTS `store_type` (
  `s_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家种类id',
  `s_type_name` varchar(255) NOT NULL COMMENT '店家类型',
  PRIMARY KEY (`s_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `trade_state_copy` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(255) NOT NULL,
  `s_type_idd` int(11) NOT NULL,
  PRIMARY KEY (`ts_id`),
  KEY `s_type_idd` (`s_type_idd`)
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
CREATE TABLE IF NOT EXISTS `view_save_goods` (
`ci_id` int(11)
,`bs_gid` int(11)
);
-- --------------------------------------------------------

--
-- 视图结构 `view_save_goods`
--
DROP TABLE IF EXISTS `view_save_goods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_goods` AS select `customer_information`.`ci_id` AS `ci_id`,`bs_goods`.`bs_gid` AS `bs_gid` from (`customer_information` join `bs_goods`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
