<?php
namespace Home\Controller;
use Think\Controller;
class FormController extends Controller{
    //验证码生成
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }
    public function register(){
        //显示
        $this->display();
    }
    
    //用户注册逻辑
    public function register_process(){
        $verify = $_POST['verify'];
        //验证码检测
        if(!check_verify($verify)){
            $this->error("验证码输错了哦！");
        }
        $user = D('user');//向"think_form"表提交数据 “D” 实例化模型类
        //上传图片
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 2*1024*1024;// 设置附件上传大小:1M
        $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Public/image/'; // 设置附件上传根目录
        $upload->savePath = '';
        $upload->autoSub = false;//关闭。生成子目录
        // 上传单个文件
        $info   =   $upload->uploadOne($_FILES['img']);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
            
            if($user->create()) {
                $user->img = 'image/'.$info['savename'];
                
                $user->addtime = date("Y-m-d H:i:s" ,time());
                
                $result = $user->add();
                //获取全路径
                $fullpath = $upload->rootPath.$info['savename'];
                $image = new \Think\Image();
                $image->open($fullpath);
                // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
                $result = $image->thumb(128, 128,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                if($result) {
                    $this->success('注册成功，请登录！',U('/Home/Form/login'));//若提交完成则显示成功消息
                }else{
                    $this->error('数据添加错误！');
                }
            }else{
                $this->error($coach->getError());
            }
        }
    }
    //用户个人中心
    function ucenter($uid = '',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if(isset($uid)){
            //id内容判断
            $movie = M('movie');
            $favor = M('favor');
            $comment = M('comment');
            $forum = M('forum');
            if(!isset($id)||$id == 1){
                $id = 1;
                //用户投稿
                $count = $movie->where("uid=$uid")->count();
                $p = getpage($count,10);
                $mlist = $movie->field('movie.*,category.name as cname')->join('category ON movie.typeid = category.id')->where("uid=$uid")->limit($p->firstRow, $p->listRows)->select();
            }else if($id == 2){
                //用户收藏
                $count = $favor->where("uid=$uid")->count();
                $p = getpage($count,10);
                $mlist = $favor->field('favor.*,movie.id as mid,movie.name as mname,movie.pic as mpic,category.name as cname')->join('movie ON favor.rid = movie.id')->join('category ON movie.typeid = category.id')->where("favor.uid=$uid")->limit($p->firstRow, $p->listRows)->select();
            }else if($id == 3){
                //用户评论
                $count = $comment->where("uid=$uid")->count();
                $p = getpage($count,10);
                $mlist = $comment->field('comment.*,movie.id as mid,movie.name as mname')->join('movie on comment.rid = movie.id')->where("comment.uid = $uid and movie.pass = 1")->select();
            }else if($id == 4){
                $count = $forum->where("uid=$uid")->count();
                $p = getpage($count,10);
                $mlist = $forum->where("uid=$uid")->select();
            }
            $this->assign('id',$id);
            $this->assign('mlist',$mlist);
            $this->assign('page', $p->show());
            $this->assign('empty','<p class="text-center">暂无此项</p>');
            $this->display();
            
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    //用户修改逻辑
    function manage($username = ''){
        $username = $_SESSION['username'];
        $uid = $_SESSION['uid'];
        if (isset($username) && isset($uid)) {
            $user = M('user');
            $list = $user->find($uid);
            if($list){
                $this->assign("list",$list);
                $this->display();
            }else{
                $this->error('参数错误！',U('/Home/form/login'));//否则提示
            }
        } else {
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function manage_process($uid = ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Data = M('user');
            if($Data->create()){
                if(isset($_FILES['img'])){
                    //上传图片
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 2*1024*1024;// 设置附件上传大小:2M
                    $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/image/'; // 设置附件上传根目录
                    $upload->savePath = '';
                    $upload->autoSub = false;//关闭。生成子目录
                    // 上传单个文件
                    $info   =   $upload->uploadOne($_FILES['img']);
                    if($info) {// 上传错误提示错误信息
                        // $this->error($upload->getError());
                        $Data->img = 'image/'.$info['savename'];
                        
                        $fullpath = $upload->rootPath.$info['savename'];
                        $image = new \Think\Image();
                        $image->open($fullpath);
                        // 生成一个固定大小1920*700的缩略图并替换原图
                        $image->thumb(400, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    }
                }
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->save();
                //获取全路径
                
                if($result !== "false"){
                    $this->success('用户信息修改成功，请重新登录！',U('/Home/form/logout'));
                }else{
                    $this->error('用户信息修改错误！');
                }
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function movie_add($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Category = M('category');
            $clist = $Category->select();
            $this->assign('clist',$clist);
            $this->display();
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function forum_add($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $this->display();
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function movie_preview($uid= '',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $Movie = M('movie');
                $mlist = $Movie->field('movie.*,category.name as cname,user.username as uname,user.img as uimg')->join('category ON movie.typeid = category.id')->join('user ON movie.uid = user.id')->where("movie.id=$id and movie.uid=$uid")->find();
                if($mlist){
                    $this->assign('mlist',$mlist);
                    $this->display();
                }else{
                    $this->error('素材被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function movie_add_process($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Data = M('movie');
            if($Data->create()){
                if(isset($_FILES['pic'])){
                    //上传图片
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 2*1024*1024;// 设置附件上传大小:2M
                    $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/image/'; // 设置附件上传根目录
                    $upload->savePath = '';
                    $upload->autoSub = false;//关闭。生成子目录
                    // 上传单个文件
                    $info   =   $upload->uploadOne($_FILES['pic']);
                    if($info) {// 上传错误提示错误信息
                        // $this->error($upload->getError());
                        $Data->pic = 'image/'.$info['savename'];
                        
                        $fullpath = $upload->rootPath.$info['savename'];
                        $image = new \Think\Image();
                        $image->open($fullpath);
                        // 生成一个固定大小1920*700的缩略图并替换原图
                        $image->thumb(600, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    }
                }
                if(isset($_FILES['videosource'])){
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 10*1024*1024;// 设置附件上传大小:10M
                    $upload->exts = array('mp4', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/video/'; // 设置附件上传根目录
                    $upload->savePath = '';
                    $upload->autoSub = false;//关闭。生成子目录
                    // 上传单个文件
                    $info   =   $upload->uploadOne($_FILES['videosource']);
                    if($info) {// 上传错误提示错误信息
                        // $this->error($upload->getError());
                        $Data->videosource = 'image/'.$info['savename'];
                    }
                }
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->add();
                if($result){
                    $this->success('影片提交成功！','ucenter');
                }else{
                    $this->error('发布错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }
    
    function forum_add_process($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Data = M('forum');
            if($Data->create()){
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->add();
                if($result){
                    $this->success('帖子提交成功！','ucenter');
                }else{
                    $this->error('发布错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }
    
    function movie_change($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $movie = M('movie');
                $result = $movie->field('movie.*')->join('category ON movie.typeid = category.id')->where("movie.id=$id and movie.uid=$uid")->find();
                if($result){
                    $Category = M('category');
                    $clist = $Category->select();
                    $this->assign('clist',$clist);
                    $this->assign('list',$result);
                    $this->display();
                }else{
                    $this->error('素材被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function forum_change($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $movie = M('forum');
                $result = $movie->field('forum.*')->where("forum.id=$id and forum.uid=$uid")->find();
                if($result){
                    $this->assign('list',$result);
                    $this->display();
                }else{
                    $this->error('帖子被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function movie_delete($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $movie = M('movie');
                $result = $movie->where("id=$id and uid=$uid")->delete();
                if($result){
                    $this->success('素材删除成功！');
                }else{
                    $this->error('素材已被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function forum_delete($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $forum = M('forum');
                $result = $forum->where("id=$id and uid=$uid")->delete();
                if($result){
                    $this->success('帖子删除成功！');
                }else{
                    $this->error('帖子已被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function fdelete($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $comment = M('comment');
                $result = $comment->where("id=$id and uid=$uid")->delete();
                if($result){
                    $this->success('取消收藏成功！');
                }else{
                    $this->error('该项已被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function cdelete($uid='',$id=''){
        $uid = $_SESSION['uid'];
        $id = $_GET['id'];
        if (isset($uid)){
            if(isset($id)){
                $comment = M('comment');
                $result = $comment->where("id=$id and uid=$uid")->delete();
                if($result){
                    $this->success('评论删除成功！');
                }else{
                    $this->error('评论已被删除或不存在！');//否则提示
                }
            }else{
                $this->error('参数错误！');//否则提示
            }
        }else{
            $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
        }
    }
    
    function movie_change_process($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Data = M('movie');
            if($Data->create()){
                if(isset($_FILES['pic'])){
                    //上传图片
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 2*1024*1024;// 设置附件上传大小:2M
                    $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/image/'; // 设置附件上传根目录
                    $upload->savePath = '';
                    $upload->autoSub = false;//关闭。生成子目录
                    // 上传单个文件
                    $info   =   $upload->uploadOne($_FILES['pic']);
                    if($info) {// 上传错误提示错误信息
                        // $this->error($upload->getError());
                        $Data->pic = 'image/'.$info['savename'];
                        
                        $fullpath = $upload->rootPath.$info['savename'];
                        $image = new \Think\Image();
                        $image->open($fullpath);
                        // 生成一个固定大小1920*700的缩略图并替换原图
                        $image->thumb(600, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    }
                }
                if(isset($_FILES['videosource'])){
                    $upload1 = new \Think\Upload();// 实例化上传类
                    $upload1->maxSize = 20*1024*1024;// 设置附件上传大小:10M
                    $upload1->exts = array('mp4', 'png', 'jpeg');// 设置附件上传类型
                    $upload1->rootPath = './Public/video/'; // 设置附件上传根目录
                    $upload1->savePath = '';
                    $upload1->autoSub = false;//关闭。生成子目录
                    // 上传单个文件
                    $info1   =   $upload1->uploadOne($_FILES['videosource']);
                    if($info1) {// 上传错误提示错误信息
                        
                        $Data->videosource = 'video/'.$info1['savename'];
                    }
                }
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->save();
                if($result){
                    $this->success('影片修改成功！','ucenter');
                }else{
                    $this->error('修改错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }
    
    function forum_change_process($uid= ''){
        $uid = $_SESSION['uid'];
        if (isset($uid)){
            $Data = M('forum');
            if($Data->create()){
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->save();
                if($result){
                    $this->success('帖子修改成功！','ucenter');
                }else{
                    $this->error('修改错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }
    
    //场馆教练 添加至收藏 逻辑
    public function addStar($username = ''){
        $username = $_SESSION['username'];
        if(isset($username)){
            $typeid = $_POST['typeid'];
            $type = $_POST['type'];
            $Star = M('star');
            $typedb = M($type);
            if($Star->create()) {
                //追加当前时间信息：time
                $Star->time=date("Y-m-d H:i:s" ,time());
                //判断收藏情况
                $isstar = $Star->where("typeid='$typeid' and type='$type' and username='" . $username. "'")->select();
                if($isstar){
                    //若已收藏，提示
                    $this->error('您已收藏此项！');
                }else{
                    //未收藏，则添加信息
                    $result = $Star->add();
                    //此场馆收藏数加一
                    $typedb->where("id=$typeid")->setInc('starcount');
                    if($result) {
                        $this->success('此项已添加至收藏！');//若提交完成则显示成功消息
                    }else{
                        $this->error('此项添加错误！');
                    }
                }
            }else{
                $this->error($Star->getError());
            }
        }else{
            $this->error('请登录后进行收藏！',U('/Home/form/login'));//否则提示
        }
    }
    //收藏查看
    public function star($username = ''){
        $username = $_SESSION['username'];
        if(isset($username)){
            //读取收藏
            $Data = M('star');
            //读取场馆 join 场馆信息
            $where1 ="username='" . $username . "' AND type='Gym' ";
            $count1 = $Data->where($where1)->count();
            $p1 = getpage($count1,10);
            $result1 = $Data->field('star.*,gym.name as gymname,gym.img')->join('gym ON star.typeid=gym.id')->where($where1)->limit($p1->firstRow, $p1->listRows)->select();
            //读取教练 join 教练信息
            $where2 ="username='" . $username . "' AND type='Coach' ";
            $count2 = $Data->where($where2)->count();
            $p2 = getpage($count2,10);
            $result2 = $Data->field('star.*,coach.name as coachname,coach.img')->join('coach ON star.typeid=coach.id')->where($where2)->limit($p2->firstRow, $p2->listRows)->select();
            //渲染sql语句;在Star表内 寻找满足条件 username 的数据 并 列出
            $this->assign('empty','<span class="empty">暂无收藏</span>');
            $this->assign('count1',$count1);
            $this->assign('count2',$count2);
            $this->assign('list1',$result1);
            $this->assign('list2',$result2);
            $this->assign('page1', $p1->show());
            $this->assign('page2', $p2->show());
            $this->display();
        }else{
            $this->error('请登录后查看收藏！',U('/Home/form/login'));//否则提示
        }
    }
    
    //显示用户评论> PublicController > comment.html
    
    //用户提交评论
    public function addcomment($username = ''){
        $username = $_SESSION['username'];
        if(isset($username)){
            $Comment = M('comment');
            if($Comment->create()){
                $Comment->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Comment->add();
                if($result){
                    $this->success('评论已发布！');//若提交完成则显示成功消息
                }else{
                    $this->error('发布错误！');
                }
            }
        }else{
            $this->error('请登录后提交评论！');
        }
    }
    
    //用户提交评分
    public function addvote($username = ''){
        $username = $_SESSION['username'];
        if(isset($username)){
            $vote = M('vote');
            if($vote->create()){
                $vote->addtime = date("Y-m-d H:i:s" ,time());
                $result = $vote->add();
                if($result){
                    $this->success('评分成功！');//若提交完成则显示成功消息
                }else{
                    $this->error('发布错误！');
                }
            }
        }else{
            $this->error('请登录后提交评论！');
        }
    }
    
    //用户加入收藏
    public function addfavor($username = ''){
        $username = $_SESSION['username'];
        if(isset($username)){
            $favor = M('favor');
            if($favor->create()){
                $favor->addtime = date("Y-m-d H:i:s" ,time());
                $result = $favor->add();
                if($result){
                    $this->success('收藏成功！');//若提交完成则显示成功消息
                }else{
                    $this->error('发布错误！');
                }
            }
        }else{
            $this->error('请登录后进行收藏！');
        }
    }
    
    //登陆逻辑
    public function login_process($username = '', $password = ''){
        $username = $_POST['user'];
        $password = $_POST['password'];
        $verify = $_POST['verify'];
        
        //验证码检测
        if(!check_verify($verify)){
            $this->error("验证码输错了哦！");
        }
        
        //进行验证
        $Data = M('user');
        $where = "username='" . $username . "' AND password='" . $password . "'";
        $result = $Data->where($where)->find();
        
        if($result){
            //读取用户ID
            
            session('username',$username);
            session('uid',$result['id']);
            session('uimg',$result['img']);
            
            $this->success('登录成功！',U('/Home/index'));//若提交完成则显示成功消息
        }else{
            $this->error('用户名或密码错误！');//否则提示
        }
    }
    //用户 退出登录 逻辑
    public function logout(){
        if(isset($_SESSION['username'])){
            session('username',null);
            session('uid',null);
            session('uimg',null);
            session('[destroy]');
            $this->success('用户已退出！', U('/Home/index'));
        }else{
            $this->redirect('/Home/index');
        }
    }
}