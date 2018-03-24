<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    //管理员管理：仅在当前管理员为“超级管理员”类型时显示
    public function index($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                $Data = M('useradmin');
                $count = $Data->count();
                $p = getpage($count,10);
                $result = $Data->limit($p->firstRow, $p->listRows)->select();
                $this->assign('empty','<span class="empty">暂无管理员</span>');
                $this->assign('list',$result);
                $this->assign('page', $p->show());
                $this->display();
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //管理员管理：添加
    public function add($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                $this->display();
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //管理员管理：添加处理
    public function add_process($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                $Data = M('useradmin');
                if($Data->create()){
                    //添加时间信息
                    $Data->addtime = date("Y-m-d H:i:s" ,time());
                    $result = $Data->add();
                    if($result){
                        $this->success('管理员已添加！','index');
                    }else{
                        $this->error('添加错误！');
                    }
                }
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //管理员管理：修改[id]
    public function change($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                //获取操作对象
                $id= $_GET['id'];
                $Data = M('useradmin');
                $result = $Data->find($id);
                $this->assign('list',$result);
                $this->display();
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //管理员管理：修改处理
    public function change_process($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                $Data = M('useradmin');
                if($Data->create()){
                    //补充时间信息
                    $Data->addtime = date("Y-m-d H:i:s" ,time());
                    $result = $Data->save();
                    if($result !== "false"){
                        $this->success('管理员已修改！','index');
                    }else{
                        $this->error('修改错误！');
                    }
                }
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
    //管理员管理：删除[id]
    public function delete($usernameA = ''){
        if (isset($_SESSION['usernameA'])) {
            if ($_SESSION['type']=='tomin') {
                $id= $_GET['id'];
                $Data = M('useradmin');
                $result = $Data->where("id='" . $id . "'")->delete();
                if($result !== "false"){
                    $this->success('删除成功！','index');
                }else{
                    $this->error('删除失败！');
                }
            }else{
                $this->error('权限异常');
            }
        }else{
            $this->redirect('/Admin/Form/login');
        }
    }
}