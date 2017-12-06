/*
Navicat MySQL Data Transfer

Source Server         : 本地数据库
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : leave

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-11-30 16:30:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '班级的表',
  `c_name` char(255) DEFAULT NULL COMMENT '班级名称',
  `c_addtime` char(255) DEFAULT NULL COMMENT '班级的添加时间',
  `c_grade` char(255) DEFAULT NULL COMMENT '班级所在的级别名称',
  `c_g_id` int(11) DEFAULT NULL COMMENT '班级所在的级别id',
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('63', '123', '1977', '2015', '18');
INSERT INTO `class` VALUES ('64', '345', '1977', '2015', '18');
INSERT INTO `class` VALUES ('65', '567', '1977', '2015', '18');
INSERT INTO `class` VALUES ('68', '125', '1977', '2016', '19');

-- ----------------------------
-- Table structure for `grade`
-- ----------------------------
DROP TABLE IF EXISTS `grade`;
CREATE TABLE `grade` (
  `g_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '级别的表',
  `g_name` char(255) DEFAULT NULL COMMENT '级别的名称',
  `g_addtime` char(255) DEFAULT NULL COMMENT '级别的添加时间',
  PRIMARY KEY (`g_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of grade
-- ----------------------------
INSERT INTO `grade` VALUES ('18', '2015', '1977');
INSERT INTO `grade` VALUES ('19', '2016', '1977');
INSERT INTO `grade` VALUES ('20', '2017', '1977');

-- ----------------------------
-- Table structure for `leave2`
-- ----------------------------
DROP TABLE IF EXISTS `leave2`;
CREATE TABLE `leave2` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '这是请假条的数据表',
  `l_s_card` char(255) DEFAULT NULL COMMENT '请假条中学生的学号',
  `l_s_username` char(255) DEFAULT NULL COMMENT '请假条中学生的姓名',
  `l_s_grade` char(255) DEFAULT NULL COMMENT '请假条中学生所在级别',
  `l_s_class` char(255) DEFAULT NULL COMMENT '请假条中学生所在班级',
  `l_s_phone` char(255) DEFAULT NULL COMMENT '请假条中学生手机号',
  `l_begintime` char(255) DEFAULT NULL COMMENT '请假开始时间',
  `l_endtime` char(255) DEFAULT NULL COMMENT '请假结束时间',
  `l_address` char(255) DEFAULT NULL COMMENT '请假前往的地点',
  `l_cause` char(255) DEFAULT NULL COMMENT '请假的原因',
  `l_addtime` char(255) DEFAULT NULL COMMENT '请假条的添加时间',
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of leave2
-- ----------------------------
INSERT INTO `leave2` VALUES ('2', '6876874', '123', '2015', '123', '213213', '2017-11-02', '2017-11-03', 'の24', '4324', '2017-11-30');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生信息表',
  `s_card` char(255) DEFAULT NULL COMMENT '学生的学号',
  `s_username` char(255) DEFAULT NULL COMMENT '学生姓名',
  `s_phone` char(255) DEFAULT NULL COMMENT '学生联系方式',
  `s_addtime` char(255) DEFAULT NULL COMMENT '学生信息添加时间',
  `s_grade` char(255) DEFAULT NULL COMMENT '学生的年级，15,16,17',
  `s_class` char(255) DEFAULT NULL COMMENT '学生班级',
  `s_lastleave` char(255) DEFAULT NULL COMMENT '学生最后请假时间',
  `s_state` char(255) DEFAULT NULL COMMENT '学生账号状态',
  `s_c_id` char(255) DEFAULT NULL COMMENT '学生所在班级，班级的id',
  `s_g_id` char(255) DEFAULT NULL COMMENT '学生所在年级，年级的id',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1774 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('1771', '6876874', '123', '213213', '2017-11-29', '2015', '123', '', '1', '63', '18');
