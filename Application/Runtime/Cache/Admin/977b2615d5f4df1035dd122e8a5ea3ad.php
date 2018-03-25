<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>新闻管理:预览</title>
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/admin.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/wangEditor.min.css" rel="stylesheet">
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
                    <a class="btn btn-primary" href="/aiyingshi/admin/Movie">返回</a>
                </p>
                <h2 class="sub-header">视频审核:预览新闻
                    <small>#<?php echo ($mlist["id"]); ?>:<?php echo ($mlist["name"]); ?></small>
                </h2>
                <div class="embed-responsive embed-responsive-16by9">
                    <?php if(empty($mlist['videosource'])): if(empty($mlist['pic'])): ?><iframe class="embed-responsive-item" src="" style="background-color:aliceblue;" frameborder="0" allowfullscreen="true">
                                <p class="text-center">暂无视频</p>
                            </iframe>
                            <?php else: ?>
                            <img src="/aiyingshi/Public/<?php echo ($mlist["pic"]); ?>" class="img-responsive"><?php endif; ?>
                            <?php else: ?>
                            <?php if(empty($mlist['pic'])): ?><video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto"></video>
                                <?php else: ?>
                                <video src="/aiyingshi/Public/<?php echo ($mlist["videosource"]); ?>" controls="controls" preload="auto" poster="/aiyingshi/Public/<?php echo ($mlist["pic"]); ?>"></video><?php endif; endif; ?>
                </div>
                <?php if(empty($mlist['description'])): else: ?>
                    <blockquote class="margin1">
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
</body>

</html>