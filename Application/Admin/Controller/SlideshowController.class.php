<?php
namespace Admin\Controller;
use Think\Controller;
class SlideshowController extends Controller {
    public function index($uidA = ''){
        //首页幻灯片管理：显示
        if (isset($_SESSION['uidA'])) {
            $Data2 = M('slideshow');
            $count = $Data2->count();
            $p = getpage($count,10);
            $focus2 = $Data2->limit($p->firstRow, $p->listRows)->select();
            $this->assign('empty','<span class="empty">暂无轮播图</span>');
            $this->assign('list',$focus2);
            $this->assign('page', $p->show());
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
        
    }

    public function add($uidA = ''){
        //首页幻灯片管理：添加
        if (isset($_SESSION['uidA'])) {
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    public function add_process($uidA = ''){
        //首页幻灯片管理：添加
        if (isset($_SESSION['uidA'])) {
            $Data = M('slideshow');
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
                if($Data->create()){
                    $Data->img = 'image/'.$info['savename'];
                    $Data->addtime = date("Y-m-d H:i:s" ,time());
                    $Data->add();
                    //获取全路径
                    $fullpath = $upload->rootPath.$info['savename'];
                    $image = new \Think\Image();
                    $image->open($fullpath);
                    // 生成一个固定大小为150*150的缩略图并保存为thumb.jpg
                    $result = $image->thumb(1920, 667,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    if($result){
                        $this->success('轮播图已添加！','index');
                    }else{
                        $this->error('发布错误！');
                    }
                }
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    public function delete($uidA = ''){
        if (isset($_SESSION['uidA'])) {
            $id= $_GET['id'];
            $Data = M('slideshow');
            $getimg = $Data->where("id='" . $id . "'")->getField('img');
            unlink($getimg);
            $result = $Data->where("id='" . $id . "'")->delete();
            $this->success('删除成功！');
            
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
}