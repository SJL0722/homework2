<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>爱影视::预览素材</title>
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
            <a class="navbar-brand" href="/aiyingshi/Home/index">爱影视</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/aiyingshi/Home/index">首页</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/movie">频道</a>
                </li>
                <li>
                    <a href="/aiyingshi/Home/article">影评</a>
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
    <div class="container ">
        <div class="row clearfix margin1">
            <div class="col-xs-12 column">
                <legend class="text-center">预览素材：#<?php echo ($mlist["id"]); ?>:<?php echo ($mlist["name"]); ?></legend>
                <div class="panel panel-default">
                    <div class="panel-content padding1">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php if(empty($mlist['videosource'])): if(empty($mlist['pic'])): ?><iframe class="embed-responsive-item" src="" style="background-color:aliceblue;" frameborder="0" allowfullscreen="true">
                                    <p class="text-center">暂无视频</p>
                                </iframe>
                                    <?php else: ?>
                                    <img src="/aiyingshi/Public/<?php echo ($mlist["pic"]); ?>" class="img-responsive center-block"><?php endif; ?>
                                
                                <?php else: ?>
                                <?php if(empty($mlist['pic'])): ?><video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto"></video>
                                    <?php else: ?>
                                    <video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto" poster="/aiyingshi/Public/<?php echo ($mlist["pic"]); ?>"></video><?php endif; endif; ?>
                        </div>
                        <?php if(empty($mlist['description'])): else: ?>
                            <blockquote>
                                <p><?php echo ($mlist["description"]); ?></p>
                            </blockquote><?php endif; ?>
                        <div class="wangEditor-container">
                            <div class="wangEditor-txt">
                                <?php echo (stripslashes(htmlspecialchars_decode($mlist["content"]))); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 页尾 -->
<section class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3>爱影视</h3> 
				<p>创办于2008年，是目前国内知名的影视技巧交流平台。<br></p>
			</div>
			<div class="col-md-4">
				<h3>导航</h3>
				<div class="row">
					<div class="col-xs-6">
							<p><a href="/aiyingshi/">首页</a></p>
							<p><a href="/aiyingshi/Home/movie">频道</a></p>
					</div>
					<div class="col-xs-6">
							<p><a href="/aiyingshi/Home/article">影评</a></p>
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
				<p>© 爱影视 2018.</p> 
			</div>
		</div>
	</div>
</section>
<script src="/aiyingshi/Public/js/activef.min.js"></script>
</body>

</html>