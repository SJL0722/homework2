<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
  <title>评论管理</title>
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
          <!--<button class="btn btn-danger" type="button" id="deleteA">批量删除</button>-->
        </p>
        <h2 class="sub-header">评论管理</h2>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <!--<th><input class="all" type="checkbox" /></th>-->
                <th>序号</th>
                <th>顾客名</th>
                <th>模块名</th>
                <th>ID</th>
                <th>评论内容</th>
                <th>添加时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
              <form action="/aiyingshi/admin/Comment/delete_all" method="get" id="list">
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?><tr>
                    <!--<td><input name='id[]' type='checkbox' value='<?php echo ($item["id"]); ?>' class="noborder"></td>-->
                    <td><?php echo ($k); ?></td>
                    <td><?php echo ($item["uname"]); ?></td>
                    <?php switch($item["type"]): case "Movie": ?><td>视频</td><?php break;?>
                      <?php case "Forum": ?><td>跟帖</td><?php break;?>
                      <?php default: ?>
                      <td>-</td><?php endswitch;?>
                    <!--<td><?php echo ($item["type"]); ?></td>-->
                    <td><?php echo ($item["rid"]); ?></td>
                    <td><?php echo ($item["content"]); ?></td>
                    <td><?php echo ($item["addtime"]); ?></td>
                    <td>
                      <?php switch($item["type"]): case "Movie": ?><a class="btn btn-info" href="/aiyingshi/home/Movie/detail?id=<?php echo ($item["rid"]); ?>" target="_blank">查看</a><?php break;?>
                        <?php case "Forum": ?><a class="btn btn-info" href="/aiyingshi/home/Forum/detail?id=<?php echo ($item["rid"]); ?>" target="_blank">查看</a><?php break;?>
                        <?php default: endswitch;?>
                      <a class="btn btn-danger" href="/aiyingshi/Admin/Comment/delete?id=<?php echo ($item["id"]); ?>">删除</a>
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