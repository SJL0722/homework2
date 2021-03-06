<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>视频学习网::我的微空间</title>
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
    <div class="container ">
        <div class="row clearfix margin1">
            <div class="col-xs-12 column">
                <legend class="text-center">我的主页</legend>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-sm-4 column">
                <!-- 表单名称 -->

                <div class="panel panel-default">
                    <div class="panel-content padding1">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img class="media-object img-circle" src="/aiyingshi/Public/<?php echo (session('uimg')); ?>" width="64px" alt="<?php echo (session('username')); ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading"><?php echo (session('username')); ?></h3>
                                <a href="/aiyingshi/Home/Form/manage" class="btn btn-info btn-block">修改个人信息</a>
                                <a href="/aiyingshi/Home/Form/movie_add" class="btn btn-igreen btn-block">提交新素材</a>
                                <a href="/aiyingshi/Home/Form/forum_add" class="btn btn-igreen btn-block">发表新帖子</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 column">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" <?php if(($id) == "1"): ?>class="active"<?php endif; ?>>
                        <a href="/aiyingshi/Home/Form/ucenter">我的素材</a>
                    </li>
                    <li role="presentation" <?php if(($id) == "2"): ?>class="active"<?php endif; ?>>
                        <a href="/aiyingshi/Home/Form/ucenter?id=2">我的收藏</a>
                    </li>
                    <li role="presentation" <?php if(($id) == "4"): ?>class="active"<?php endif; ?>>
                        <a href="/aiyingshi/Home/Form/ucenter?id=4">我的帖子</a>
                    </li>
                    <li role="presentation" <?php if(($id) == "3"): ?>class="active"<?php endif; ?>>
                        <a href="/aiyingshi/Home/Form/ucenter?id=3">我的评论</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="list">
                        <div class="panel panel-default">
                            <!-- List group -->
                            <div class="list-group">
                                <?php switch($id): case "2": ?><!-- 收藏列表 -->
                                        <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="list-group-item">
                                                <div class="row clearfix">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["mpic"]); ?>" />
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["mid"]); ?>" title="查看">
                                                            <h3 class="media-heading"><?php echo ($item["mname"]); ?></h3>
                                                        </a>

                                                        <br />
                                                        <a href="/aiyingshi/Home/Form/fdelete?id=<?php echo ($item["id"]); ?>" class="btn btn-danger">取消收藏</a>
                                                    </div>
                                                </div>
                                            </div><?php endforeach; endif; else: echo "$empty" ;endif; break;?>
                                    <?php case "4": ?><!-- 帖子列表 -->
                                        <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="list-group-item">
                                                <div class="row clearfix">
                                                    <div class="col-sm-8">
                                                        <a href="/aiyingshi/home/forum/detail?id=<?php echo ($item["id"]); ?>" title="查看">
                                                            <h3 class="media-heading"><?php echo ($item["title"]); ?></h3>
                                                        </a>

                                                        <br />
                                                        <a href="/aiyingshi/Home/Form/forum_change?id=<?php echo ($item["id"]); ?>" class="btn btn-igreen">修改</a>
                                                        <a href="/aiyingshi/Home/Form/forum_delete?id=<?php echo ($item["id"]); ?>" class="btn btn-danger">删除</a>
                                                    </div>
                                                </div>
                                            </div><?php endforeach; endif; else: echo "$empty" ;endif; break;?>
                                    <?php case "3": ?><!-- 评论列表 -->
                                        <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><blockquote>
                                                <p><?php echo ($item["content"]); ?></p>
                                                <footer><?php echo ($item["uname"]); ?> 于
                                                    <a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["mid"]); ?>">
                                                        <cite title="<?php echo ($item["mname"]); ?>"><?php echo ($item["mname"]); ?></cite>
                                                    </a>
                                                </footer>
                                            </blockquote>
                                            <a href="/aiyingshi/Home/Form/cdelete?id=<?php echo ($item["id"]); ?>" class="btn btn-success btn-block">删除</a><?php endforeach; endif; else: echo "$empty" ;endif; break;?>
                                    <?php default: ?>
                                    <!-- 稿件列表 -->
                                    <?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['pass']) == "0"): ?><!-- 审核中 -->
                                            <div class="list-group-item">
                                                <div class="row clearfix">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <a href="/aiyingshi/home/form/movie_preview?id=<?php echo ($item["id"]); ?>" title="预览">
                                                            <h3 class="media-heading">
                                                                <span class="label label-info">审核中</span><?php echo ($item["name"]); ?></h3>
                                                        </a>
                                                        <?php if(empty($item['description'])): echo (msubstr(htmlspecialchars($item["content"]),0,30,'utf-8',false)); ?>
                                                            <?php else: ?> <?php echo ($item["description"]); endif; ?>
                                                        <br />
                                                        <a href="/aiyingshi/Home/Form/movie_change?id=<?php echo ($item["id"]); ?>" class="btn btn-primary">修改</a>
                                                        <a href="/aiyingshi/Home/Form/movie_delete?id=<?php echo ($item["id"]); ?>" class="btn btn-danger">删除</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php else: ?>
                                            <!-- 已发布 -->

                                            <div class="list-group-item">
                                                <div class="row clearfix">
                                                    <div class="col-sm-4">
                                                        <img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["id"]); ?>" title="查看">
                                                            <h3 class="media-heading">
                                                                <span class="label label-primary">已发布</span><?php echo ($item["name"]); ?></h3>
                                                        </a>
                                                        <?php if(empty($item['description'])): echo (msubstr(htmlspecialchars($item["content"]),0,30,'utf-8',false)); ?>
                                                            <?php else: ?> <?php echo ($item["description"]); endif; ?>
                                                        <br />
                                                        <a href="/aiyingshi/Home/Form/movie_change?id=<?php echo ($item["id"]); ?>" class="btn btn-primary">修改</a>
                                                        <a href="/aiyingshi/Home/Form/movie_delete?id=<?php echo ($item["id"]); ?>" class="btn btn-danger">删除</a>
                                                    </div>
                                                </div>
                                            </div><?php endif; endforeach; endif; else: echo "$empty" ;endif; endswitch;?>
                            </div>
                            <?php if(empty($page)): else: ?>
                                <div class="panel-footer">
                                    <div class="pages">
                                        <?php echo ($page); ?>
                                    </div>
                                </div><?php endif; ?>
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