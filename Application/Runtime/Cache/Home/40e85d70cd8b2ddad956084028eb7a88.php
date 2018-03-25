<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title><?php echo ($alist["title"]); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/animate.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/wangEditor.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/style.css" rel="stylesheet">
    <script type="text/javascript" src='/aiyingshi/Public/js/wangEditor.min.js'></script>
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

    <div class="container">
        <div class="row clearfix">
            <div class="col-xs-12 column">
                <div class="panel panel-default">
                    <div class="panel-content padding1">
                        <div class="meta pull-right">
                            <span class="glyphicon glyphicon-comment"></span> <?php echo ($ccount); ?></div>
                        <h3 class="page-title no-margin"><?php echo ($alist["title"]); ?></h3>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-content padding1">
                        <div class="row clearfix">
                            <div class="col-sm-4 col-md-3 column blist-container">
                                <div class="meta pull-right visible-xs">#1</div>
                                <ul class="meta blist list-unstyled">
                                    <li>
                                        <img alt="<?php echo ($mlist["uname"]); ?>" class="img-circle" src="/aiyingshi/Public/<?php echo ($alist["uimg"]); ?>"> </li>
                                    <li><?php echo ($alist["uname"]); ?></li>
                                    <li><?php echo ($alist["addtime"]); ?></li>
                                </ul>
                            </div>
                            <div class="col-sm-8 col-md-9 column">
                                    <div class="meta pull-right hidden-xs">#1</div>
                                <div>
                                    <div class="wangEditor-txt">
                                        <?php echo (stripslashes(htmlspecialchars_decode($alist["detail"]))); ?>
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
            <!-- 跟帖 -->
            <?php if(empty($comment)): else: ?>
                <?php if(is_array($comment)): $k = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$clist): $mod = ($k % 2 );++$k;?><div class="panel panel-default">
                        <div class="panel-content padding1">
                            <div class="row clearfix">
                                <div class="col-sm-4 col-md-3 column blist-container">
                                    <div class="meta pull-right visible-xs">#<?php echo ($k+1); ?></div>
                                    <ul class="meta blist list-unstyled">
                                        <li>
                                            <img alt="<?php echo ($clist["uname"]); ?>" class="img-circle" src="/aiyingshi/Public/<?php echo ($clist["uimg"]); ?>"> </li>
                                        <li><?php echo ($clist["uname"]); ?></li>
                                        <li><?php echo ($clist["addtime"]); ?></li>
                                    </ul>
                                </div>
                                <div class="col-sm-8 col-md-9 column">
                                    <div class="meta pull-right hidden-xs">#<?php echo ($k+1); ?></div>
                                    <div>
                                        <div class="wangEditor-txt">
                                            <?php echo (stripslashes(htmlspecialchars_decode($clist["content"]))); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "$empty" ;endif; endif; ?>

            <div class="panel panel-default">
                <?php if(isset($_SESSION['username'])): ?><form class="form-horizontal" method="POST" action="/aiyingshi/home/form/addcomment">
                        <fieldset>
                            <div class="panel-heading">
                                <h3 class="panel-title">发表回复</h3>
                            </div>
                            <div class="panel-content padding1">
                                <input type="hidden" id="rid" class="form-control" name="rid" value="<?php echo ($_GET['id']); ?>">

                                <input type="hidden" id="type" class="form-control" name="type" value="<?php echo (CONTROLLER_NAME); ?>">

                                <input type="hidden" id="uid" class="form-control" name="uid" value="<?php echo (session('uid')); ?>">

                                <div class="row clearfix">
                                    <div class="col-sm-4 col-md-3 column blist-container">
                                        <ul class="meta blist list-unstyled">
                                            <li>
                                                <img alt="<?php echo (session('username')); ?>" class="img-circle" src="/aiyingshi/Public/<?php echo (session('uimg')); ?>"> </li>
                                            <li><?php echo (session('username')); ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-8 col-md-9 column">
                                        <textarea class="form-control" rows="10" id="content" name="content" placeholder="愿您的每句评论，都能给大家的生活填色彩..." required></textarea>
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
    <script type="text/javascript">
        $(function () {
          var editor = new wangEditor('content');
          editor.config.menus = [
            'source',
            '|', // '|' 是菜单组的分割线
            'bold',
            'underline',
            'italic',
            'strikethrough',
            'eraser',
            'forecolor',
            'quote',
            'fontfamily',
            'fontsize',
            'head',
            'unorderlist',
            'orderlist',
            'alignleft',
            'aligncenter',
            'alignright',
            '|',
            'link',
            'unlink',
            'table',
            'img',
            '|',
            'undo',
            'redo',
            'fullscreen'
          ];
          // 配置上传图片接口
          editor.config.uploadImgUrl = '/aiyingshi/Admin/Form/upload';
          editor.config.uploadImgFileName = 'img';
          // 设置 headers（举例）
          editor.config.uploadHeaders = {
            'Accept': 'text/x-json'
          };
          editor.config.emotionsShow = 'value';
          wangEditor.config.printLog = false;
    
          editor.create();
          // 重置按钮被点击时
          $('#reset').on('click', function (e) {
            editor.$txt.html('<p><br></p>');
          });
        });
      </script>
</body>
</html>