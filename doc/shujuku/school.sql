/*
Navicat MySQL Data Transfer

Source Server         : 静静数据库
Source Server Version : 50173
Source Host           : 123.206.52.152:3306
Source Database       : school

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2016-11-29 16:18:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='结算表';

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for appraise
-- ----------------------------
DROP TABLE IF EXISTS `appraise`;
CREATE TABLE `appraise` (
  `appr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评价id',
  `appr_content` varchar(255) DEFAULT NULL COMMENT '评价内容',
  `appr_score` float NOT NULL COMMENT '评分',
  `si_iddd` int(11) NOT NULL COMMENT '店家id',
  `bs_gid` int(11) NOT NULL COMMENT '商品id',
  `ci_iddd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`appr_id`),
  KEY `si_iddd` (`si_iddd`),
  KEY `bs_gid` (`bs_gid`),
  KEY `ci_iddd` (`ci_iddd`),
  CONSTRAINT `ci_iddd` FOREIGN KEY (`ci_iddd`) REFERENCES `customer_information` (`ci_id`),
  CONSTRAINT `bs_gid` FOREIGN KEY (`bs_gid`) REFERENCES `bs_goods` (`bs_gid`),
  CONSTRAINT `si_iddd` FOREIGN KEY (`si_iddd`) REFERENCES `store_information` (`si_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='评价表';

-- ----------------------------
-- Records of appraise
-- ----------------------------
INSERT INTO `appraise` VALUES ('1', '商品还不错', '4.5', '4', '2', '3');
INSERT INTO `appraise` VALUES ('2', '商品还不错', '4.5', '4', '2', '1');
INSERT INTO `appraise` VALUES ('3', '商品还行', '4', '5', '1', '3');

-- ----------------------------
-- Table structure for bs_ recommend
-- ----------------------------
DROP TABLE IF EXISTS `bs_ recommend`;
CREATE TABLE `bs_ recommend` (
  `bs_rid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品推荐id',
  `bs_rname` varchar(255) NOT NULL COMMENT '商品推荐名称id',
  PRIMARY KEY (`bs_rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='商品推荐';

-- ----------------------------
-- Records of bs_ recommend
-- ----------------------------
INSERT INTO `bs_ recommend` VALUES ('0', '不推荐');
INSERT INTO `bs_ recommend` VALUES ('1', '推荐');

-- ----------------------------
-- Table structure for bs_goods
-- ----------------------------
DROP TABLE IF EXISTS `bs_goods`;
CREATE TABLE `bs_goods` (
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
  KEY `bs_rid` (`bs_rid`),
  CONSTRAINT `bs_gsid` FOREIGN KEY (`bs_gsid`) REFERENCES `bs_goods_state` (`bs_gsid`),
  CONSTRAINT `bs_rid` FOREIGN KEY (`bs_rid`) REFERENCES `bs_ recommend` (`bs_rid`),
  CONSTRAINT `bs_tid` FOREIGN KEY (`bs_tid`) REFERENCES `bs_type` (`bs_tid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品信息表';

-- ----------------------------
-- Records of bs_goods
-- ----------------------------
INSERT INTO `bs_goods` VALUES ('1', '可口可乐', '720ml大瓶', '7', '100', 'http://kekoukele', '2016-09-01 14:16:14', '6', '1', '1');
INSERT INTO `bs_goods` VALUES ('2', '雪碧', '200ml小瓶', '3.5', '20', 'http://urll', '2016-11-29 14:20:45', '7', '1', '1');
INSERT INTO `bs_goods` VALUES ('3', '面包', '一包18个', '10', '20', 'http://url', '2016-11-29 14:24:35', '9', '1', '1');

-- ----------------------------
-- Table structure for bs_goods_state
-- ----------------------------
DROP TABLE IF EXISTS `bs_goods_state`;
CREATE TABLE `bs_goods_state` (
  `bs_gsid` int(11) NOT NULL,
  `bs_gsname` varchar(255) NOT NULL,
  PRIMARY KEY (`bs_gsid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bs_goods_state
-- ----------------------------
INSERT INTO `bs_goods_state` VALUES ('0', '已售完');
INSERT INTO `bs_goods_state` VALUES ('1', '售卖中');

-- ----------------------------
-- Table structure for bs_many_goods
-- ----------------------------
DROP TABLE IF EXISTS `bs_many_goods`;
CREATE TABLE `bs_many_goods` (
  `bs_mgid` int(11) NOT NULL AUTO_INCREMENT COMMENT '交易多种商品id',
  `bs_tr_id` int(11) NOT NULL COMMENT '交易id',
  `bs_giddd` int(11) NOT NULL COMMENT '商品id',
  `bs_mgnum` int(11) NOT NULL COMMENT '商品数量',
  `sh_cid` int(11) NOT NULL COMMENT '购物车id',
  PRIMARY KEY (`bs_mgid`),
  KEY `bs_tr_id` (`bs_tr_id`),
  KEY `bs_giddd` (`bs_giddd`),
  KEY `sh_cid` (`sh_cid`),
  CONSTRAINT `sh_cid` FOREIGN KEY (`sh_cid`) REFERENCES `shopping_cart` (`sh_cid`),
  CONSTRAINT `bs_giddd` FOREIGN KEY (`bs_giddd`) REFERENCES `bs_goods` (`bs_gid`),
  CONSTRAINT `bs_tr_id` FOREIGN KEY (`bs_tr_id`) REFERENCES `bs_trade` (`bs_tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='交易多种商品表';

-- ----------------------------
-- Records of bs_many_goods
-- ----------------------------
INSERT INTO `bs_many_goods` VALUES ('1', '1', '3', '2', '1');
INSERT INTO `bs_many_goods` VALUES ('2', '5', '2', '3', '1');
INSERT INTO `bs_many_goods` VALUES ('3', '2', '1', '2', '3');
INSERT INTO `bs_many_goods` VALUES ('4', '1', '2', '1', '2');

-- ----------------------------
-- Table structure for bs_trade
-- ----------------------------
DROP TABLE IF EXISTS `bs_trade`;
CREATE TABLE `bs_trade` (
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
  KEY `ts_iddd` (`ts_iddd`),
  CONSTRAINT `ts_iddd` FOREIGN KEY (`ts_iddd`) REFERENCES `trade_state` (`ts_id`),
  CONSTRAINT `bs_sid` FOREIGN KEY (`bs_sid`) REFERENCES `store_information` (`si_id`),
  CONSTRAINT `ci_id5` FOREIGN KEY (`ci_id5`) REFERENCES `customer_information` (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='商品类交易表';

-- ----------------------------
-- Records of bs_trade
-- ----------------------------
INSERT INTO `bs_trade` VALUES ('1', '1', '4', '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', '1');
INSERT INTO `bs_trade` VALUES ('2', '5', '4', '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', '2');
INSERT INTO `bs_trade` VALUES ('3', '3', '5', '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', '2');
INSERT INTO `bs_trade` VALUES ('4', '2', '2', '2016-11-29 16:00:24', '2016-11-29 16:00:27', '在线支付', '3');
INSERT INTO `bs_trade` VALUES ('5', '3', '4', '2016-11-29 16:00:24', '2016-11-29 16:00:27', '自取', '1');

-- ----------------------------
-- Table structure for bs_trade_information
-- ----------------------------
DROP TABLE IF EXISTS `bs_trade_information`;
CREATE TABLE `bs_trade_information` (
  `bs_tr_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '详情id',
  `bs_tr_idd` int(11) NOT NULL COMMENT '交易id',
  `bs_tr_inaddress` varchar(255) NOT NULL COMMENT '交易地址',
  `bs_tr_inmoney` varchar(255) NOT NULL COMMENT '成交金额',
  `bs_tr_intime` datetime NOT NULL COMMENT '成交时间',
  `bs_tr_inphone` char(11) NOT NULL COMMENT '客户联系方式',
  PRIMARY KEY (`bs_tr_inid`),
  KEY `bs_tr_idd` (`bs_tr_idd`),
  CONSTRAINT `bs_tr_idd` FOREIGN KEY (`bs_tr_idd`) REFERENCES `bs_trade` (`bs_tr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='交易详情表';

-- ----------------------------
-- Records of bs_trade_information
-- ----------------------------
INSERT INTO `bs_trade_information` VALUES ('1', '2', '一期宿舍', '20元', '2016-11-29 16:10:58', '13731756789');
INSERT INTO `bs_trade_information` VALUES ('2', '1', '二期宿舍', '10元', '2016-11-29 16:10:58', '13731756789');
INSERT INTO `bs_trade_information` VALUES ('3', '4', '软件学院', '3元', '2016-11-29 16:10:58', '13731756789');
INSERT INTO `bs_trade_information` VALUES ('4', '3', '公交楼', '8.8元', '2016-11-29 16:10:58', '13731756789');

-- ----------------------------
-- Table structure for bs_type
-- ----------------------------
DROP TABLE IF EXISTS `bs_type`;
CREATE TABLE `bs_type` (
  `bs_tid` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品种类id',
  `bs_tname` varchar(255) NOT NULL COMMENT '商品种类名称',
  `si_id` int(11) NOT NULL COMMENT '店家id',
  PRIMARY KEY (`bs_tid`),
  KEY `si_id` (`si_id`),
  CONSTRAINT `si_id` FOREIGN KEY (`si_id`) REFERENCES `store_information` (`si_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='商品种类表';

-- ----------------------------
-- Records of bs_type
-- ----------------------------
INSERT INTO `bs_type` VALUES ('1', '炒酸奶', '1');
INSERT INTO `bs_type` VALUES ('2', '奶茶', '1');
INSERT INTO `bs_type` VALUES ('3', '烫头发', '2');
INSERT INTO `bs_type` VALUES ('4', '染头发', '2');
INSERT INTO `bs_type` VALUES ('5', '拉直', '2');
INSERT INTO `bs_type` VALUES ('6', '饮料', '4');
INSERT INTO `bs_type` VALUES ('7', '饮料', '5');
INSERT INTO `bs_type` VALUES ('8', '高中物理家教', '3');
INSERT INTO `bs_type` VALUES ('9', '面包', '4');

-- ----------------------------
-- Table structure for customer_address
-- ----------------------------
DROP TABLE IF EXISTS `customer_address`;
CREATE TABLE `customer_address` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '地址id',
  `ca_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ca_address` varchar(255) NOT NULL COMMENT '具体地址',
  `ca_phone` char(11) NOT NULL COMMENT '手机号',
  `ci_idd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`ca_id`),
  KEY `ci_idd` (`ci_idd`),
  CONSTRAINT `ci_idd` FOREIGN KEY (`ci_idd`) REFERENCES `customer_information` (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT=' 客户地址表';

-- ----------------------------
-- Records of customer_address
-- ----------------------------
INSERT INTO `customer_address` VALUES ('1', '妮', '二期宿舍', '15232167589', '1');
INSERT INTO `customer_address` VALUES ('2', '妮妮', '软件学院', '15232167589', '1');
INSERT INTO `customer_address` VALUES ('3', '贝', '二期宿舍', '15232167589', '2');
INSERT INTO `customer_address` VALUES ('4', '栗', '一期宿舍', '15232167589', '5');

-- ----------------------------
-- Table structure for customer_information
-- ----------------------------
DROP TABLE IF EXISTS `customer_information`;
CREATE TABLE `customer_information` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户id',
  `ci_name` varchar(255) NOT NULL COMMENT '客户昵称',
  `ca_idd` varchar(255) DEFAULT NULL COMMENT '客户地址',
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='客户信息表';

-- ----------------------------
-- Records of customer_information
-- ----------------------------
INSERT INTO `customer_information` VALUES ('1', '妮妮', '1');
INSERT INTO `customer_information` VALUES ('2', '贝贝', '1');
INSERT INTO `customer_information` VALUES ('3', '蕾蕾', '1');
INSERT INTO `customer_information` VALUES ('4', '舒雅', '1');
INSERT INTO `customer_information` VALUES ('5', '阳阳', '1');

-- ----------------------------
-- Table structure for haircut_order_type
-- ----------------------------
DROP TABLE IF EXISTS `haircut_order_type`;
CREATE TABLE `haircut_order_type` (
  `ho_tyid` int(11) NOT NULL COMMENT '预约类型id',
  `ho_tyname` varchar(255) NOT NULL COMMENT '预约名称',
  `si_idd` int(11) NOT NULL COMMENT '店家id',
  PRIMARY KEY (`ho_tyid`),
  KEY `si_idd` (`si_idd`),
  CONSTRAINT `si_idd` FOREIGN KEY (`si_idd`) REFERENCES `store_information` (`si_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='理发可预约类型表';

-- ----------------------------
-- Records of haircut_order_type
-- ----------------------------
INSERT INTO `haircut_order_type` VALUES ('1', '剪发', '2');
INSERT INTO `haircut_order_type` VALUES ('2', '烫发', '2');
INSERT INTO `haircut_order_type` VALUES ('3', '剪发', '6');
INSERT INTO `haircut_order_type` VALUES ('4', '染发', '6');

-- ----------------------------
-- Table structure for home_page_pic
-- ----------------------------
DROP TABLE IF EXISTS `home_page_pic`;
CREATE TABLE `home_page_pic` (
  `pic_one` varchar(255) NOT NULL,
  `pic_two` varchar(255) NOT NULL,
  `pic_three` varchar(255) NOT NULL,
  `pic_four` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='首页轮播图';

-- ----------------------------
-- Records of home_page_pic
-- ----------------------------

-- ----------------------------
-- Table structure for order_time_pmun
-- ----------------------------
DROP TABLE IF EXISTS `order_time_pmun`;
CREATE TABLE `order_time_pmun` (
  `ot_pnid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `ot_pntime` varchar(255) NOT NULL COMMENT '可预约时间段',
  `ot_pnpnum` int(11) NOT NULL COMMENT '可预约人数',
  `ho_tyidd` int(11) NOT NULL COMMENT '预约类型id',
  PRIMARY KEY (`ot_pnid`),
  KEY `ho_tyidd` (`ho_tyidd`),
  CONSTRAINT `ho_tyidd` FOREIGN KEY (`ho_tyidd`) REFERENCES `haircut_order_type` (`ho_tyid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='可预约时间人数';

-- ----------------------------
-- Records of order_time_pmun
-- ----------------------------
INSERT INTO `order_time_pmun` VALUES ('1', '6：00-14：00', '4', '1');
INSERT INTO `order_time_pmun` VALUES ('2', '6：00-14：00', '3', '4');
INSERT INTO `order_time_pmun` VALUES ('3', '6：00-14：00', '6', '1');
INSERT INTO `order_time_pmun` VALUES ('4', '6：00-14：00', '4', '2');

-- ----------------------------
-- Table structure for order_trade
-- ----------------------------
DROP TABLE IF EXISTS `order_trade`;
CREATE TABLE `order_trade` (
  `or_tdid` int(11) NOT NULL AUTO_INCREMENT COMMENT '预约id',
  `or_tdtime` datetime NOT NULL COMMENT '预约时间',
  `ho_tyid` int(11) NOT NULL COMMENT '预约类型id',
  `ts_idd` int(11) NOT NULL COMMENT '交易状态id',
  PRIMARY KEY (`or_tdid`),
  KEY `ho_tyid` (`ho_tyid`),
  KEY `ts_idd` (`ts_idd`),
  CONSTRAINT `ts_idd` FOREIGN KEY (`ts_idd`) REFERENCES `trade_state` (`ts_id`),
  CONSTRAINT `ho_tyid` FOREIGN KEY (`ho_tyid`) REFERENCES `haircut_order_type` (`ho_tyid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT=' 预约类交易表';

-- ----------------------------
-- Records of order_trade
-- ----------------------------
INSERT INTO `order_trade` VALUES ('1', '2016-11-29 15:47:25', '1', '1');
INSERT INTO `order_trade` VALUES ('2', '2016-11-29 15:47:25', '2', '1');
INSERT INTO `order_trade` VALUES ('3', '2016-11-29 15:48:55', '3', '2');

-- ----------------------------
-- Table structure for pt_information
-- ----------------------------
DROP TABLE IF EXISTS `pt_information`;
CREATE TABLE `pt_information` (
  `pt_inid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职id',
  `pt_inname` varchar(255) NOT NULL COMMENT '兼职名称',
  `pt_inmoney` varchar(255) NOT NULL COMMENT '兼职报酬',
  `pt_inabstract` varchar(255) NOT NULL COMMENT '兼职简介',
  `pt_inaddress` varchar(255) NOT NULL COMMENT '兼职地址',
  `pt_min_id` int(11) NOT NULL COMMENT '发布者id',
  PRIMARY KEY (`pt_inid`),
  KEY `pt_min_id` (`pt_min_id`),
  CONSTRAINT `pt_min_id` FOREIGN KEY (`pt_min_id`) REFERENCES `pt_manager_information` (`pt_min_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='兼职信息表';

-- ----------------------------
-- Records of pt_information
-- ----------------------------
INSERT INTO `pt_information` VALUES ('1', '传单', '一天50', '给食堂的饭做宣传', '师大大食堂', '1');
INSERT INTO `pt_information` VALUES ('2', '物理家教', '一小时50', '高中物理家教', '裕华区', '2');
INSERT INTO `pt_information` VALUES ('3', '数学家教', '一小时50', '高中数学家教', '裕华区', '3');
INSERT INTO `pt_information` VALUES ('4', '物理家教', '一小时50', '高中物理家教', '裕华区', '2');
INSERT INTO `pt_information` VALUES ('5', '手工', '一小时50', '做玩具', '裕华区', '4');

-- ----------------------------
-- Table structure for pt_manager_information
-- ----------------------------
DROP TABLE IF EXISTS `pt_manager_information`;
CREATE TABLE `pt_manager_information` (
  `pt_min_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '发表者id',
  `pt_min_name` varchar(255) NOT NULL COMMENT '发表者姓名',
  `pt_min_IDnum` char(18) NOT NULL COMMENT '发表者身份证号',
  `pt_min_phone` char(11) NOT NULL COMMENT '发表者手机号',
  `pt_min_type` varchar(255) NOT NULL COMMENT '发表者种类',
  `pt_min_app_state` varchar(255) NOT NULL COMMENT '发表者认证状态',
  PRIMARY KEY (`pt_min_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='兼职发布者信息表';

-- ----------------------------
-- Records of pt_manager_information
-- ----------------------------
INSERT INTO `pt_manager_information` VALUES ('1', '王一', '123213111111111111', '11133345432', '发传单', '已认证');
INSERT INTO `pt_manager_information` VALUES ('2', '天天', '130923177876789098', '34890912345', '家教', '已认证');
INSERT INTO `pt_manager_information` VALUES ('3', '王五', '130923177876789098', '34890912345', '家教', '已认证');
INSERT INTO `pt_manager_information` VALUES ('4', '栗', '130923177876789098', '34890912345', '手工', '已认证');

-- ----------------------------
-- Table structure for pt_person_information
-- ----------------------------
DROP TABLE IF EXISTS `pt_person_information`;
CREATE TABLE `pt_person_information` (
  `pt_pid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职者id',
  `pt_pname` varchar(255) NOT NULL COMMENT '兼职者昵称',
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_pphone` varchar(11) NOT NULL COMMENT '手机号',
  PRIMARY KEY (`pt_pid`),
  KEY `pt_sid` (`pt_sid`),
  CONSTRAINT `pt_sid` FOREIGN KEY (`pt_sid`) REFERENCES `pt_state` (`pt_sid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='兼职者信息表';

-- ----------------------------
-- Records of pt_person_information
-- ----------------------------
INSERT INTO `pt_person_information` VALUES ('1', '张三', '0', '11111111111');
INSERT INTO `pt_person_information` VALUES ('2', '李四', '1', '12345632123');
INSERT INTO `pt_person_information` VALUES ('3', '王五', '0', '13454345432');

-- ----------------------------
-- Table structure for pt_state
-- ----------------------------
DROP TABLE IF EXISTS `pt_state`;
CREATE TABLE `pt_state` (
  `pt_sid` int(11) NOT NULL COMMENT '兼职状态id',
  `pt_sname` varchar(255) NOT NULL COMMENT '兼职状态名称',
  PRIMARY KEY (`pt_sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='兼职者状态表';

-- ----------------------------
-- Records of pt_state
-- ----------------------------
INSERT INTO `pt_state` VALUES ('0', '不兼职');
INSERT INTO `pt_state` VALUES ('1', '兼职中');

-- ----------------------------
-- Table structure for pt_trade
-- ----------------------------
DROP TABLE IF EXISTS `pt_trade`;
CREATE TABLE `pt_trade` (
  `pt_trid` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职交易id',
  `pt_trtime` datetime NOT NULL COMMENT '可预约时间',
  `pt_trremark` varchar(255) NOT NULL COMMENT '交易备注',
  `pt_inid` int(11) NOT NULL COMMENT '兼职id',
  `ts_id` int(11) NOT NULL COMMENT '交易状态id',
  `ci_id` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`pt_trid`),
  KEY `pt_inid` (`pt_inid`),
  KEY `ts_id` (`ts_id`),
  KEY `ci_id` (`ci_id`),
  CONSTRAINT `ci_id` FOREIGN KEY (`ci_id`) REFERENCES `customer_information` (`ci_id`),
  CONSTRAINT `pt_inid` FOREIGN KEY (`pt_inid`) REFERENCES `pt_information` (`pt_inid`),
  CONSTRAINT `ts_id` FOREIGN KEY (`ts_id`) REFERENCES `trade_state` (`ts_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='兼职类交易表';

-- ----------------------------
-- Records of pt_trade
-- ----------------------------
INSERT INTO `pt_trade` VALUES ('1', '2016-11-29 16:14:16', '备注些什么', '2', '7', '1');
INSERT INTO `pt_trade` VALUES ('2', '2016-11-29 16:14:16', '备注', '2', '8', '5');
INSERT INTO `pt_trade` VALUES ('3', '2016-11-29 16:14:16', '学生最好是女学生', '3', '7', '4');
INSERT INTO `pt_trade` VALUES ('4', '2016-11-29 16:14:16', '兼职备注', '5', '9', '1');
INSERT INTO `pt_trade` VALUES ('5', '2016-11-29 16:14:16', '备注些什么', '2', '7', '3');

-- ----------------------------
-- Table structure for shopping_cart
-- ----------------------------
DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE `shopping_cart` (
  `sh_cid` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车id',
  `sh_cnum` int(11) NOT NULL COMMENT '商品数量',
  `bs_gidd` int(11) NOT NULL COMMENT '商品id',
  `ci_idddd` int(11) NOT NULL COMMENT '客户id',
  PRIMARY KEY (`sh_cid`),
  KEY `bs_gidd` (`bs_gidd`),
  KEY `ci_idddd` (`ci_idddd`),
  CONSTRAINT `ci_idddd` FOREIGN KEY (`ci_idddd`) REFERENCES `customer_information` (`ci_id`),
  CONSTRAINT `bs_gidd` FOREIGN KEY (`bs_gidd`) REFERENCES `bs_goods` (`bs_gid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='购物车';

-- ----------------------------
-- Records of shopping_cart
-- ----------------------------
INSERT INTO `shopping_cart` VALUES ('1', '2', '1', '1');
INSERT INTO `shopping_cart` VALUES ('2', '1', '2', '1');
INSERT INTO `shopping_cart` VALUES ('3', '2', '2', '3');

-- ----------------------------
-- Table structure for store_information
-- ----------------------------
DROP TABLE IF EXISTS `store_information`;
CREATE TABLE `store_information` (
  `si_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家id',
  `si_name` varchar(255) NOT NULL COMMENT '店家名称',
  `si_sintroduce` text NOT NULL COMMENT '店家简介',
  `si_stime` time NOT NULL COMMENT '店家营业时间起',
  `si_etime` time NOT NULL COMMENT '店家营业时间止',
  `si_phone` varchar(11) NOT NULL COMMENT '店家联系方式',
  `s_type_id` int(11) NOT NULL COMMENT '店家类型id',
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  PRIMARY KEY (`si_id`),
  KEY `s_type_id` (`s_type_id`),
  KEY `ss_id` (`ss_id`),
  CONSTRAINT `ss_id` FOREIGN KEY (`ss_id`) REFERENCES `store_state` (`ss_id`),
  CONSTRAINT `s_type_id` FOREIGN KEY (`s_type_id`) REFERENCES `store_type` (`s_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='店家信息表';

-- ----------------------------
-- Records of store_information
-- ----------------------------
INSERT INTO `store_information` VALUES ('1', '大个饮品炒酸奶店', '大个炒酸奶周六日全部半价', '08:00:00', '20:00:00', '18733161391', '2', '1');
INSERT INTO `store_information` VALUES ('2', '蓝调理发店', '蓝调理发店烫染优惠', '08:00:00', '21:00:00', '19824793274', '1', '1');
INSERT INTO `store_information` VALUES ('3', '家教中介店', '各种类型家教兼职', '09:00:00', '20:00:00', '15256732456', '3', '1');
INSERT INTO `store_information` VALUES ('4', '国大超市', '国大超市优惠啦，位与二期宿舍', '08:30:00', '22:15:00', '12733937654', '2', '1');
INSERT INTO `store_information` VALUES ('5', '地下畅购超市', '超市优惠，位与师大东门', '10:00:00', '21:00:00', '14543443565', '2', '1');
INSERT INTO `store_information` VALUES ('6', '炫动理发店', '服务周到', '15:43:26', '15:43:24', '', '1', '1');

-- ----------------------------
-- Table structure for store_state
-- ----------------------------
DROP TABLE IF EXISTS `store_state`;
CREATE TABLE `store_state` (
  `ss_id` int(11) NOT NULL COMMENT '店家状态id',
  `ss_name` varchar(255) NOT NULL COMMENT '店家状态名称',
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店家状态表';

-- ----------------------------
-- Records of store_state
-- ----------------------------
INSERT INTO `store_state` VALUES ('0', '不营业');
INSERT INTO `store_state` VALUES ('1', '营业中');

-- ----------------------------
-- Table structure for store_type
-- ----------------------------
DROP TABLE IF EXISTS `store_type`;
CREATE TABLE `store_type` (
  `s_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '店家种类id',
  `s_type_name` varchar(255) NOT NULL COMMENT '店家类型',
  PRIMARY KEY (`s_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store_type
-- ----------------------------
INSERT INTO `store_type` VALUES ('1', '美发');
INSERT INTO `store_type` VALUES ('2', '购物');
INSERT INTO `store_type` VALUES ('3', '兼职');

-- ----------------------------
-- Table structure for trade_state
-- ----------------------------
DROP TABLE IF EXISTS `trade_state`;
CREATE TABLE `trade_state` (
  `ts_id` int(11) NOT NULL,
  `ts_name` varchar(255) NOT NULL,
  `s_type_idd` int(11) NOT NULL,
  PRIMARY KEY (`ts_id`),
  KEY `s_type_idd` (`s_type_idd`),
  CONSTRAINT `s_type_idd` FOREIGN KEY (`s_type_idd`) REFERENCES `store_type` (`s_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='交易状态表';

-- ----------------------------
-- Records of trade_state
-- ----------------------------
INSERT INTO `trade_state` VALUES ('1', '交易中', '1');
INSERT INTO `trade_state` VALUES ('2', '交易完成', '1');
INSERT INTO `trade_state` VALUES ('3', '取消交易', '1');
INSERT INTO `trade_state` VALUES ('4', '交易中', '2');
INSERT INTO `trade_state` VALUES ('5', '交易完成', '2');
INSERT INTO `trade_state` VALUES ('6', '取消交易', '2');
INSERT INTO `trade_state` VALUES ('7', '交易中', '3');
INSERT INTO `trade_state` VALUES ('8', '交易完成', '3');
INSERT INTO `trade_state` VALUES ('9', '取消交易', '3');

-- ----------------------------
-- View structure for view_save_goods
-- ----------------------------
DROP VIEW IF EXISTS `view_save_goods`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_goods` AS select `customer_information`.`ci_id` AS `ci_id`,`bs_goods`.`bs_gid` AS `bs_gid` from (`customer_information` join `bs_goods`) ;

-- ----------------------------
-- View structure for view_save_store
-- ----------------------------
DROP VIEW IF EXISTS `view_save_store`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_save_store` AS select `customer_information`.`ci_id` AS `ci_id`,`store_information`.`si_id` AS `si_id` from (`customer_information` join `store_information`) ;
