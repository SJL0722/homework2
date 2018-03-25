SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `aiyingshi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `aiyingshi`;

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `about` (`id`, `content`, `addtime`, `userid`) VALUES
(1, '&lt;p&gt;&lt;img src=&quot;/exercise2o/Public/upload/5aa5542c62ab0.jpeg&quot; alt=&quot;&quot; style=&quot;max-width:100%;&quot; class=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;健身学院由顶级国际俱乐部投资人以及经营专家Jack于2017年创立，专注于开发健康与健身行业最顶级的产品。&lt;/p&gt;&lt;p&gt;汇聚全球专业健身教练，融合世界领先健身理念，健身学院旨在让健康的生活方式渗透至每位会员的日常生活和工作，让健身学院成为健身爱好精英的汇合之地，同时也让快乐、美妙的运动体验协助每一位会员创造奇妙而美丽的人生。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-12 00:08:20', 0);

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `addtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

INSERT INTO `admin` (`id`, `username`, `password`, `img`, `addtime`) VALUES
(1, 'admin', 'admin', '', '0000-00-00 00:00:00');

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `poster` varchar(50) NOT NULL COMMENT '题图',
  `summary` varchar(100) NOT NULL COMMENT '简介',
  `detail` text NOT NULL COMMENT '正文',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

INSERT INTO `article` (`id`, `uid`, `title`, `poster`, `summary`, `detail`, `addtime`) VALUES
(1, 1, '5个兼顾导演、表演的现场拍摄技巧', 'image/5aae9652aa556.jpg', '一些主演兼导演的电影人必须掌握拍摄的所有事情。这里有五个技巧，可以简化你在片场兼顾导演和表演的时间。', '&lt;p&gt;从奥逊·威尔斯（Orson Welles）这样的先锋电影人，到像克林特·伊斯特伍德（Clint Eastwood）这样的经典硬汉明星，再到像斯派克·李（Spike Lee）这样的电影传奇人物，再到像莉娜·邓纳姆（Lena Dunham）这样的跨界明星，电影制作人既能拍摄自己的作品中表演，也能执导自己的作品，这是一种非常有天赋但也很罕有的电影人才。&lt;/p&gt;&lt;p&gt;然而，尽管这看起来像都是一个简单的解决方案（还有谁比你更适合在自己杰作中闪耀呢?），但这也是一个巨大的挑战，在这个过程中不能丢掉你的思维。因此，让我们来看看这些实用的技巧，帮助接下来的作品中获得成功。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;片场之前要昨晚拍摄计划&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909035156513.jpg&quot; alt=&quot;production.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;正如大多数的电影和视频拍摄中一样，在开始拍摄之前，你前期拍摄计划的越完善越好。当你要兼顾演员和导演工作时，最好这样做，二者工作都需要良好的直觉和创造性来解决问题的能力，但是这样你可以通过一个严格的拍摄计划来降低风险。&lt;/p&gt;&lt;p&gt;当拍摄你在现场表演时，要做大量的表格记录、演练和排练，把所有的东西都详实得记下来。理想情况是，一旦你到了片场，就只需完成预演的动作就完成了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;必要时要用演员替身&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909035193681.jpg&quot; alt=&quot;filming.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;在片场更好的指导自己（或别人）表演的好方法是为自己要使用演员替身，这样你就可以完全专注于导演工作。演员替身并不一定要完美的——他只需要站在那里，来辅助你的技术部门，比如灯光、录音、和摄影机位置的调整等等。这样就能让你整个的拍摄场景，演员举止和动作完全可视化了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;信任你的“替身”导演&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909036774589.jpg&quot; alt=&quot;on-set.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;要真正兼顾这两个如此重要的角色，需要一个值得信任的人作你的“替身”导演。如果项目足够大，你的导演助理可能是那个人，但在小的项目里，可能是你的摄影指导，你的御用搭档，或者其他演员。如果担任的是你信任的人，他们就能给你反馈、提醒拍摄的注意事项和方向，这样帮助你在表演时依然保持导演的风格和个性。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;监视器是很好的辅助工具&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909036273862.jpg&quot; alt=&quot;actress.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;在片场中指导自己演戏最大的问题就是你看不到自己的表演。幸运的是，摄影机已经准备好了，监视器在拍摄过程中会起到巨大的辅助作用，所以你不只是在取景器上与其他人一起工作。如果监视器上有旋转移动装置，你甚至可以不离开拍摄位置，让监视器屏幕直接转向你，就可以看到自己的表演了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;要有足够时间转换身份&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909055853127.jpg&quot; alt=&quot;film-crew.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;一个演员兼导演在片场试着兼顾这两者时，最重要的就是要给自己足够时间去脱离一个身份，然后再试着转换到另一个。如果你需要花时间在指导拍摄后，重新调整自己的注意力再转换到下个场景里演戏，那么你称不上是顶尖的演员。演戏是一件很辛苦的工作，它需要自身细致入微的观察生活细节，而不仅仅是执行命令。相信拍摄团队和朋友会帮助你的，但也要花时间兼顾这两个身份的同时呈现你最好的发挥。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-19 00:39:46'),
(2, 1, '压箱底！高贵冷艳大清新调色方法', 'image/5ab27a78042dc.jpeg', '让你把所有的妇女都拍成少女', '&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;Tip 1&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;色温数值越大即影调越偏暖&lt;/p&gt;&lt;p&gt;数值越小则影调越偏蓝&lt;br&gt;&lt;/p&gt;&lt;p&gt;事实上，在相机上，与色温的概念相反，白平衡设置越低，照片越偏蓝，越高则越偏黄，我们刚才说过，白平衡“不管在任何光源下，都能将白色物体还原为白色”。试想，如果在黄色（色温低，设为3000K）的光源下，白色物体会呈现黄色，这时如果相机白平衡设置成5200K的日光，拍出来的物体就会偏黄；而如果降低为3000K，那么拍摄出来的白色物体就会被还原成白色（注意，就是比原来偏黄的照片要偏蓝了）&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;Tip 2&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad07a86.png&quot; class=&quot;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p style=&quot;text-align: left;&quot;&gt;加LUT时，创意下面比基本设置里可调的参数相对比较多，可更好地对画面进行更精细的校正&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;Tip 3&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;一般来说，每一条素材的拍摄环境和光线不能 保持一致，所以后期会要对每一条素材进行单独的微调。&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;TIP 4&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad4a508.png&quot; class=&quot;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad9e9a6.png&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p style=&quot;text-align: center;&quot;&gt;Slog2 和 Slog3 的区别&lt;br&gt;&lt;/p&gt;&lt;p&gt;两个都是大幅度提升整体动态范围为后期调色增大空间，暗部呈现更多细节，一定程度的高光过曝可以拉回来。log3更先进动态范围更大，原始素材更灰对比度更低，因此对后期的要求也更高。&lt;/p&gt;&lt;p&gt;（本次拍摄在光线不足的地下车库拍摄，所以用的是Slog2，可更好地控制噪点）&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-21 23:30:00');

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `pic` varchar(50) NOT NULL COMMENT '封面',
  `addtime` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='频道分类表';

INSERT INTO `category` (`id`, `name`, `pic`, `addtime`) VALUES
(1, '科幻', 'image/5ab66cfe68519.jpg', '2018-03-24 23:21:34'),
(2, '动作', 'image/5ab6da566c6d3.jpg', '2018-03-25 07:08:06'),
(3, '喜剧', 'image/5ab737a938897.jpg', '2018-03-25 13:46:17'),
(4, '爱情', 'image/5ab6dab4960d0.jpg', '2018-03-25 07:09:40'),
(5, '剧情', 'image/5ab6ddd042a19.jpg', '2018-03-25 07:22:56'),
(6, '网络大电影', 'image/5ab6dde2db899.jpg', '2018-03-25 07:23:14');

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `content` varchar(100) NOT NULL COMMENT '内容',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `starcount` int(11) NOT NULL COMMENT '点赞数',
  `addtime` datetime NOT NULL COMMENT '发布时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论';

INSERT INTO `comment` (`id`, `uid`, `rid`, `content`, `type`, `starcount`, `addtime`) VALUES
(1, 1, 1, '做的不错！', 'Movie', 0, '2018-03-18 22:49:33'),
(2, 1, 4, '创意不错！', 'Movie', 0, '2018-03-22 07:10:19'),
(3, 1, 1, '&lt;p&gt;fds;kf;lkf;lsfkls;fk&lt;/p&gt;', 'Forum', 0, '2018-03-24 10:23:45'),
(4, 1, 1, '&lt;p&gt;sdjsljdflskfjsdk&lt;/p&gt;', 'Forum', 0, '2018-03-24 10:23:55');

CREATE TABLE `favor` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `addtime` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='喜欢';

INSERT INTO `favor` (`id`, `rid`, `uid`, `type`, `addtime`) VALUES
(1, 1, 1, 'Movie', '2018-03-18 23:38:23'),
(2, 2, 2, 'Movie', '2018-03-22 07:02:35'),
(3, 3, 2, 'Movie', '2018-03-22 07:05:15'),
(4, 4, 1, 'Movie', '2018-03-22 07:06:59'),
(5, 5, 1, 'Movie', '2018-03-22 07:13:37');

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `poster` varchar(50) NOT NULL COMMENT '题图',
  `summary` varchar(100) NOT NULL COMMENT '简介',
  `detail` text NOT NULL COMMENT '正文',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章';

INSERT INTO `forum` (`id`, `uid`, `title`, `poster`, `summary`, `detail`, `addtime`) VALUES
(1, 1, '重中之重', '', '', '&lt;p&gt;在谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢&lt;/p&gt;', '2018-03-24 07:28:54');

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `name` varchar(30) NOT NULL COMMENT '标题',
  `typeid` int(11) NOT NULL COMMENT '频道分类ID',
  `pic` varchar(50) NOT NULL COMMENT '封面',
  `description` varchar(50) NOT NULL COMMENT '描述',
  `videosource` varchar(50) NOT NULL COMMENT '视频文件地址',
  `content` text NOT NULL COMMENT '正文',
  `pass` tinyint(1) NOT NULL COMMENT '审核',
  `addtime` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='视频';

INSERT INTO `movie` (`id`, `uid`, `name`, `typeid`, `pic`, `description`, `videosource`, `content`, `pass`, `addtime`) VALUES
(3, 2, '捉妖记2', 3, 'image/5ab736d0b479b.jpg', '2018年大年初一，《捉妖记2》“妖”你同行', 'video/5ab736d13b4e4.mp4', '&lt;p&gt;地　区:&amp;nbsp;内地&lt;/p&gt;&lt;p&gt;语　言:&amp;nbsp;普通话&lt;/p&gt;&lt;p&gt;上映时间:&amp;nbsp;2018-02-16\r\n&lt;/p&gt;&lt;p&gt;标　签: 喜剧&amp;nbsp;奇幻&amp;nbsp;院线&lt;/p&gt;&lt;p&gt;简　介：&amp;nbsp;上一集与胡巴分别后，天荫带着小岚踏上寻父之路，在义薄云天的天师堂堂主云大哥的帮助下，二人得知天荫父亲宋戴天的护妖轨迹；而重回永宁村的胡巴再度被妖王追杀，颠沛流离逃亡时结识大赌徒屠四谷和一只妖怪，三人一起过着相依为命的生活，但又因屠四谷欠下的巨额赌债横生诸多波折。与此同时，江湖盛传小妖王胡巴的重金悬赏令，妖界大军、天师精英、绿林草莽闻风而动，多方势力为抢夺胡巴在清水镇掀起腥风血雨。千钧一发之际，念子心切的天荫和小岚通过天师堂找到胡巴并一起逃离险境。岂料，一场更大的惊天阴谋尾随而至，伺机而动……&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 13:42:41'),
(5, 2, '战狼2', 2, 'image/5ab7304f1bbc7.jpg', '《战狼》终极预告改档4月2日 吴京揭秘真相', 'video/5ab7304f68ef8.mp4', '&lt;p&gt;战狼2\r\n&lt;/p&gt;&lt;p&gt;导演：吴京\r\n&lt;/p&gt;&lt;p&gt;地区：华语&lt;/p&gt;&lt;p&gt;主演：&amp;nbsp;吴京&amp;nbsp;饰冷锋&amp;nbsp;&amp;nbsp;弗兰克·格里罗&amp;nbsp;饰老爹&amp;nbsp;吴刚&amp;nbsp;饰何建国&amp;nbsp;&amp;nbsp;张翰&amp;nbsp;饰卓亦凡&amp;nbsp;&amp;nbsp;卢靖姗&amp;nbsp;饰瑞秋\r\n&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;p&gt;简介：&amp;nbsp;故事发生在非洲附近的大海上，主人公冷锋遭遇人生滑铁卢，被“开除军籍”，本想漂泊一生的他，正当他打算这么做的时候，一场突如其来的意外打破了他的计划，突然被卷入了一场非洲国家叛乱，本可以安全撤离，却因无法忘记曾经为军人的使命，孤身犯险冲回沦陷区，带领身陷屠杀中的同胞和难民，展开生死逃亡。随着斗争的持续，体内的狼性逐渐复苏，最终孤身闯入战乱区域，为同胞而战斗。\r\n&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 13:14:55'),
(6, 1, '环太平洋：雷霆再起', 1, 'image/5ab73a1d4ebe0.jpg', '《环太平洋：雷霆再起》终极预告 机甲迎战怪兽硬拼到底', 'video/5ab6efb61e096.mp4', '&lt;p&gt;7.7分&amp;nbsp;/&amp;nbsp;预告片&amp;nbsp;动作&amp;nbsp;科幻&amp;nbsp;冒险&amp;nbsp;院线\r\n&lt;/p&gt;&lt;p&gt;主演：约翰·博耶加&amp;nbsp;斯科特·伊斯特伍德&amp;nbsp;卡莉·史派妮&amp;nbsp;景甜&amp;nbsp;菊地凛子&amp;nbsp;伯恩·戈曼&amp;nbsp;亚德里亚·霍纳&amp;nbsp;张晋\r\n&lt;/p&gt;&lt;p&gt;导演：斯蒂文·S·迪奈特\r\n&lt;/p&gt;&lt;p&gt;简介：故事发生在距前作十年之后的2035年，面对更加强大的怪兽卷土重来，由年轻一代组成的机甲驾驶员们再次操控巨型机甲奋起抵抗。而他们能否肩负起拯救全人类命运的重任，让人拭目以待。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 13:56:45'),
(7, 2, '西游记女儿国', 4, 'image/5ab73923656af.jpg', '《西游记女儿国》曝终极预告 光雾山美景终上大荧幕', 'video/5ab739498c13e.mp4', '&lt;p&gt;《西游记女儿国》是由星皓影业有限公司出品的喜剧魔幻片，由郑保瑞执导，郭富城、冯绍峰、赵丽颖、小沈阳、罗仲谦、林志玲、梁咏琪、刘涛、苑琼丹、潘斌龙、施诗领衔主演。\r\n&lt;/p&gt;&lt;p&gt;该片讲述了唐僧师徒四人在取经路上与各路妖魔鬼怪斗智斗勇的故事 。\r\n&lt;/p&gt;&lt;p&gt;该片于2017年电影之夜获得年度最受期待系列电影奖[3]&amp;nbsp;&amp;nbsp;，于2018年2月16日（大年初一）在中国内地上映 。&lt;/p&gt;&lt;p&gt;唐僧师徒途经忘川河，因激怒河神而误入西梁女界。闯入其中，众人才发现这个国家只有女性，并且建国以来此地就没来过男性。而且国中立有祖训，将男人视为天敌。典籍中更有预言，指明有朝一日，会有东土而来的僧人（冯绍峰饰）带着一只猴子（郭富城饰）、一头猪（小沈阳饰）和一个小蓝人（罗仲谦饰）闯入其中。他们到来之日，便是女儿国走向毁灭之时。&lt;/p&gt;', 1, '2018-03-25 13:53:13'),
(8, 1, '密战', 5, 'image/5ab73c26a797d.jpg', '《密战》预告片花：誓死捍卫生死电台，密电战役全国启动', 'video/5ab739498c13f.mp4', '&lt;p&gt;别　名:&amp;nbsp;新永不消逝的电波&lt;br&gt;地　区:&amp;nbsp;内地&amp;nbsp;&lt;br&gt;语　言:&amp;nbsp;普通话\r\n&lt;/p&gt;&lt;p&gt;上映时间:&amp;nbsp;2017-11-03\r\n&lt;/p&gt;&lt;p&gt;标　签: 战争&amp;nbsp;动作&amp;nbsp;剧情&amp;nbsp;院线&lt;/p&gt;&lt;p&gt;简　介：&amp;nbsp;淞沪会战后上海沦陷，地下工作者林翔（郭富城饰）受命来到危机四伏的上海，重建惨遭敌人破坏的地下抗日战线。在这里他遇到单纯却很有正义感的兰芳（赵丽颖饰），这对临时组成的“地下党夫妇”将在战火纷飞中，携手与日本侵略者及伪政府特务展开惊险刺激的生死较量……&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 14:37:10'),
(9, 1, '金装少年唐伯虎', 6, 'image/5ab74627e4cb3.jpg', '《金装少年唐伯虎》先导预告', 'video/5ab74681b7b82.mp4', '&lt;p&gt;地　区:&amp;nbsp;内地&amp;nbsp;&lt;/p&gt;&lt;p&gt;语　言:&amp;nbsp;普通话&amp;nbsp;&lt;/p&gt;&lt;p&gt;上映时间:&amp;nbsp;2018-03-20\r\n&lt;/p&gt;&lt;p&gt;标　签: 喜剧&amp;nbsp;古装&lt;/p&gt;&lt;p&gt;简　介：&amp;nbsp;少年唐寅出生在一个豪富之家，无奈老爸老妈过于信奉“穷养儿，富养女”的人生理念，故意装作穷苦人家，以期待唐寅能够“健康成长”，成为可造之材并将唐寅送入一个文武同授的书院中。可是书院却被恶势力要挟，唐伯虎师徒二人经过一番波折，终于联手并在对决中惊险获胜，将恶势力击退。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 14:51:31'),
(10, 0, '南极之恋', 4, 'image/5ab74c116286f.jpg', '《南极之恋》定档预告 赵又廷杨子姗南极遇险', 'video/5ab74c30572be.mp4', '&lt;p&gt;别　名:&amp;nbsp;南极绝恋\r\n&lt;/p&gt;&lt;p&gt;地　区:&amp;nbsp;内地\r\n&lt;/p&gt;&lt;p&gt;语　言:&amp;nbsp;普通话\r\n&lt;/p&gt;&lt;p&gt;上映时间:&amp;nbsp;2018-02-02\r\n&lt;/p&gt;&lt;p&gt;标　签:&amp;nbsp;&amp;nbsp;爱情&amp;nbsp;冒险&amp;nbsp;院线\r\n&lt;/p&gt;&lt;p&gt;简　介:&amp;nbsp;电影《南极之恋》改编自导演吴有音创作的长篇小说，讲述了婚庆公司老板吴富春（赵又廷饰）和高空物理学家荆如意（杨子姗饰）在南极上空遭遇坠机，两个毫无共同语言的男女，在酷寒冻土、随处都是绝境的南极腹地中，面对伤痛折磨、物资匮尽的困境，两人彼此依存、互生情愫的纯爱故事。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 15:13:52'),
(11, 0, '谜巢', 2, 'image/5ab76957121e2.jpg', '《谜巢》吴尊特辑 冻龄男神为长生不老探秘皇陵', 'video/5ab7696c3b67f.mp4', '&lt;p&gt;别　名:&amp;nbsp;蛛网 蛛巢 Nest&lt;/p&gt;&lt;p&gt;地　区:&amp;nbsp;内地&lt;/p&gt;&lt;p&gt;语　言:&amp;nbsp;英语&lt;/p&gt;&lt;p&gt;上映时间:&amp;nbsp;2018-01-19&lt;/p&gt;&lt;p&gt;标　签:&lt;a href=&quot;http://v.qq.com/x/search?q=%E5%8A%A8%E4%BD%9C&quot; target=&quot;_blank&quot;&gt;动作&lt;/a&gt;&amp;nbsp;&lt;a href=&quot;http://v.qq.com/x/search?q=%E5%86%92%E9%99%A9&quot; target=&quot;_blank&quot;&gt;冒险&lt;/a&gt;&amp;nbsp;&lt;a href=&quot;http://v.qq.com/x/search?q=%E5%A5%87%E5%B9%BB&quot; target=&quot;_blank&quot;&gt;奇幻&lt;/a&gt;&amp;nbsp;&lt;a href=&quot;http://v.qq.com/x/search?q=%E9%99%A2%E7%BA%BF&quot; target=&quot;_blank&quot;&gt;院线&lt;/a&gt;&lt;/p&gt;&lt;p&gt;简　介：&amp;nbsp;生物科技公司研究员卢克（吴尊 饰）和伊森（瑞恩·约翰逊 Ryan Johnson 饰）深入洞穴探究，意外发现一座千年古墓，二人随即失去音讯。卢克姐姐嘉（李冰冰 饰）得知弟弟失踪，加入搜救队伍，与救援队长雷德利（凯南·鲁兹 Kellan Lutz 饰）以及心怀鬼胎的科技公司总裁梅森（凯尔希·格兰莫 Kelsey Grammer 饰）等人共同展开一段地宫救赎之旅 。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-25 17:18:36');

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(20) NOT NULL COMMENT '标题',
  `pic` varchar(50) NOT NULL COMMENT '首图',
  `description` varchar(100) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻（公告+活动）';

INSERT INTO `news` (`id`, `uid`, `title`, `pic`, `description`, `content`, `addtime`) VALUES
(1, 1, ' 电影《毕业作品》曝先导预告片', 'image/5ab76c50a9af3.jpg', '', '&lt;p&gt;今日，由张一山、丁丁领衔主演的爱情电影《毕业作品》曝光了先导预告片，一场关于爱和冒险的毕业旅行，即将于4月13日毕业季之际登上大银幕，与观众见面。预告片中张一山为了帮女友丁丁完成毕业作品而登上孤岛，原以为是一场充满浪漫的爱情之旅，结果却是惊心动魄。陌生的同行之人、怪异的孤岛村民、熊熊燃烧的大火······岛上发生的种种，都将这场旅行变得极不平凡。&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790653711n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;　　《毕业作品》讲述了警校毕业生殷浩(张一山饰)与女友小暖(丁丁饰)为了拍摄毕业作品，登上了一座与世隔绝的孤岛，一场充满期待的爱情之旅却陷入了30年前的神秘大火案中，一件件波谲云诡的事件发生，让整个毕业之旅开始变得与众不同。通过预告片，我们看到张一山饰演的殷浩时而青春活泼、时而沉思案情、时而爱意绵绵，在这几种情绪之间互相切换时，张一山的表演都非常精准。&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790654181n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;　　《毕业作品》将于4月13日登陆全国院线，电影中，张一山饰演的殷浩与丁丁饰演的小暖为了拍摄毕业作品登上了孤岛。而在此时，相信很多学生也在为自己的毕业作品绞尽脑汁，无论是论文还是社会实践，相信每个人的毕业作品都会有着属于自己的特殊烙印。而在毕业季到来之际，张一山携手丁丁也为观众献上了一份与众不同的毕业作品。&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790654491n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-25 17:30:56'),
(2, 1, '《黑豹》成美国票房最高超级英雄电影', 'image/5ab76d0e44bb7.jpg', '超越《复联》', '&lt;p&gt;尽管已经上映了一个多月的时间，但漫威超级英雄电影《黑豹》的票房走势依然强劲。这周六，《黑豹》的北美票房正式达到6.3亿美元，超过了《复仇者联盟》在2012年的6.234亿美元票房，成为美国票房最高的超级英雄电影。&lt;/p&gt;&lt;p align=&quot;center&quot; style=&quot;text-align: center;&quot;&gt;&lt;img alt=&quot;游民星空&quot; src=&quot;http://img1.gamersky.com/image2018/03/20180325_wyc_246_1/gamersky_02small_04_2018325921156.jpg&quot; class=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;　　此外，《黑豹》目前还成为了第七部北美票房收入超过6亿美元的电影，排名其中第六的位置。值得一提的是，这部电影的制作成本为2亿美元，堪称MCU最赚钱的电影之一。&lt;/p&gt;&lt;p&gt;　　在全球市场上，《黑豹》取得了超过12亿美元的票房成绩，预计这周末结束它将正式超过漫威《钢铁侠3》的12.14亿美元票房成绩。而排在它之前的还有《复仇者联盟》（全球15亿美元票房）与《复仇者联盟2：奥创纪元》（全球14亿美元票房）。而在《复联3》和《复联4》中，黑豹还将继续担当重要英雄角色出现。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-25 17:34:06');

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL COMMENT '图片地址',
  `url` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `slideshow` (`id`, `img`, `url`) VALUES
(4, 'image/5ab52a04bedfa.jpg', 'home/movie/detail?id=10'),
(5, 'image/5ab52a165f62b.jpg', 'home/movie/detail?id=6'),
(6, 'image/5ab52a2923244.jpg', 'home/movie/detail?id=11');

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '密码',
  `img` varchar(50) NOT NULL COMMENT '头像',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

INSERT INTO `user` (`id`, `username`, `password`, `img`, `addtime`) VALUES
(0, 'admin', '', '', '2018-03-20 00:00:00'),
(1, '123', '123', 'image/5aac76c83e06c.jpg', '2018-03-17 10:00:40'),
(2, '345', '345', 'image/5ab2de2129ac0.jpg', '2018-03-22 06:35:13');

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `num` int(11) NOT NULL COMMENT '分值',
  `addtime` datetime NOT NULL COMMENT '发布时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评分表';

INSERT INTO `vote` (`id`, `rid`, `uid`, `type`, `num`, `addtime`) VALUES
(2, 1, 1, 'Movie', 5, '2018-03-18 23:15:20'),
(3, 2, 2, 'Movie', 5, '2018-03-22 07:03:10'),
(4, 3, 2, 'Movie', 5, '2018-03-22 07:05:10'),
(5, 5, 1, 'Movie', 5, '2018-03-22 07:13:45'),
(6, 6, 1, 'Movie', 3, '2018-03-22 07:46:58'),
(7, 8, 1, 'Movie', 1, '2018-03-25 14:41:31'),
(8, 7, 1, 'Movie', 1, '2018-03-25 14:41:43'),
(9, 9, 1, 'Movie', 1, '2018-03-25 17:02:25'),
(10, 10, 1, 'Movie', 1, '2018-03-25 17:02:33'),
(11, 11, 1, 'Movie', 1, '2018-03-25 17:21:04');


ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `favor`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `favor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
