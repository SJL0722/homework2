<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title><?php echo ($mlist["name"]); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>

    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
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
    <div class="container-fluid dark">
        <div class="container">
            <div class="row clearfix">
                <div class="">
                    <div class="panel panel-default margin1">
                        <div class="panel-content padding1">
                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <?php if(empty($mlist['videosource'])): ?><iframe class="embed-responsive-item" src="" style="background-color:aliceblue;" frameborder="0" allowfullscreen="true">
                                                <p class="text-center">暂无视频</p>
                                            </iframe>
                                            <?php else: ?>
                                            <?php if(empty($mlist['pic'])): ?><video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto"></video>
                                                <?php else: ?>
                                                <video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto" poster="/aiyingshi/Public/<?php echo ($mlist["pic"]); ?>"></video><?php endif; endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-4 hidden-xs hidden-sm margin1">
                                    <?php if(empty($mlist['description'])): else: ?>
                                        <blockquote>
                                            <p><?php echo ($mlist["description"]); ?></p>
                                        </blockquote><?php endif; ?>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <h3 class="page-title"><?php echo ($mlist["name"]); ?></h3>
                                    <ul class="list-inline meta">
                                        <li class="uinfo">
                                            <img alt="<?php echo ($mlist["uname"]); ?>" class="img-circle" width="32px" src="/aiyingshi/Public/<?php echo ($mlist["uimg"]); ?>"> <?php echo ($mlist["uname"]); ?>
                                        </li>
                                        <li>发布于 <?php echo ($mlist["addtime"]); ?></li>
                                        <li>频道： <?php echo ($mlist["cname"]); ?></li>
                                        <li>
                                            <a tabindex="0" class="" role="button" data-toggle="popover" data-trigger="focus" title="" data-html="true" data-content="<?php if(isset($_SESSION['username'])): if(($isvote) > "0"): ?><p class='text-center'>感谢您的参与！</p>
        <?php else: ?>
        <form class='form-horizontal' method='POST' action='/aiyingshi/home/form/addvote'>
            <fieldset>
                <input type='hidden' id='rid' class='form-control' name='rid' value='<?php echo ($_GET['id']); ?>'>
                <input type='hidden' id='type' class='form-control' name='type' value='<?php echo (CONTROLLER_NAME); ?>'>
                <input type='hidden' id='uid' class='form-control' name='uid' value='<?php echo (session('uid')); ?>'>
                <input type='hidden' id='num' class='form-control' name='num' value='1'>
                <input id='singlebutton' type='submit' class='btn btn-success' value='点赞'>
                </div>
            </fieldset>
        </form><?php endif; ?>

    <?php else: ?>
    <p class='text-center'>请登录后进行点赞！</p><?php endif; ?>" data-placement="bottom">
                                                <span class="glyphicon glyphicon-heart"></span>
                                                <?php if(empty($scount)): ?><span class="text-muted">暂无评分</span>
                                                    <?php else: ?>
                                                    <span class="text-muted"><?php echo ($pcount); ?></span><?php endif; ?>
                                            </a>

                                        </li>
                                        <li class="pull-right">
                                            <a tabindex="0" class="" role="button" data-toggle="popover" data-trigger="focus" title="" data-html="true" data-placement="bottom"
                                                data-content="
<?php if(isset($_SESSION['username'])): if(($isfavor) > "0"): ?><p class='text-center'>您已加入收藏！</p>
        <?php else: ?>
        <form class='form-horizontal' method='POST' action='/aiyingshi/home/form/addfavor'>
            <fieldset>
                <input type='hidden' id='rid' class='form-control' name='rid' value='<?php echo ($_GET['id']); ?>'>
                <input type='hidden' id='type' class='form-control' name='type' value='<?php echo (CONTROLLER_NAME); ?>'>
                <input type='hidden' id='uid' class='form-control' name='uid' value='<?php echo (session('uid')); ?>'>
                <input id='singlebutton' type='submit' class='btn btn-success' value='加入收藏'>
            </fieldset>
        </form><?php endif; ?>
    <?php else: ?>
    <p class='text-center'>请登录后进行收藏！</p><?php endif; ?>">+ 加入收藏</a>
                                            <span class="glyphicon glyphicon-comment"></span> <?php echo ($ccount); ?> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 column">
                <div class="panel panel-default margin1">
                    <div class="panel-content padding1">
                        <div class="visible-xs visible-sm">
                            <?php if(empty($mlist['description'])): else: ?>
                                <blockquote>
                                    <p><?php echo ($mlist["description"]); ?></p>
                                </blockquote><?php endif; ?>
                        </div>

                        <div class="wangEditor-container">
                            <div class="wangEditor-txt">
                                <?php echo (stripslashes(htmlspecialchars_decode($mlist["content"]))); ?>
                            </div>
                        </div>

                        <div class="text-center">
                            <a href="/aiyingshi/Home/Movie/moviedl?id=<?php echo ($mlist["id"]); ?>" class="btn btn-igreen">
                                <span class="glyphicon glyphicon-download"></span> 下载视频</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="row clearfix">
        <div class="col-xs-12 column ">
            <!-- 表单名称 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">影片点评</h3>
                </div>
                <div class="panel-content padding1">
                    <?php if(is_array($comment)): $k = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$commentitem): $mod = ($k % 2 );++$k;?><div class="media">
                            <div class="media-left media-center">
                                <img class="media-object img-circle" src="/aiyingshi/Public/<?php echo ($commentitem["uimg"]); ?>" width="32px" alt="<?php echo ($commentitem["uname"]); ?>" title="<?php echo ($commentitem["uname"]); ?>">
                            </div>
                            <div class="media-body">
                                <p class="text-muted"><?php echo ($commentitem["uname"]); ?></p>
                                <p><?php echo ($commentitem["content"]); ?></p>
                                <p class="text-muted"><?php echo ($commentitem["addtime"]); ?></p>
                            </div>
                        </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </div>

                <?php if(isset($_SESSION['username'])): ?><form class="form-horizontal" method="POST" action="/aiyingshi/home/form/addcomment">
                        <fieldset>
                            <div class="panel-content padding1">
                                <input type="hidden" id="rid" class="form-control" name="rid" value="<?php echo ($_GET['id']); ?>">

                                <input type="hidden" id="type" class="form-control" name="type" value="<?php echo (CONTROLLER_NAME); ?>">

                                <input type="hidden" id="uid" class="form-control" name="uid" value="<?php echo (session('uid')); ?>">

                                <div class="media">
                                    <div class="media-left media-center">
                                        <img class="media-object img-circle" src="/aiyingshi/Public/<?php echo (session('uimg')); ?>" width="32px" alt="<?php echo (session('username')); ?>" title="<?php echo (session('username')); ?>">
                                    </div>
                                    <div class="media-body">
                                        <textarea class="form-control" rows="3" name="content" placeholder="愿您的每句评论，都能给大家的生活填色彩..." required></textarea>
                                        <input id="singlebutton" type="submit" class="btn btn-primary margin1 pull-right" value="提交评论">
                                    </div>
                                </div>
                            </div>
            </div>
            </fieldset>
            </form>
            <?php else: ?>
            <p class="text-center">请登录后发表评论！</p><?php endif; ?>

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
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</body>

</html>