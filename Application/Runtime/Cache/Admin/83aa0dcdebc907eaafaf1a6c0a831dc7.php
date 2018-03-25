<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>频道管理:添加</title>
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/admin.css" rel="stylesheet">
    <script src="/aiyingshi/Public/js/active.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">爱影视系统</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
    <li><a>您好，<?php echo (session('usernameA')); ?></a></li>
    <li><a href="/aiyingshi/admin/form/logout">退出</a></li>
</ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
    <li>
        <a href="/aiyingshi/admin">首页</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Slideshow">首页轮播图管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Movie">电影管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Category">频道分类管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Article">影评管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Forum">帖子管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/News">新闻管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/User">会员管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Comment">评论管理</a>
    </li>
    <?php if(($_SESSION['type']) == "tomin"): ?><li>
            <a href="/aiyingshi/admin/Admin">管理员管理</a>
        </li><?php endif; ?>

</ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <p class="pull-right" style="margin-top: 20px;">
                    <a class="btn btn-primary" href="/aiyingshi/admin/Category">返回</a>
                </p>
                <h2 class="sub-header">频道管理:修改频道
                    <small>#<?php echo ($clist["id"]); ?>:<?php echo ($clist["name"]); ?></small>
                </h2>
                <form class="form-horizontal" action="/aiyingshi/admin/category/change_process" method="post" enctype="multipart/form-data"
                    autocomplete="off">
                    <!-- 文本框-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="name">频道名</label>
                        <div class="col-md-4">
                            <input name="id" type="hidden" value="<?php echo ($clist["id"]); ?>" required />
                            <input id="name" name="name" type="text" placeholder="" value="<?php echo ($clist["name"]); ?>" class="form-control input-md" required />
                        </div>
                    </div>

                    <!-- 文件按钮 -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="pic">封面</label>
                        <div class="col-md-4">
                            <img class="img-responsive img-rounded center-block" width="800px" src="/aiyingshi/Public/<?php echo ($clist["pic"]); ?>" />
                            <span class="help-block">位置：/aiyingshi/Public/<?php echo ($clist["pic"]); ?></span>
                            <input id="pic" name="pic" class="input-file" type="file" />
                        </div>
                    </div>

                    <!-- 双按钮 -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="">操作</label>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">提交</button>
                            <button type="reset" class="btn btn-default">清空</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>