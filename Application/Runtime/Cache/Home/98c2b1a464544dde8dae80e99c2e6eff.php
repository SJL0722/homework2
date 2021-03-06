<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>视频学习网::修改素材</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/animate.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/style.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/wangEditor.min.css" rel="stylesheet">
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
                <legend class="text-center">修改素材：#<?php echo ($list["id"]); ?>:<?php echo ($list["name"]); ?></legend>
                <div class="panel panel-default">
                    <div class="panel-content padding1">
                        <!-- form -->
                        <form class="form-horizontal" action="/aiyingshi/home/form/movie_change_process" method="post" enctype="multipart/form-data"
                            autocomplete="off">

                            <!-- 文本框-->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="name">题目</label>
                                <div class="col-md-8">
                                    <input id="id" name="id" type="hidden" value="<?php echo ($list["id"]); ?>" required />
                                    <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo ($list["name"]); ?>" required />
                                </div>
                            </div>

                            <!-- 分类 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="type">所属分类</label>
                                <div class="col-md-8">
                                    <select name="typeid" class="form-control" required>
                                        <?php if(is_array($clist)): $i = 0; $__LIST__ = $clist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item["id"]) == $list["typeid"]): ?><option selected value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- 文件按钮 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="pic">封面(可选)</label>
                                <div class="col-md-8">
                                    <img class="img-responsive img-rounded center-block" width="800px" src="/aiyingshi/Public/<?php echo ($list["pic"]); ?>" />
                                    <span class="help-block">位置：/aiyingshi/Public/<?php echo ($list["pic"]); ?></span>
                                    <span class="help-block">支持常见图片格式(.jpg,.png,.jpeg)，最大上传：1M</span>
                                    <input id="pic" name="pic" class="input-file" type="file" accept="image/*" />
                                </div>
                            </div>

                            <!-- 文件按钮 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="videosource">视频(可选)</label>
                                <div class="col-md-8">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video src="/aiyingshi/Public/<?php echo ($list["videosource"]); ?>" controls="controls"></video>
                                    </div>
                                    <span class="help-block">支持常见视频格式(.mp4)，最大上传：10M</span>
                                    <input id="videosource" name="videosource" class="input-file" type="file" accept="video/*" />
                                </div>
                            </div>

                            <!-- 文本域 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="description">描述</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="description" name="description" rows="10"><?php echo ($list["description"]); ?></textarea>
                                    <span class="text-block">该项为可选项，若不填则展示正文前30字</span>
                                </div>
                            </div>

                            <!-- 文本域 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="content">内容</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="content" name="content" rows="20" placeholder="在此输入内容" required><?php echo ($list["content"]); ?></textarea>
                                </div>
                            </div>

                            <!-- 双按钮 -->
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="">操作</label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">提交</button>
                                    <button type="reset" class="btn btn-default">清空</button>
                                </div>
                            </div>
                        </form>
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