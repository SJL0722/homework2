<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>分类</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/animate.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/style.css" rel="stylesheet">
</head>

<body class="content">

    <!-- 导航区 -->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                aria-controls="navbar">
                <span class="sr-only">跳至内容区</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/aiyingshi/Home/index">视频学习网</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/aiyingshi/Home/index">首页</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/movie">分类</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/article">经验分享</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/news">新闻</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/forum">论坛</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(!isset($_SESSION['username'])): ?><li>
                        <a href="/aiyingshi/Home/Form/login">登录</a>
                    </li>
                    <li>
                        <a href="/aiyingshi/Home/Form/register">注册</a>
                    </li>
                <?php else: ?>
                    <li class="uinfo">
                        <a href="/aiyingshi/Home/Form/ucenter" title="点此进入微空间"><img alt="<?php echo (session('username')); ?>" class="img-circle" width="32px" src="/aiyingshi/Public/<?php echo (session('uimg')); ?>"> <?php echo (session('username')); ?></a>
                    </li>
                    <li>
                        <a href="/aiyingshi/Home/Form/logout">退出</a>
                    </li><?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 column">
                <div class="page-header">
                    <h3>
                        分类列表
                        <small>浏览优秀课程</small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row clearfix">


            <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="col-xs-6 col-sm-4">
                    <div class="thumbnail padding1">
                        <a href="/aiyingshi/Home/movie/section?id=<?php echo ($item["id"]); ?>"> <img src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" alt="<?php echo ($item["name"]); ?>"/>
                        </a>
                        <div class="caption text-center">
                            <h3>
                                <a href="/aiyingshi/Home/movie/section?id=<?php echo ($item["id"]); ?>">
                                    <?php echo ($item["name"]); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 channel-list-item">
                    <a href="/aiyingshi/Home/movie/section?id=<?php echo ($item["id"]); ?>" class="channel-arrow">
                        <span class="glyphicon glyphicon-menu-right"></span>
                    </a>
                    <a href="/aiyingshi/Home/movie/section?id=<?php echo ($item["id"]); ?>" class="channel-img">
                        <img src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" alt="<?php echo ($item["name"]); ?>">
                        <div class="channel-name-warp">
                            <span class="channel-name"><?php echo ($item["name"]); ?></span>
                        </div>
                    </a>
                </div> --><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </div>
    </div>
    <!-- 页尾 -->
<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3>视频学习网</h3> 
				<p>创办于2008年，是目前国内知名的影视技巧交流平台。<br></p>
			</div>
			<div class="col-md-4">
				<h3>导航</h3>
				<div class="row">
					<div class="col-xs-6">
							<p><a href="/aiyingshi/">首页</a></p>
							<p><a href="/aiyingshi/Home/movie">分类</a></p>
					</div>
					<div class="col-xs-6">
							<p><a href="/aiyingshi/Home/article">经验分享</a></p>
							<p><a href="/aiyingshi/Home/news">新闻</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<h3>联系我们</h3>
				<p><a>中山路194号</a></p>
				<p><a>电话：45243554</a></p> 
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> 
				<p>© 视频学习网 2018.</p> 
			</div>
		</div>
	</div>
</section>
<script src="/aiyingshi/Public/js/activef.min.js"></script>
</body>

</html>