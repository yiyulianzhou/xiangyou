/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : wxapp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-11-09 14:09:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xy_admins
-- ----------------------------
DROP TABLE IF EXISTS `xy_admins`;
CREATE TABLE `xy_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` tinyint(10) NOT NULL COMMENT '类型，0-普通管理员，1-管理员，2-超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xy_admins
-- ----------------------------
INSERT INTO `xy_admins` VALUES ('1', 'admin', '66d6a1c8748025462128dc75bf5ae8d1', '2');

-- ----------------------------
-- Table structure for xy_admin_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_auth_group`;
CREATE TABLE `xy_admin_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_auth_group
-- ----------------------------
INSERT INTO `xy_admin_auth_group` VALUES ('1', '超级管理员', '1', '1,2,58,65,59,60,61,62,3,56,4,6,5,7,8,9,10,51,52,53,57,11,54,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,29,30,31,32,33,34,36,37,38,39,40,41,42,43,44,45,46,47,63,48,49,50,55');
INSERT INTO `xy_admin_auth_group` VALUES ('2', '管理员', '1', '13,14,23,22,21,20,19,18,17,16,15,24,36,34,33,32,31,30,29,27,26,25,1');
INSERT INTO `xy_admin_auth_group` VALUES ('3', '普通用户', '1', '1');
INSERT INTO `xy_admin_auth_group` VALUES ('8', '客服', '1', '78,69,70,71,73,75,76,77,74,72,48,49,50,55');
INSERT INTO `xy_admin_auth_group` VALUES ('9', '测试', '0', '69,70,71,73,13,48,49,50,55');

-- ----------------------------
-- Table structure for xy_admin_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_auth_group_access`;
CREATE TABLE `xy_admin_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_auth_group_access
-- ----------------------------
INSERT INTO `xy_admin_auth_group_access` VALUES ('1', '1');
INSERT INTO `xy_admin_auth_group_access` VALUES ('2', '2');
INSERT INTO `xy_admin_auth_group_access` VALUES ('3', '3');

-- ----------------------------
-- Table structure for xy_admin_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_auth_rule`;
CREATE TABLE `xy_admin_auth_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `islink` tinyint(1) NOT NULL DEFAULT '1',
  `o` int(11) NOT NULL COMMENT '排序',
  `tips` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_auth_rule
-- ----------------------------
INSERT INTO `xy_admin_auth_rule` VALUES ('1', '0', 'User/index', '用户管理', 'menu-icon fa fa-user', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('2', '0', '', '系统设置', 'menu-icon fa fa-cog', '1', '1', '', '1', '6', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('3', '2', 'Setting/setting', '网站设置', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '3', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('4', '2', 'Menu/index', '后台菜单', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '4', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('5', '2', 'Menu/add', '新增菜单', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '5', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('6', '4', 'Menu/edit', '编辑菜单', '', '1', '1', '', '0', '6', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('7', '2', 'Menu/update', '保存菜单', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '7', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('8', '2', 'Menu/del', '删除菜单', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '8', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('10', '9', 'Database/recovery', '数据库还原', '', '1', '1', '', '0', '10', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('13', '0', '', '用户及组', 'menu-icon fa fa-users', '1', '1', '', '1', '5', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('14', '13', 'Member/index', '管理员列表', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '14', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('15', '13', 'Member/add', '新增管理员', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '15', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('16', '13', 'Member/edit', '编辑用户', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '16', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('17', '13', 'Member/update', '保存用户', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '17', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('18', '13', 'Member/del', '删除用户', '', '1', '1', '', '0', '18', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('19', '13', 'Group/index', '用户组管理', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '19', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('20', '13', 'Group/add', '新增用户组', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '20', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('21', '13', 'Group/edit', '编辑用户组', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '21', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('22', '13', 'Group/update', '保存用户组', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '22', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('23', '13', 'Group/del', '删除用户组', '', '1', '1', '', '0', '23', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('24', '0', '', '网站内容', 'menu-icon fa fa-desktop', '1', '1', '', '0', '24', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('25', '24', 'Article/index', '文章管理', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '25', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('26', '24', 'Article/add', '新增文章', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '26', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('27', '24', 'Article/edit', '编辑文章', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '27', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('29', '24', 'Article/update', '保存文章', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '29', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('30', '24', 'Article/del', '删除文章', '', '1', '1', '', '0', '30', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('31', '24', 'Category/index', '分类管理', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '31', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('32', '24', 'Category/add', '新增分类', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '32', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('33', '24', 'Category/edit', '编辑分类', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '33', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('34', '24', 'Category/update', '保存分类', 'menu-icon fa fa-caret-right', '1', '1', '', '0', '34', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('36', '24', 'Category/del', '删除分类', '', '1', '1', '', '0', '36', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('48', '0', 'Personal/index', '个人中心', 'menu-icon fa fa-user', '1', '1', '', '0', '48', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('49', '48', 'Personal/profile', '个人资料', 'menu-icon fa fa-user', '1', '1', '', '1', '49', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('50', '48', 'Logout/index', '退出', '', '1', '1', '', '1', '50', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('51', '9', 'Database/export', '备份', '', '1', '1', '', '0', '51', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('52', '9', 'Database/optimize', '数据优化', '', '1', '1', '', '0', '52', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('53', '9', 'Database/repair', '修复表', '', '1', '1', '', '0', '53', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('54', '11', 'Update/updating', '升级安装', '', '1', '1', '', '0', '54', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('55', '48', 'Personal/update', '资料保存', '', '1', '1', '', '0', '55', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('56', '3', 'Setting/update', '设置保存', '', '1', '1', '', '0', '56', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('57', '9', 'Database/del', '备份删除', '', '1', '1', '', '0', '57', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('67', '1', '/user/index', '用户列表', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('59', '58', 'variable/add', '新增变量', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('60', '58', 'variable/edit', '编辑变量', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('61', '58', 'variable/update', '保存变量', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('62', '58', 'variable/del', '删除变量', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('72', '0', 'Ad/index', '轮播图管理', 'menu-icon fa fa-users', '1', '1', '', '0', '4', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('73', '69', 'promote/agent', '代还需求', '', '1', '1', '', '1', '3', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('131', '1', 'user/member', '会员列表', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('76', '75', 'agent/creditApply', '线上代还额度申请审核', '', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('77', '75', '', '代还列表', '', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('78', '0', 'Index/index', '统计信息', 'menu-icon fa fa-users', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('80', '67', '', '查看', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('81', '67', '', ' 查看', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('82', '67', '', '查看', '', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('88', '69', 'Promote/creditPass', '提额需求--通过审核', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('89', '69', 'Promote/creditNoPass', '提额需求--审核不通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('90', '69', 'Promote/posPass', '消费需求--审核通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('91', '69', 'Promote/posNoPass', '消费需求--审核不通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('92', '69', 'Promote/agentPass', '代还需求--审核通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('93', '69', 'Promote/agentNoPass', '代还需求--审核不通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('94', '75', 'Agent/creditApplyPass', '线上代还额度申请审核--审核通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('95', '75', 'Agent/creditApplyNoPass', '线上代还额度申请审核--审核不通过', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('96', '72', 'Ad/edit/', '轮播图管理--修改', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('97', '74', 'Pos/edit', 'POS管理--修改', '', '1', '1', '', '0', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('100', '98', 'Agent/agentList', '代理商管理', '', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('101', '98', 'Agent/promote', '经销商管理', '', '1', '1', '', '1', '3', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('102', '98', 'Agent/draw', '结算申请', '', '1', '1', '', '1', '4', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('104', '78', 'Count/index', '每日统计', '', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('108', '106', 'credit/apply', '用户信息录入列表', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('111', '106', 'Credit/articlelist', '信用卡文章列表', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('113', '106', 'credit/income', '信用卡收益审核', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '4', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('116', '115', 'Juror/level', '信审员等级管理', '', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('117', '115', 'Juror/index', '信审员管理', '', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('118', '115', 'Juror/billlist', '预审订单管理', '', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('119', '115', 'Juror/credit', '信用状态管理', '', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('120', '0', '', '商学院社区', 'menu-icon fa fa-desktop', '1', '1', '', '0', '5', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('121', '120', 'Ad/index', '首页广告轮播图', 'menu-icon fa fa-users', '1', '1', '', '1', '0', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('122', '120', 'Category/index', '版块管理', '', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('123', '120', 'Article/index', '社区文章管理', '', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('124', '120', 'community/index', '社区问答管理', '', '1', '1', '', '1', '3', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('126', '125', 'Juror/index', '预审概况', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '1', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('127', '125', 'Juror/order', '预审详情', 'menu-icon fa fa-caret-right', '1', '1', '', '1', '2', '');
INSERT INTO `xy_admin_auth_rule` VALUES ('130', '125', 'Juror/order', '预审测试', '', '1', '1', '', '0', '3', '');

-- ----------------------------
-- Table structure for xy_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_log`;
CREATE TABLE `xy_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `t` int(10) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `log` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1624 DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_log
-- ----------------------------
INSERT INTO `xy_admin_log` VALUES ('1451', '13666666666', '1501991833', '127.0.0.1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1452', 'admin', '1501992242', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1453', 'admin', '1501992317', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1454', '13666666666', '1502016146', '127.0.0.1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1455', '2147483647', '1502016780', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1456', 'admin', '1502065377', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1457', '13666666666', '1502065404', '127.0.0.1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1458', '13666666666', '1502065426', '127.0.0.1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1459', '13666666666', '1502065504', '127.0.0.1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1460', '13666666666', '1502065864', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1461', 'admin', '1502079982', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1462', '13666666666', '1502080046', '127.0.0.1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1463', '13666666666', '1502941337', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1464', '13666666666', '1502941482', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1465', 'admin', '1502941991', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1466', '13666666666', '1502955057', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1467', '13666666666', '1502963830', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1468', '13666666666', '1502968006', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1469', '13666666666', '1502968132', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1470', '13666666666', '1502968149', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1471', '13666666666', '1502968166', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1472', '13666666666', '1502968718', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1473', '13666666666', '1503019369', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1474', '13666666666', '1503023488', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1475', 'admin', '1503028330', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1476', 'admin', '1503028753', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1477', '13666666666', '1503028931', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1478', '13666666666', '1503029146', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1479', '13666666666', '1503035106', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1480', '13666666666', '1503037133', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1481', '13666666666', '1503037258', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1482', '13666666666', '1503037528', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1483', '', '1503038400', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1484', '', '1503038442', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1485', '', '1503039317', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1486', '', '1503039502', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1487', '', '1503040091', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1488', '', '1503042610', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1489', '', '1503044470', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1490', '', '1503047066', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1491', '', '1503047884', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1492', '', '1503048581', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1493', '', '1503049074', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1494', '', '1503049098', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1495', '', '1503050597', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1496', '', '1503052952', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1497', '', '1503278764', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1498', '', '1503280795', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1499', '', '1503280819', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1500', '', '1503281367', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1501', '', '1503287778', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1502', '', '1503297116', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1503', '', '1503300523', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1504', '', '1503301215', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1505', '', '1503301290', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1506', '', '1503301346', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1507', '', '1503301388', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1508', '', '1503301523', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1509', 'admin', '1503304621', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1510', '', '1503306827', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1511', '', '1503365123', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1512', '', '1503365290', '::1', '编辑菜单，ID：98');
INSERT INTO `xy_admin_log` VALUES ('1513', '', '1503365455', '::1', '编辑菜单，ID：69');
INSERT INTO `xy_admin_log` VALUES ('1514', '', '1503365485', '::1', '编辑菜单，ID：120');
INSERT INTO `xy_admin_log` VALUES ('1515', '', '1503365544', '::1', '编辑菜单，ID：75');
INSERT INTO `xy_admin_log` VALUES ('1516', '', '1503365569', '::1', '编辑菜单，ID：72');
INSERT INTO `xy_admin_log` VALUES ('1517', '', '1503365609', '::1', '编辑菜单，ID：48');
INSERT INTO `xy_admin_log` VALUES ('1518', '', '1503365633', '::1', '编辑菜单，ID：74');
INSERT INTO `xy_admin_log` VALUES ('1519', '', '1503365898', '::1', '编辑菜单，ID：1');
INSERT INTO `xy_admin_log` VALUES ('1520', '', '1503365938', '::1', '编辑菜单，ID：78');
INSERT INTO `xy_admin_log` VALUES ('1521', '', '1503366197', '::1', '新增菜单，名称：预审');
INSERT INTO `xy_admin_log` VALUES ('1522', '', '1503366278', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1523', '', '1503366318', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1524', '', '1503366762', '::1', '编辑菜单，ID：115');
INSERT INTO `xy_admin_log` VALUES ('1525', '', '1503366787', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1526', '', '1503366870', '::1', '新增菜单，名称：预审概况');
INSERT INTO `xy_admin_log` VALUES ('1527', '', '1503366918', '::1', '编辑菜单，ID：126');
INSERT INTO `xy_admin_log` VALUES ('1528', '', '1503366968', '::1', '新增菜单，名称：预审详情');
INSERT INTO `xy_admin_log` VALUES ('1529', '', '1503367003', '::1', '编辑菜单，ID：127');
INSERT INTO `xy_admin_log` VALUES ('1530', '', '1503367871', '::1', '新增菜单，名称：概况');
INSERT INTO `xy_admin_log` VALUES ('1531', '', '1503368179', '::1', '编辑菜单，ID：128');
INSERT INTO `xy_admin_log` VALUES ('1532', '', '1503368263', '::1', '编辑菜单，ID：128');
INSERT INTO `xy_admin_log` VALUES ('1533', '', '1503368331', '::1', '编辑菜单，ID：128');
INSERT INTO `xy_admin_log` VALUES ('1534', '', '1503386412', '::1', '编辑菜单，ID：1');
INSERT INTO `xy_admin_log` VALUES ('1535', '', '1503395902', '::1', '编辑菜单，ID：107');
INSERT INTO `xy_admin_log` VALUES ('1536', '', '1503395924', '::1', '编辑菜单，ID：108');
INSERT INTO `xy_admin_log` VALUES ('1537', '', '1503395949', '::1', '编辑菜单，ID：111');
INSERT INTO `xy_admin_log` VALUES ('1538', '', '1503395971', '::1', '编辑菜单，ID：113');
INSERT INTO `xy_admin_log` VALUES ('1539', '', '1503396012', '::1', '编辑菜单，ID：112');
INSERT INTO `xy_admin_log` VALUES ('1540', '', '1503396076', '::1', '编辑菜单，ID：68');
INSERT INTO `xy_admin_log` VALUES ('1541', '', '1503396892', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1542', '', '1503398597', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1543', '', '1503451567', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1544', '', '1503455681', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1545', '', '1503456416', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1546', '', '1503456565', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1547', '', '1503456760', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1548', '', '1503456844', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1549', '', '1503456875', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1550', '', '1503457842', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1551', '', '1503457948', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1552', '', '1503457985', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1553', '', '1503458524', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1554', '', '1503458602', '::1', '新增菜单，名称：概况');
INSERT INTO `xy_admin_log` VALUES ('1555', '', '1503458625', '::1', '编辑菜单，ID：129');
INSERT INTO `xy_admin_log` VALUES ('1556', '', '1503459960', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1557', '', '1503467185', '::1', '编辑菜单，ID：13');
INSERT INTO `xy_admin_log` VALUES ('1558', '', '1503468851', '::1', '修改网站配置。');
INSERT INTO `xy_admin_log` VALUES ('1559', '', '1503468864', '::1', '修改网站配置。');
INSERT INTO `xy_admin_log` VALUES ('1560', '', '1503477889', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1561', '', '1503477943', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1562', '', '1503478316', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1563', '', '1503478343', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1564', '', '1503479312', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1565', '', '1503479486', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1566', '', '1503479933', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1567', '', '1503479969', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1568', '', '1503480017', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1569', 'admin', '1503480267', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1570', 'admin', '1503480287', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1571', 'admin', '1503480310', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1572', '', '1503481045', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1573', '', '1503483768', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1574', '', '1503483971', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1575', '', '1503484010', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1576', '', '1503484086', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1577', '', '1503484106', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1578', '13777777777', '1503484419', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1579', '13777777777', '1503484431', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1580', '13777777777', '1503484452', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1581', '13777777777', '1503484467', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1582', '', '1503484490', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1583', '', '1503486008', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1584', '', '1503486260', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1585', '', '1503537269', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1586', '', '1503543820', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1587', '', '1503545308', '::1', '编辑菜单，ID：1');
INSERT INTO `xy_admin_log` VALUES ('1588', '', '1503545564', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1589', '', '1503553065', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1590', '', '1503554517', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1591', '', '1503557092', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1592', 'admin', '1503560923', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1593', 'admin', '1503560998', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1594', 'admin', '1503561048', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1595', 'admin', '1503561237', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1596', 'admin', '1503561297', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1597', 'admin', '1503562529', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1598', 'admin', '1503562644', '::1', '登录失败。');
INSERT INTO `xy_admin_log` VALUES ('1599', '', '1503564923', '::1', '编辑菜单，ID：68');
INSERT INTO `xy_admin_log` VALUES ('1600', '', '1503568756', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1601', '', '1503568799', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1602', '', '1503571157', '::1', '编辑菜单，ID：127');
INSERT INTO `xy_admin_log` VALUES ('1603', '', '1503624685', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1604', '', '1503629236', '::1', '新增菜单，名称：预审测试');
INSERT INTO `xy_admin_log` VALUES ('1605', '', '1503630102', '::1', '编辑菜单，ID：130');
INSERT INTO `xy_admin_log` VALUES ('1606', '', '1503630124', '::1', '编辑菜单，ID：127');
INSERT INTO `xy_admin_log` VALUES ('1607', '', '1503633400', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1608', '', '1503633791', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1609', '', '1503636711', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1610', '', '1503640305', '::1', '登录成功。');
INSERT INTO `xy_admin_log` VALUES ('1611', '', '1510121109', '::1', '编辑菜单，ID：13');
INSERT INTO `xy_admin_log` VALUES ('1612', '', '1510121134', '::1', '编辑菜单，ID：24');
INSERT INTO `xy_admin_log` VALUES ('1613', '', '1510121617', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1614', '', '1510121617', '::1', '编辑菜单，ID：125');
INSERT INTO `xy_admin_log` VALUES ('1615', '', '1510121635', '::1', '编辑菜单，ID：24');
INSERT INTO `xy_admin_log` VALUES ('1616', '', '1510121647', '::1', '编辑菜单，ID：106');
INSERT INTO `xy_admin_log` VALUES ('1617', '', '1510121670', '::1', '编辑菜单，ID：13');
INSERT INTO `xy_admin_log` VALUES ('1618', '', '1510193399', '::1', '编辑菜单，ID：14');
INSERT INTO `xy_admin_log` VALUES ('1619', '', '1510193503', '::1', '编辑菜单，ID：15');
INSERT INTO `xy_admin_log` VALUES ('1620', '', '1510193522', '::1', '编辑菜单，ID：14');
INSERT INTO `xy_admin_log` VALUES ('1621', '', '1510193684', '::1', '编辑会员信息，会员UID：3');
INSERT INTO `xy_admin_log` VALUES ('1622', '', '1510194869', '::1', '新增菜单，名称：会员列表');
INSERT INTO `xy_admin_log` VALUES ('1623', '', '1510195245', '::1', '编辑菜单，ID：131');

-- ----------------------------
-- Table structure for xy_admin_member
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_member`;
CREATE TABLE `xy_admin_member` (
  `uid` int(11) NOT NULL,
  `user` varchar(225) NOT NULL,
  `head` varchar(255) NOT NULL COMMENT '头像',
  `sex` tinyint(1) NOT NULL COMMENT '0保密1男，2女',
  `birthday` int(10) NOT NULL COMMENT '生日',
  `phone` varchar(20) NOT NULL COMMENT '电话',
  `qq` varchar(20) NOT NULL COMMENT 'QQ',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `password` varchar(32) NOT NULL,
  `t` int(10) unsigned NOT NULL COMMENT '注册时间'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_member
-- ----------------------------
INSERT INTO `xy_admin_member` VALUES ('1', 'admin', '/Public/attached/201601/1453389194.png', '0', '-28800', '', '', '', '66d6a1c8748025462128dc75bf5ae8d1', '1442505600');
INSERT INTO `xy_admin_member` VALUES ('3', 'admin2', '/Public/attached/201601/1453389194.png', '0', '631123200', '', '', '', '8846f064edb340d9b99884100caef229', '1510193684');
INSERT INTO `xy_admin_member` VALUES ('4', 'admin3', '/Public/attached/201601/1453389194.png', '0', '-28800', '', '', '', '8846f064edb340d9b99884100caef229', '1493108809');

-- ----------------------------
-- Table structure for xy_admin_setting
-- ----------------------------
DROP TABLE IF EXISTS `xy_admin_setting`;
CREATE TABLE `xy_admin_setting` (
  `k` varchar(100) NOT NULL COMMENT '变量',
  `v` varchar(255) NOT NULL COMMENT '值',
  `type` tinyint(1) NOT NULL COMMENT '0系统，1自定义',
  `name` varchar(255) NOT NULL COMMENT '说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理表';

-- ----------------------------
-- Records of xy_admin_setting
-- ----------------------------
INSERT INTO `xy_admin_setting` VALUES ('sitename', 'Xiangyou-总后台', '0', '');
INSERT INTO `xy_admin_setting` VALUES ('title', 'Xiangyou-总后台', '0', '');
INSERT INTO `xy_admin_setting` VALUES ('keywords', 'Xiangyou-总后台', '0', '');
INSERT INTO `xy_admin_setting` VALUES ('description', 'Xiangyou-总后台', '0', '');
INSERT INTO `xy_admin_setting` VALUES ('footer', '2017?Xiangyou', '0', '');
INSERT INTO `xy_admin_setting` VALUES ('test', '测试', '1', '测试变量');

-- ----------------------------
-- Table structure for xy_user
-- ----------------------------
DROP TABLE IF EXISTS `xy_user`;
CREATE TABLE `xy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` char(13) NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` tinyint(10) NOT NULL DEFAULT '0' COMMENT '类型默认0普通用户，1会员',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xy_user
-- ----------------------------
INSERT INTO `xy_user` VALUES ('1', 'jack', '66d6a1c8748025462128dc75bf5ae8d1', '15902104762', '1492679849', '0');
INSERT INTO `xy_user` VALUES ('2', 'rose', '66d6a1c8748025462128dc75bf5ae8d1', '15902104762', '1492679849', '1');

-- ----------------------------
-- Table structure for xy_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `xy_userinfo`;
CREATE TABLE `xy_userinfo` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `sex` tinyint(10) NOT NULL COMMENT '性别',
  `height` int(10) NOT NULL COMMENT '身高',
  `origin` varchar(255) NOT NULL COMMENT '籍贯',
  `age` tinyint(10) NOT NULL,
  `record` char(60) NOT NULL,
  `cred_type` char(60) NOT NULL COMMENT '证件类型',
  `certificates` char(60) NOT NULL,
  `hobby` char(60) NOT NULL,
  `urgent_name` char(60) NOT NULL COMMENT '紧急联系人姓名',
  `urgent_tel` char(13) NOT NULL COMMENT '紧急联系人手机号',
  `health` char(50) NOT NULL,
  `bankcard` char(50) NOT NULL,
  `live_alone` tinyint(5) NOT NULL COMMENT '是否独居，1是，0否',
  `sensitive_source` varchar(60) NOT NULL COMMENT '敏感源',
  `religion` varchar(60) NOT NULL COMMENT '宗教信仰',
  `account` decimal(10,4) NOT NULL COMMENT '账户余额',
  `pay_password` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xy_userinfo
-- ----------------------------
