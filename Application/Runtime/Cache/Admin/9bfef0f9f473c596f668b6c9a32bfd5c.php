<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>频道管理</title>
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
                    <a class="btn btn-success" href="/aiyingshi/Admin/Category/add">添加</a>
                </p>
                <h2 class="sub-header">频道管理</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>序号</th>
                                <th>封面</th>
                                <th>名称</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form id="list">
                                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?><tr>
                                        <td><?php echo ($k); ?></td>
                                        <td>
                                            <img class="img-rounded img-responsive" src="/aiyingshi/Public/<?php echo ($item["pic"]); ?>" />
                                        </td>
                                        <td><?php echo ($item["name"]); ?></td>
                                        <td><?php echo ($item["addtime"]); ?></td>
                                        <td>
                                            <a class="btn btn-success" href="/aiyingshi/Admin/Category/change?id=<?php echo ($item["id"]); ?>">修改</a>
                                            <a class="btn btn-danger" href="/aiyingshi/Admin/Category/delete?id=<?php echo ($item["id"]); ?>">删除</a>
                                        </td>
                                    </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="pages">
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="/aiyingshi/Public/js/util.checkall.js"></script>
</body>

</html>