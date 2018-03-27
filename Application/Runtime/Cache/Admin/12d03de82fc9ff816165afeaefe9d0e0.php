<?php if (!defined('THINK_PATH')) exit();?>
<html>

<head>
    <title>影片管理:修改</title>
    <script src="/aiyingshi/Public/js/jquery.min.js"></script>
    <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
    <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/admin.css" rel="stylesheet">
    <link href="/aiyingshi/Public/css/wangEditor.min.css" rel="stylesheet">
    <script type="text/javascript" src='/aiyingshi/Public/js/wangEditor.min.js'></script>
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
                <a class="navbar-brand" href="#">视频学习网系统</a>
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
        <a href="/aiyingshi/admin/Category">分类管理</a>
    </li>
    <li>
        <a href="/aiyingshi/admin/Article">经验分享管理</a>
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
                    <a class="btn btn-primary" href="/aiyingshi/admin/movie">返回</a>
                </p>
                <h2 class="sub-header">影片管理:修改影片
                        <small>#<?php echo ($list["id"]); ?>:<?php echo ($list["name"]); ?></small></h2>
                        <form class="form-horizontal" action="/aiyingshi/admin/movie/change_process" method="post" enctype="multipart/form-data" autocomplete="off">

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
                                    <video src="/aiyingshi/Public/<?php echo ($list["videosource"]); ?>" controls="controls"></video>
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
    <!--add some files-->
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