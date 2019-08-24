-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: 10.18.57.16
-- 生成日期: 2019 年 05 月 28 日 13:38
-- 服务器版本: 5.6.17
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `h_z09416143`
--
CREATE DATABASE IF NOT EXISTS `h_z09416143` DEFAULT CHARACTER SET gbk COLLATE gbk_chinese_ci;
USE `h_z09416143`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `pwd` char(20) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `pwd`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, '娱乐'),
(2, '体育'),
(3, '时政');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(100) NOT NULL,
  `attachment` char(10) DEFAULT NULL,
  PRIMARY KEY (`news_id`),
  KEY `FK_news_admin` (`admin_id`),
  KEY `FK_news_category` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`news_id`, `admin_id`, `category_id`, `title`, `content`, `attachment`) VALUES
(3, 1, 3, '习近平向2019年中国国际服务贸易交易会致贺信', '新华网北京5月28日电 2019年中国国际服务贸易交易会5月28日在北京开幕，国家主席习近平向交易会致贺信。', 'a.txt'),
(4, 1, 3, '外交部副部长孔铉佑接任驻日大使 将赴日履新', '外交部消息，中国外交部副部长兼中国政府朝鲜半岛事务特别代表孔铉佑被任命为中国新任驻日本大使', ''),
(5, 1, 3, '联邦快递:对于华为货件被转运表示抱歉 无外部要求', '路透社报道，联邦快递公司将华为公司寄往中国的包裹转运到美国。', ''),
(6, 1, 1, '花粥方发声明否认歌曲抄袭：与事实严重不符', '5月27日，歌手花粥方发声明否认歌曲抄袭，并表示对于持续发布不实消息的用户，己方将保留依法追责的权利。', ''),
(7, 1, 1, '翟天临风波后论文查重更严 准毕业生苦不堪言', '5月底，各大高校的准毕业生们开始准备自己的论文，受到翟天临学术风波的影响，论文查重变得更加严格，准毕业生们苦不堪言，在网上一吐“苦水”，还将翟天临骂上了热搜。', ''),
(8, 1, 1, '安东尼奥封戛纳影帝 韩国电影《寄生虫》夺金棕榈', '戛纳时间5月25晚，第72届戛纳电影节“主竞赛单元”颁奖典礼在戛纳电影宫举行，这晚安东尼奥班德拉斯凭电影《痛苦与荣耀》击败一众对手', ''),
(9, 1, 2, '杜兰特FMVP赔率掉到第5不如追梦 赌城最看好库里', '勇士确认凯文-杜兰特打不了总决赛G1，同时也还没有确定他的具体复出日期，是否能顺利随队前往客场都还是未知数。', ''),
(10, 1, 2, '英冠附加赛-麦克金破门 维拉2-1德比郡升入英超', '北京时间5月27日晚22时，2018-19赛季英冠升级附加赛决赛在温布利球场举行，维拉2-1战胜兰帕德执教的德比郡，成功升入下赛季的英超联赛', ''),
(11, 1, 2, '西班牙警方"雷霆扫球":皇马银河战舰时期大将被带走', '西班牙媒体报道称包括前皇马球员劳尔-布拉沃在内的至少5名效力于西班牙联赛的球员因涉嫌操纵比赛被捕', '');

-- --------------------------------------------------------

--
-- 表的结构 `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `content` text,
  `state` char(10) DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `review`
--

INSERT INTO `review` (`review_id`, `user_id`, `news_id`, `content`, `state`) VALUES
(1, 2, 6, '支持维权，抵制盗版。', '已审核');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` int(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', 123),
(2, '颜兆萍', 123),
(3, '吴佳佳', 123);

--
-- 限制导出的表
--

--
-- 限制表 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_news_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `FK_news_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
