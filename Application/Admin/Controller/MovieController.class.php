<?php
namespace Admin\Controller;
use Think\Controller;
class MovieController extends Controller {
    public function index($uidA = ''){
        //产品管理：显示
        if (isset($_SESSION['uidA'])) {
            $Data = M('movie');
            $count = $Data->count();
            $p = getpage($count,10);
            $result = $Data->field('movie.*,category.name as cname,user.username as uname')->join('category ON movie.typeid = category.id')->join('user ON movie.uid = user.id')->limit($p->firstRow, $p->listRows)->select();
            $this->assign('empty','<span class="empty">暂无视频</span>');
            $this->assign('list',$result);
            $this->assign('page', $p->show());
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    public function delete($uidA = ''){
        //产品管理：删除[id]
        if (isset($_SESSION['uidA'])) {
            $id= $_GET['id'];
            $Data = M('movie');
            $result = $Data->where("id='" . $id . "'")->delete();
            $this->success('删除成功！');
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    
    function delete_all($uidA = ''){
        //产品管理：删除所选[id]
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if(isset($uidA)){
            $Data = M('movie');
            //判断id是数组还是一个数值
            if(is_array($id)){
                $where = 'id in('.implode(',',$id).')';
            }else{
                $where = 'id='.$id;
            }
            $list=$Data->where($where)->delete();
            if($list!==false) {
                $this->success("成功删除{$list}条！");
            }else{
                $this->error('删除失败！');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    function pass($uidA = ''){
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if(isset($uidA)){
            $Data = M('movie');
            $where = 'id='.$id;
            $ispass = $Data->where($where)->getfield('pass');
            if($ispass == '0'){
                $pass_act = $Data->where($where)->setField('pass','1');
                if($pass_act){
                    $this->success('审核通过!');
                }
            }else{
                $this->error('该视频已通过审核');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    function preview($uidA = ''){
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if(isset($uidA)){
            $Movie = M('movie');
            $mlist = $Movie->field('movie.*,category.name as cname,user.username as uname,user.img as uimg')->join('category ON movie.typeid = category.id')->join('user ON movie.uid = user.id')->where("movie.id=$id")->find();
            if($mlist){
                $this->assign('mlist',$mlist);
                $this->display();
            }else{
                $this->error("该视频不存在");
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    function add($uidA= ''){
        $uidA = $_SESSION['uidA'];
        if (isset($uidA)){
            $Category = M('category');
            $clist = $Category->select();
            $this->assign('clist',$clist);
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');//否则提示
        }
    }


    function add_process($uidA= ''){
        $uidA = $_SESSION['uidA'];
        if (isset($uidA)){
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
                else if(isset($_FILES['videosource'])){
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
                    $this->success('稿件提交成功！','ucenter');
                }else{
                    $this->error('发布错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }

    function change($uidA='',$id=''){
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if (isset($uidA)){
            if(isset($id)){
                $movie = M('movie');
                $result = $movie->field('movie.*')->join('category ON movie.typeid = category.id')->where("movie.id=$id")->find();
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

    function change_process($uidA= ''){
        $uidA = $_SESSION['uidA'];
        if (isset($uidA)){
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
                else if(isset($_FILES['videosource'])){
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
                    }else{
                        $this->error($upload1->getError());
                    }
                }
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->save();
                if($result){
                    $this->success('稿件修改成功！','ucenter');
                }else{
                    $this->error('修改错误！');
                }
            }else{
                $this->error('请登录后进行操作！',U('/Home/form/login'));//否则提示
            }
        }
    }
}