<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
    public function index($uidA = ''){
        //产品管理：显示
        if (isset($_SESSION['uidA'])) {
            $Data = M('category');
            $count = $Data->count();
            $p = getpage($count,10);
            $result = $Data->limit($p->firstRow, $p->listRows)->select();
            $this->assign('empty','<span class="empty">暂无频道</span>');
            $this->assign('list',$result);
            $this->assign('page', $p->show());
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function add($uidA = ''){
        //产品管理：添加
        $uidA = $_SESSION['uidA'];
        if(isset($uidA)){
            //显示页面
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
        
    }
    public function add_process($uidA = ''){
        //产品管理：添加处理
        if (isset($_SESSION['uidA'])) {
            $Data = M('category');
            //上传图片
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 2*1024*1024;// 设置附件上传大小:1M
            $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/image/'; // 设置附件上传根目录
            $upload->savePath = '';
            $upload->autoSub = false;//关闭。生成子目录
            // 上传单个文件
            $info = $upload->uploadOne($_FILES['pic']);
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功 获取上传文件信息
                if($Data->create()){
                    $Data->pic = 'image/'.$info['savename'];
                    $Data->addtime = date("Y-m-d H:i:s" ,time());
                    $Data->add();
                    //获取全路径
                    $fullpath = $upload->rootPath.$info['savename'];
                    $image = new \Think\Image();
                    $image->open($fullpath);
                    // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
                    $result = $image->thumb(544, 364,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    if($result){
                        $this->success('频道已发布！','index');
                    }else{
                        $this->error('发布错误！');
                    }
                }
            }
            
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function change($uidA = ''){
        //新闻管理：修改[id]
        if (isset($_SESSION['uidA'])) {
            //获取操作对象
            $id= $_GET['id'];
            $Data = M('category');
            $result = $Data->find($id);
            if($result){
                $this->assign('clist',$result);
                $this->display();
            }else{
                $this->error('该频道不存在');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function change_process($uidA = ''){
        //场馆管理：修改处理
        if (isset($_SESSION['uidA'])) {
            $Data = M('category');
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
                        $image->thumb(400, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    }
                }
                $Data->addtime = date("Y-m-d H:i:s" ,time());
                $result = $Data->save();
                //获取全路径
                
                if($result !== "false"){
                    $this->success('频道已修改！','index');
                }else{
                    $this->error('频道修改错误！');
                }
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function delete($uidA = ''){
        //产品管理：删除[id]
        if (isset($_SESSION['uidA'])) {
            $id= $_GET['id'];
            if(isset($id)){
                $Data = M('category');
                $result = $Data->where("id='" . $id . "'")->delete();
                $this->success('删除成功！');
            }else{
                $this->error('参数错误！');
            }
            
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
}