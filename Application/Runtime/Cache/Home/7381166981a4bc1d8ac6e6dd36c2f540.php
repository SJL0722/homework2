<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
	<title>视频学习网登录</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="/aiyingshi/Public/js/jquery.min.js"></script>
	<script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
	<link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
	<link href="/aiyingshi/Public/css/animate.min.css" rel="stylesheet">
	<link href="/aiyingshi/Public/css/style.css" rel="stylesheet">
</head>

<body class="content loginbg">

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
			<div class="row-sm-height">
				<div class="col-sm-6 col-sm-height col-sm-middle">

				</div>
				<div class="col-sm-6 col-sm-height col-sm-middle mt30-xs">
					<div class="panel panel-default margin1">
						<div class="panel-heading">
							<h3 class="panel-title">登录</h3>
						</div>
						<div class="panel-content padding1">
							<form class="form-horizontal margin4" method="post" action="/aiyingshi/Home/Form/login_process" autocomplete="off">
								<fieldset>
									<!-- 文本框-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="user">用户名</label>
										<div class="col-md-6">
											<input name="user" type="text" placeholder="" class="form-control input-md" required="">
										</div>
									</div>

									<!-- 文本框-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="password">密码</label>
										<div class="col-md-6">
											<input name="password" type="password" placeholder="" class="form-control input-md" required="">
										</div>
									</div>

									<!--验证码-->
									<div class="form-group">
										<label class="col-md-4 control-label" for="textinput">验证码</label>
										<div>
											<div class="col-md-3 col-xs-6">
												<input name="verify" type="text" placeholder="验证码" class="form-control input-lg" required="">
											</div>
											<div class="col-md-3 col-xs-6" id="captcha-container">
												<img height="46px" alt="验证码" src="<?php echo U('Home/Form/verify_c',array());?>" title="点击刷新">
											</div>
										</div>
									</div>

									<!-- 按钮 -->
									<div class="form-group">
										<label class="col-md-4 control-label" for="singlebutton"></label>
										<div class="col-md-6">
											<input type="submit" value="登录" class="btn btn-block btn-lg btn-submit" style="background-color:#444;color:#ffffff;">
											</button>
											<h6 align="right">
												<a href="/aiyingshi/home/form/register" style="color:#444;">&nbsp;&nbsp;免费注册</a>
											</h6>
										</div>
									</div>

								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var captcha_img = $('#captcha-container').find('img')
		var verifyimg = captcha_img.attr("src");
		captcha_img.attr('title', '点击刷新');
		captcha_img.click(function () {
			if (verifyimg.indexOf('?') > 0) {
				$(this).attr("src", verifyimg + '&random=' + Math.random());
			} else {
				$(this).attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
			}
		});
	</script>
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