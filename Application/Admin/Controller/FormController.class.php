<?php
namespace Admin\Controller;
use Think\Controller;
class FormController extends Controller{
    //验证码生成
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = 'abcdefghij';
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }
    
    //管理员 登陆逻辑 [user pass > verify > session]
    public function login_process($usernameA = '', $passwordA = ''){
        $usernameA = $_POST['usernameA'];
        $passwordA = $_POST['passwordA'];
        $verify = $_POST['verify'];
        //验证码检测
        if(!check_verify($verify)){
            $this->error("验证码输错了哦！");
        }
        //验证中...
        $Data = M('admin');
        $result = $Data->where("username='" . $usernameA . "' AND password='" . $passwordA . "'")->find();
        
        if($result){
            session('usernameA',$usernameA);
            session('uidA',$result['id']);
            $this->success('登录成功！',U('/Admin/index'));//若提交完成则显示成功消息
        }else{
            $this->error('用户名或密码错误！');//否则提示
        }
    }
    //管理员 退出登录 逻辑 [session null destroy]
    public function logout(){
        if(isset($_SESSION['usernameA'])){
            $type = $_SESSION['type'];
            session('usernameA',null);
            session('uidA',null);
            session('[destroy]');
            
            $this->success('用户已退出！', U('/Admin/Form/login'));
            
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //富文本框图片上传接口 [img] upload > return path
    public function upload(){
        if(isset($_FILES['img'])){
            //上传图片
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 2*1024*1024;// 设置附件上传大小:2M
            $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
            
            $upload->rootPath = './Public/upload/'; // 设置附件上传根目录
            $upload->savePath = '';
            $upload->autoSub = false;//关闭。生成子目录
            // 上传单个文件
            $info   =   $upload->uploadOne($_FILES['img']);
            if($info) {// 上传错误提示错误信息
                //  $this->error($upload->getError());
                // $Data->img = 'upload/'.$info['savename'];
                $fullpath = '/exercise2o/Public/upload/'.$info['savename'];
                // $data['status']  = 1;
                $data = $fullpath;
                $this->ajaxReturn($data,'eval');
            }
        }
    }
    
}