<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<title>视频学习网::主页</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/aiyingshi/Public/js/jquery.min.js"></script>
	<script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
	<link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/aiyingshi/Public/css/animate.min.css" rel="stylesheet">
	<link href="/aiyingshi/Public/css/style.css" rel="stylesheet">
</head>

<body>
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
	<!-- Carousel
		================================================== -->
	<?php if(empty($focus)): else: ?>
		<section id="carousel">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k; if(($k) == "1"): ?><li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<?php else: ?>
							<li data-target="#myCarousel" data-slide-to="<?php echo ($k-1); ?>"></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php if(is_array($focus)): $k = 0; $__LIST__ = $focus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k; if(($k) == "1"): ?><div class="item active">
								<a href="/aiyingshi/<?php echo ($item["url"]); ?>">
									<img alt="" src="/aiyingshi/Public/<?php echo ($item["img"]); ?>" />
								</a>
							</div>
							<?php else: ?>
							<div class="item">
								<a href="/aiyingshi/<?php echo ($item["url"]); ?>">
									<img alt="" src="/aiyingshi/Public/<?php echo ($item["img"]); ?>" />
								</a>
							</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</section><?php endif; ?>

	<section id="news">
		<div class="container">
			<div class="row clearfix">
				<div class="col-md-8">
					<div>

						<!-- Nav tabs -->
						<ul class="nav nav-tabs nav-justified" role="tablist">
							<li role="presentation" <?php if(($id) == "1"): ?>class="active"<?php endif; ?>>
								<a href="/aiyingshi/">最新推荐</a>
							</li>
							<li role="presentation" <?php if(($id) == "2"): ?>class="active"<?php endif; ?>>
								<a href="/aiyingshi/?id=2">热门排行</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="list">
								<div class="panel panel-default">
									<!-- List group -->
									<div class="list-group">
										<?php if(is_array($mlist)): $i = 0; $__LIST__ = $mlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="list-group-item">
												<div class="row clearfix">
													<div class="col-sm-height col-xs-middle col-sm-4">
														<img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
													</div>
													<div class="col-sm-height  col-xs-top col-sm-8">
														<a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["id"]); ?>" title="查看">
															<h3 class="media-heading">
																<?php echo ($item["name"]); ?></h4>
														</a>
														<p class="text-star">
															<span class="text-muted">作者：
																<b><?php echo ($item["uname"]); ?></b>
															</span>
														</p>

														<?php if(empty($item['description'])): echo (msubstr(htmlspecialchars($item["content"]),0,30,'utf-8',false)); ?>
															<?php else: ?> <?php echo ($item["description"]); endif; ?>
														<div class="index-like clearfix">
															<span class="time"><?php echo ($item["addtime"]); ?></span>
															<span class="like pull-right">
																<span class="glyphicon glyphicon-heart"></span> <?php echo ($item["hcount"]); ?></span>
														</div>
													</div>
												</div>
											</div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
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
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">精彩视频</h3>
						</div>
						<!-- List group -->
						<div class="list-group">
							<?php if(is_array($rmlist)): $i = 0; $__LIST__ = $rmlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="list-group-item">
									<div class="row clearfix">
										<div class="col-xs-12">
											<img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
										</div>
										<div class="col-xs-12">
											<a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["id"]); ?>" title="查看">
												<h3 class="media-heading">
													<?php echo ($item["name"]); ?></h4>
											</a>
											<p class="text-star">
												<span class="text-muted">作者：
													<b><?php echo ($item["uname"]); ?></b>
												</span>
											</p>

											<?php if(empty($item['description'])): echo (msubstr(htmlspecialchars($item["content"]),0,30,'utf-8',false)); ?>
												<?php else: ?> <?php echo ($item["description"]); endif; ?>
											<div class="index-like-block clearfix">
												<span class="time"><?php echo ($item["addtime"]); ?></span>
												<span class="like pull-right">
													<span class="glyphicon glyphicon-heart"></span> <?php echo ($item["hcount"]); ?></span>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">最新公告</h3>
						</div>
						<!-- List group -->
						<div class="list-group">
							<?php if(is_array($rnlist)): $i = 0; $__LIST__ = $rnlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="list-group-item">
									<div class="row clearfix">
										<div class="col-xs-12">
											<img class="img-responsive center-block" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
										</div>
										<div class="col-xs-12">
											<a href="/aiyingshi/home/news/detail?id=<?php echo ($item["id"]); ?>" title="查看">
												<h3 class="media-heading">
													<?php echo ($item["title"]); ?></h4>
											</a>
											<?php if(empty($item['description'])): echo (msubstr(htmlspecialchars($item["content"]),0,30,'utf-8',false)); ?>
												<?php else: ?> <?php echo ($item["description"]); endif; ?>
											<div class="index-like-block clearfix">
												<span class="time"><?php echo ($item["addtime"]); ?></span>
											</div>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">热门评论</h3>
						</div>
						<div class="panel-body">
							<div class="list-group">
								<?php if(is_array($rclist)): $i = 0; $__LIST__ = $rclist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><blockquote>
										<p><?php echo ($item["content"]); ?></p>
										<footer><?php echo ($item["uname"]); ?> 于
											<a href="/aiyingshi/home/movie/detail?id=<?php echo ($item["mid"]); ?>">
												<cite title="<?php echo ($item["mname"]); ?>"><?php echo ($item["mname"]); ?></cite>
											</a>
										</footer>
									</blockquote><?php endforeach; endif; else: echo "$empty" ;endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

	</section>


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

	<script>
		// Highlight the top nav as scrolling occurs
		$('body').scrollspy({
			target: '.navbar-fixed-top',
			offset: 51
		});

		// Closes the Responsive Menu on Menu Item Click
		$('.navbar-collapse ul li a').click(function () {
			$('.navbar-toggle:visible').click();
		});

	</script>

</body>

</html>