<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
  <title>视频学习网系统登录</title>
  <script src="/aiyingshi/Public/js/jquery.min.js"></script>
  <script src="/aiyingshi/Public/js/bootstrap.min.js"></script>
  <link href="/aiyingshi/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/aiyingshi/Public/css/admin.css" rel="stylesheet">
  <script src="/aiyingshi/Public/js/active.min.js"></script>
</head>

<body class="login-page">
  <div class="login-box">
    <div class="login-logo" align="center" style="width:100%;">
      <h2 style="color:white;padding-top:50px;" align="center">视频学习网管理系统</h2>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <form id="loginForm" method="post" action="/aiyingshi/Admin/Form/login_process" autocomplete="off">
        <div class="form-group">
          <input type="text" id="username" class="form-control input-lg" name="usernameA" placeholder="用户名" required>
        </div>
        <div class="form-group">
          <input type="password" id="password" class="form-control input-lg" name="passwordA" placeholder="密码" required>
        </div>
        <div class="form-group">
          <div class="col-xs-6 no-padding form-group">
            <input name="verify" type="text" placeholder="验证码" class="form-control input-lg" required>
          </div>
          <div class="col-xs-6 no-padding text-right" id="captcha-container">
            <img height="50px" alt="验证码" src="<?php echo U('Admin/Form/verify_c',array());?>" title="点击刷新">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat btn-lg">登录</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

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

</body>

</html>