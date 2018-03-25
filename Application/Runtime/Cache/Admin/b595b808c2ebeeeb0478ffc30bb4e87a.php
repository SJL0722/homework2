<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
  <title>爱影视系统后台</title>
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
        <h2 class="sub-header">首页</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                <a href="/aiyingshi/admin/Slideshow">轮播</a>
              </th>
              <th>
                <a href="/aiyingshi/admin/Movie">审核</a>
              </th>
              <th>
                <a href="/aiyingshi/admin/Article">影评</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo ($slider); ?></td>
              <td><?php echo ($movie); ?></td>
              <td><?php echo ($article); ?></td>
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>
                <a href="/aiyingshi/admin/News">新闻</a>
              </th>
              <th>
                <a href="/aiyingshi/admin/Category">频道</a>
              </th>
              <th>
                <a href="/aiyingshi/admin/Comment">评论</a>
              </th>
              <th>
                <a href="/aiyingshi/admin/User">会员</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo ($News); ?></td>
              <td><?php echo ($Category); ?></td>
              <td><?php echo ($Comment); ?></td>
              <td><?php echo ($User); ?></td>
            </tr>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</body>

</html>