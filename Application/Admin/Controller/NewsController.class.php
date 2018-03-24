<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index($uidA = ''){
        //新闻管理：显示
        if (isset($_SESSION['uidA'])) {
            $Data = M('news');
            $count = $Data->count();
            $p = getpage($count,10);
            $result = $Data->field('news.*,admin.username as uname')->join('admin ON news.uid = admin.id')->limit($p->firstRow, $p->listRows)->select();
            $this->assign('empty','<span class="empty">暂无新闻</span>');
            $this->assign('mlist',$result);
            $this->assign('page', $p->show());
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function add_process($uidA = ''){
        //新闻管理：添加处理
        if (isset($_SESSION['uidA'])) {
            $Data = M('news');
            //上传图片
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 2*1024*1024;// 设置附件上传大小:1M
            $upload->exts = array('jpg', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Public/image/'; // 设置附件上传根目录
            $upload->savePath = '';
            $upload->autoSub = false;//关闭。生成子目录
            // 上传单个文件
            $info   =   $upload->uploadOne($_FILES['pic']);
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
                    $result = $image->thumb(600, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    if($result){
                        $this->success('新闻已发布！','index');
                    }else{
                        $this->error('发布错误！');
                    }
                }
            }
            
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    public function change_process($uidA = ''){
        //新闻管理：修改处理
        if (isset($_SESSION['uidA'])) {
            $Data = M('news');
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
                        $Data->addtime = date("Y-m-d H:i:s" ,time());
                        $fullpath = $upload->rootPath.$info['savename'];
                        $image = new \Think\Image();
                        $image->open($fullpath);
                        // 生成一个固定大小1920*700的缩略图并替换原图
                        $image->thumb(600, 400,\Think\Image::IMAGE_THUMB_FIXED)->save($fullpath);
                    }
                }
                $result = $Data->save();
                //获取全路径
                
                if($result !== "false"){
                    $this->success('新闻已修改！','index');
                }else{
                    $this->error('新闻修改错误！');
                }
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    public function add($uidA = ''){
        //新闻管理：添加
        $uidA = $_SESSION['uidA'];
        if(isset($uidA)){
            //显示页面
            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
        
    }
    function change($uidA = ''){
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if(isset($uidA)){
            $Article = M('news');
            $alist = $Article->field('news.*,admin.username as uname')->join('admin ON news.uid = admin.id')->where("news.id=$id")->find();
            if($alist){
                $this->assign('list',$alist);
                $this->display();
            }else{
                $this->error("该新闻不存在");
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }

    public function delete($uidA = ''){
        //新闻管理：删除[id]
        if (isset($_SESSION['uidA'])) {
            $id= $_GET['id'];
            $Data = M('news');
            $result = $Data->where("id='" . $id . "'")->delete();
            $this->success('删除成功！');
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    function delete_all($uidA = ''){
        //新闻管理：删除所选[id]
        $uidA = $_SESSION['uidA'];
        $id = $_GET['id'];
        if(isset($uidA)){
            $Data = M('news');
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
}