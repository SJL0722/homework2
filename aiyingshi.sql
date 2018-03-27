SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `aiyingshi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `aiyingshi`;

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `about` (`id`, `content`, `addtime`, `userid`) VALUES
(1, '&lt;p&gt;&lt;img src=&quot;/exercise2o/Public/upload/5aa5542c62ab0.jpeg&quot; alt=&quot;&quot; style=&quot;max-width:100%;&quot; class=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;健身学院由顶级国际俱乐部投资人以及经营专家Jack于2017年创立，专注于开发健康与健身行业最顶级的产品。&lt;/p&gt;&lt;p&gt;汇聚全球专业健身教练，融合世界领先健身理念，健身学院旨在让健康的生活方式渗透至每位会员的日常生活和工作，让健身学院成为健身爱好精英的汇合之地，同时也让快乐、美妙的运动体验协助每一位会员创造奇妙而美丽的人生。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-12 00:08:20', 0);

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL,
  `addtime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

INSERT INTO `admin` (`id`, `username`, `password`, `img`, `addtime`) VALUES
(1, 'admin', 'admin', '', '0000-00-00 00:00:00');

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `poster` varchar(50) NOT NULL COMMENT '题图',
  `summary` varchar(100) NOT NULL COMMENT '简介',
  `detail` text NOT NULL COMMENT '正文',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章';

INSERT INTO `article` (`id`, `uid`, `title`, `poster`, `summary`, `detail`, `addtime`) VALUES
(1, 1, '5个兼顾导演、表演的现场拍摄技巧', 'image/5aae9652aa556.jpg', '一些主演兼导演的电影人必须掌握拍摄的所有事情。这里有五个技巧，可以简化你在片场兼顾导演和表演的时间。', '&lt;p&gt;从奥逊·威尔斯（Orson Welles）这样的先锋电影人，到像克林特·伊斯特伍德（Clint Eastwood）这样的经典硬汉明星，再到像斯派克·李（Spike Lee）这样的电影传奇人物，再到像莉娜·邓纳姆（Lena Dunham）这样的跨界明星，电影制作人既能拍摄自己的作品中表演，也能执导自己的作品，这是一种非常有天赋但也很罕有的电影人才。&lt;/p&gt;&lt;p&gt;然而，尽管这看起来像都是一个简单的解决方案（还有谁比你更适合在自己杰作中闪耀呢?），但这也是一个巨大的挑战，在这个过程中不能丢掉你的思维。因此，让我们来看看这些实用的技巧，帮助接下来的作品中获得成功。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;片场之前要昨晚拍摄计划&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909035156513.jpg&quot; alt=&quot;production.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;正如大多数的电影和视频拍摄中一样，在开始拍摄之前，你前期拍摄计划的越完善越好。当你要兼顾演员和导演工作时，最好这样做，二者工作都需要良好的直觉和创造性来解决问题的能力，但是这样你可以通过一个严格的拍摄计划来降低风险。&lt;/p&gt;&lt;p&gt;当拍摄你在现场表演时，要做大量的表格记录、演练和排练，把所有的东西都详实得记下来。理想情况是，一旦你到了片场，就只需完成预演的动作就完成了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;必要时要用演员替身&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909035193681.jpg&quot; alt=&quot;filming.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;在片场更好的指导自己（或别人）表演的好方法是为自己要使用演员替身，这样你就可以完全专注于导演工作。演员替身并不一定要完美的——他只需要站在那里，来辅助你的技术部门，比如灯光、录音、和摄影机位置的调整等等。这样就能让你整个的拍摄场景，演员举止和动作完全可视化了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;信任你的“替身”导演&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909036774589.jpg&quot; alt=&quot;on-set.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;要真正兼顾这两个如此重要的角色，需要一个值得信任的人作你的“替身”导演。如果项目足够大，你的导演助理可能是那个人，但在小的项目里，可能是你的摄影指导，你的御用搭档，或者其他演员。如果担任的是你信任的人，他们就能给你反馈、提醒拍摄的注意事项和方向，这样帮助你在表演时依然保持导演的风格和个性。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;监视器是很好的辅助工具&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909036273862.jpg&quot; alt=&quot;actress.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;在片场中指导自己演戏最大的问题就是你看不到自己的表演。幸运的是，摄影机已经准备好了，监视器在拍摄过程中会起到巨大的辅助作用，所以你不只是在取景器上与其他人一起工作。如果监视器上有旋转移动装置，你甚至可以不离开拍摄位置，让监视器屏幕直接转向你，就可以看到自己的表演了。&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;要有足够时间转换身份&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/ueditor/image/20180313/1520909055853127.jpg&quot; alt=&quot;film-crew.jpg&quot;&gt;&lt;/p&gt;&lt;p&gt;一个演员兼导演在片场试着兼顾这两者时，最重要的就是要给自己足够时间去脱离一个身份，然后再试着转换到另一个。如果你需要花时间在指导拍摄后，重新调整自己的注意力再转换到下个场景里演戏，那么你称不上是顶尖的演员。演戏是一件很辛苦的工作，它需要自身细致入微的观察生活细节，而不仅仅是执行命令。相信拍摄团队和朋友会帮助你的，但也要花时间兼顾这两个身份的同时呈现你最好的发挥。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-19 00:39:46'),
(2, 1, '压箱底！高贵冷艳大清新调色方法', 'image/5ab27a78042dc.jpeg', '让你把所有的妇女都拍成少女', '&lt;p style=&quot;text-align: left;&quot;&gt;&lt;strong&gt;Tip 1&lt;/strong&gt;&lt;/p&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;色温数值越大即影调越偏暖&lt;/p&gt;&lt;p&gt;数值越小则影调越偏蓝&lt;br&gt;&lt;/p&gt;&lt;p&gt;事实上，在相机上，与色温的概念相反，白平衡设置越低，照片越偏蓝，越高则越偏黄，我们刚才说过，白平衡“不管在任何光源下，都能将白色物体还原为白色”。试想，如果在黄色（色温低，设为3000K）的光源下，白色物体会呈现黄色，这时如果相机白平衡设置成5200K的日光，拍出来的物体就会偏黄；而如果降低为3000K，那么拍摄出来的白色物体就会被还原成白色（注意，就是比原来偏黄的照片要偏蓝了）&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;Tip 2&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad07a86.png&quot; class=&quot;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p style=&quot;text-align: left;&quot;&gt;加LUT时，创意下面比基本设置里可调的参数相对比较多，可更好地对画面进行更精细的校正&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;Tip 3&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p&gt;一般来说，每一条素材的拍摄环境和光线不能 保持一致，所以后期会要对每一条素材进行单独的微调。&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;/section&gt;&lt;section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;p&gt;&lt;strong&gt;TIP 4&lt;/strong&gt;&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad4a508.png&quot; class=&quot;&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;http://cs.xinpianchang.com/uploadfile/group/20180308/5aa10bad9e9a6.png&quot;&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;section&gt;&lt;section&gt;&lt;section&gt;&lt;p style=&quot;text-align: center;&quot;&gt;Slog2 和 Slog3 的区别&lt;br&gt;&lt;/p&gt;&lt;p&gt;两个都是大幅度提升整体动态范围为后期调色增大空间，暗部呈现更多细节，一定程度的高光过曝可以拉回来。log3更先进动态范围更大，原始素材更灰对比度更低，因此对后期的要求也更高。&lt;/p&gt;&lt;p&gt;（本次拍摄在光线不足的地下车库拍摄，所以用的是Slog2，可更好地控制噪点）&lt;/p&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;/section&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-21 23:30:00');

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '名称',
  `pic` varchar(50) NOT NULL COMMENT '封面',
  `addtime` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='频道分类表';

INSERT INTO `category` (`id`, `name`, `pic`, `addtime`) VALUES
(1, 'HTML5', 'image/5ab90c864d15f.png', '2018-03-26 23:06:46'),
(2, 'JS', 'image/5ab90ca0d3b52.png', '2018-03-26 23:07:12'),
(3, 'JAVA', 'image/5ab90cb584dba.png', '2018-03-26 23:07:33'),
(4, 'Android', 'image/5ab90ccf3be6b.png', '2018-03-26 23:07:59'),
(5, 'iOS', 'image/5ab90cebe192f.png', '2018-03-26 23:08:27');

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `content` varchar(100) NOT NULL COMMENT '内容',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `starcount` int(11) NOT NULL COMMENT '点赞数',
  `addtime` datetime NOT NULL COMMENT '发布时间'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='评论';

INSERT INTO `comment` (`id`, `uid`, `rid`, `content`, `type`, `starcount`, `addtime`) VALUES
(1, 1, 1, '做的不错！', 'Movie', 0, '2018-03-18 22:49:33'),
(2, 1, 4, '创意不错！', 'Movie', 0, '2018-03-22 07:10:19'),
(3, 1, 1, '&lt;p&gt;fds;kf;lkf;lsfkls;fk&lt;/p&gt;', 'Forum', 0, '2018-03-24 10:23:45'),
(4, 1, 1, '&lt;p&gt;sdjsljdflskfjsdk&lt;/p&gt;', 'Forum', 0, '2018-03-24 10:23:55');

CREATE TABLE IF NOT EXISTS `favor` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `addtime` datetime NOT NULL COMMENT '更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='喜欢';

INSERT INTO `favor` (`id`, `rid`, `uid`, `type`, `addtime`) VALUES
(1, 1, 1, 'Movie', '2018-03-18 23:38:23'),
(2, 2, 2, 'Movie', '2018-03-22 07:02:35'),
(3, 3, 2, 'Movie', '2018-03-22 07:05:15'),
(4, 4, 1, 'Movie', '2018-03-22 07:06:59'),
(5, 5, 1, 'Movie', '2018-03-22 07:13:37');

CREATE TABLE IF NOT EXISTS `forum` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `poster` varchar(50) NOT NULL COMMENT '题图',
  `summary` varchar(100) NOT NULL COMMENT '简介',
  `detail` text NOT NULL COMMENT '正文',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='文章';

INSERT INTO `forum` (`id`, `uid`, `title`, `poster`, `summary`, `detail`, `addtime`) VALUES
(1, 1, '重中之重', '', '', '&lt;p&gt;在谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢谢&lt;/p&gt;', '2018-03-24 07:28:54');

CREATE TABLE IF NOT EXISTS `movie` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='视频';

INSERT INTO `movie` (`id`, `uid`, `name`, `typeid`, `pic`, `description`, `videosource`, `content`, `pass`, `addtime`) VALUES
(3, 2, 'Java并发编程与高并发解决方案', 3, 'image/5ab90e2a47aa8.jpg', '带你构建完整的并发与高并发知识体系', 'video/5ab736d13b4e4.mp4', '&lt;p&gt;【并发编程与高并发难题我们一起攻克】本课程将结合大量图示及代码演示，让你更容易， 更系统的掌握多线程并发编程（线程安全，线程调度，线程封闭，同步容器等）与高并发处理思路与手段（扩容，缓存，队列，拆分等）相关知识和经验。帮助你构建完整的并发与高并发知识体系，胜任实际开发中并发与高并发问题的处理，倍增高薪面试成功率！&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-26 23:13:46'),
(5, 2, 'PHP从基础语法到原生项目开发', 2, 'image/5ab90f386e04b.jpg', '全网独家PHP实际案例课程合辑，掌握基础语法就能上手主流开发语言。', 'video/5ab7304f68ef8.mp4', '&lt;p&gt;您的PHP&amp;nbsp;pro已上线，\r\n&lt;/p&gt;&lt;p&gt;TA可能是世界上最好的语言？\r\n&lt;/p&gt;&lt;p&gt;最酷的攻城狮，从查看对方资料开始\r\n&lt;/p&gt;&lt;p&gt;PHP作为一种通用开源脚本语言，已入选全球五大最受欢迎的编程语言，是唯一入选的脚本语言。2016年全球5000万互联网网站中，有60%以上使用着PHP技术，国内80%以上的动态网站都在使用PHP开发。2011年PHP从业人数新增42%，PHP程序员和招聘岗位的供求比例是1：40。\r\n&lt;/p&gt;&lt;p&gt;最牛的攻城狮，从实际经验入手规划\r\n&lt;/p&gt;&lt;p&gt;PHP具备成熟的开源代码及模板，主要用于API接口开发，后台系统管理和web动态网站开发，比如搜狐，新浪，Facebook，谷歌，百度，淘宝，大众点评，京东，糯米等等\r\n&lt;/p&gt;&lt;p&gt;最hin的攻城狮，以确立目标为终极导向\r\n&lt;/p&gt;&lt;p&gt;据前程无忧网发布的调查报告，PHP软件开发是未来几年最热门和最受欢迎的职业之一，具有10年工作经验的高级PHP工程师年薪在三十万元左右。初级的PHP软件开发人员，平均月薪8000-10000元，中高级的PHP工程师平均月薪超过15000元。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-26 23:18:16'),
(6, 1, 'HTML+CSS基础课程', 1, 'image/5ab9101cc0499.jpg', 'HTML+CSS基础教程8小时带领大家步步深入学习标签用法和意义', 'video/5ab6efb61e096.mp4', '&lt;p&gt;本课程从最基本的概念开始讲起，步步深入，带领大家学习HTML、CSS样式基础知识，了解各种常用标签的意义以及基本用法，后半部分教程主要讲解CSS样式代码添加，为后面的案例课程打下基础。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-26 23:22:04'),
(7, 2, 'Android常用异常集及解决方案', 4, 'image/5ab90f9a824f3.jpg', '介绍Android常用异常集及常用的几种解决方案', 'video/5ab739498c13e.mp4', '&lt;p&gt;简介：介绍Android常见异常的种类及常见发生场景，如何高效的调试，异常捕获，错误日志上报等等&lt;/p&gt;&lt;p&gt;&amp;nbsp;第1章&amp;nbsp;常用异常集及解决方案-课程介绍&amp;nbsp;\r\n&lt;/p&gt;&lt;p&gt;&amp;nbsp;第2章&amp;nbsp;Android常见异常&amp;nbsp;\r\n&lt;/p&gt;&lt;p&gt;&amp;nbsp;第3章&amp;nbsp;如何高效的Debug&amp;nbsp;\r\n&lt;/p&gt;&lt;p&gt;&amp;nbsp;第4章&amp;nbsp;具体案例具体分析&amp;nbsp;\r\n&lt;/p&gt;&lt;p&gt;&amp;nbsp;第5章&amp;nbsp;Android全局异常捕获处理（升级篇）&amp;nbsp;\r\n&lt;/p&gt;&lt;p&gt;&amp;nbsp;第6章&amp;nbsp;Android错误日志的上报&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-26 23:19:54'),
(8, 1, 'iOS 基础之搞定多线程', 5, 'image/5ab91089aaa19.jpg', 'ios基础教程介绍多线程的四种实现技术方案，搞定多线程，让程序高效执行', 'video/5ab739498c13f.mp4', '&lt;p&gt;简介：本课程是iOS基础之搞定多线程，主要针对多线程的基础知识。目前开发过程中多线程是必不可少的，占据着重要的地位。如果想提高程序的执行效率，就必须掌握多线程。本门课程将重点介绍多线程的四种实现技术方案，分别是pThread，NSThread，GCD和NSOperation。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 1, '2018-03-26 23:23:53');

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `title` varchar(20) NOT NULL COMMENT '标题',
  `pic` varchar(50) NOT NULL COMMENT '首图',
  `description` varchar(100) NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '内容',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='新闻（公告+活动）';

INSERT INTO `news` (`id`, `uid`, `title`, `pic`, `description`, `content`, `addtime`) VALUES
(1, 1, ' 电影《毕业作品》曝先导预告片', 'image/5ab76c50a9af3.jpg', '', '&lt;p&gt;今日，由张一山、丁丁领衔主演的爱情电影《毕业作品》曝光了先导预告片，一场关于爱和冒险的毕业旅行，即将于4月13日毕业季之际登上大银幕，与观众见面。预告片中张一山为了帮女友丁丁完成毕业作品而登上孤岛，原以为是一场充满浪漫的爱情之旅，结果却是惊心动魄。陌生的同行之人、怪异的孤岛村民、熊熊燃烧的大火······岛上发生的种种，都将这场旅行变得极不平凡。&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790653711n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;　　《毕业作品》讲述了警校毕业生殷浩(张一山饰)与女友小暖(丁丁饰)为了拍摄毕业作品，登上了一座与世隔绝的孤岛，一场充满期待的爱情之旅却陷入了30年前的神秘大火案中，一件件波谲云诡的事件发生，让整个毕业之旅开始变得与众不同。通过预告片，我们看到张一山饰演的殷浩时而青春活泼、时而沉思案情、时而爱意绵绵，在这几种情绪之间互相切换时，张一山的表演都非常精准。&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790654181n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;　　《毕业作品》将于4月13日登陆全国院线，电影中，张一山饰演的殷浩与丁丁饰演的小暖为了拍摄毕业作品登上了孤岛。而在此时，相信很多学生也在为自己的毕业作品绞尽脑汁，无论是论文还是社会实践，相信每个人的毕业作品都会有着属于自己的特殊烙印。而在毕业季到来之际，张一山携手丁丁也为观众献上了一份与众不同的毕业作品。&lt;/p&gt;&lt;p&gt;&lt;/p&gt;&lt;center&gt;&lt;img src=&quot;http://ent.news.cn/2018-03/22/1122573026_15216790654491n.jpg&quot;&gt;&lt;/center&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-25 17:30:56'),
(2, 1, '《黑豹》成美国票房最高超级英雄电影', 'image/5ab76d0e44bb7.jpg', '超越《复联》', '&lt;p&gt;尽管已经上映了一个多月的时间，但漫威超级英雄电影《黑豹》的票房走势依然强劲。这周六，《黑豹》的北美票房正式达到6.3亿美元，超过了《复仇者联盟》在2012年的6.234亿美元票房，成为美国票房最高的超级英雄电影。&lt;/p&gt;&lt;p align=&quot;center&quot; style=&quot;text-align: center;&quot;&gt;&lt;img alt=&quot;游民星空&quot; src=&quot;http://img1.gamersky.com/image2018/03/20180325_wyc_246_1/gamersky_02small_04_2018325921156.jpg&quot; class=&quot;&quot;&gt;&lt;/p&gt;&lt;p&gt;　　此外，《黑豹》目前还成为了第七部北美票房收入超过6亿美元的电影，排名其中第六的位置。值得一提的是，这部电影的制作成本为2亿美元，堪称MCU最赚钱的电影之一。&lt;/p&gt;&lt;p&gt;　　在全球市场上，《黑豹》取得了超过12亿美元的票房成绩，预计这周末结束它将正式超过漫威《钢铁侠3》的12.14亿美元票房成绩。而排在它之前的还有《复仇者联盟》（全球15亿美元票房）与《复仇者联盟2：奥创纪元》（全球14亿美元票房）。而在《复联3》和《复联4》中，黑豹还将继续担当重要英雄角色出现。&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '2018-03-25 17:34:06');

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL COMMENT '图片地址',
  `url` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `slideshow` (`id`, `img`, `url`) VALUES
(7, 'image/5ab913467144b.jpg', 'home/movie/detail?id=8'),
(8, 'image/5ab913690b1ea.jpg', 'home/movie/detail?id=6'),
(9, 'image/5ab913a5983e9.jpg', 'home/movie/detail?id=5');

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '密码',
  `img` varchar(50) NOT NULL COMMENT '头像',
  `addtime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';

INSERT INTO `user` (`id`, `username`, `password`, `img`, `addtime`) VALUES
(0, 'admin', '', '', '2018-03-20 00:00:00'),
(1, '123', '123', 'image/5aac76c83e06c.jpg', '2018-03-17 10:00:40'),
(2, '345', '345', 'image/5ab2de2129ac0.jpg', '2018-03-22 06:35:13');

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL COMMENT '资源ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `type` varchar(10) NOT NULL COMMENT '类型',
  `num` int(11) NOT NULL COMMENT '分值',
  `addtime` datetime NOT NULL COMMENT '发布时间'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='评分表';

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
ALTER TABLE `favor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
