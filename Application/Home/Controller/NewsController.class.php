<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){
        $News = M('news');
        $alist = $News->select();
        $this->assign('alist', $alist);
        $this->assign('empty','<p class="text-center">暂无新闻</p>');
        $this->display();
    }
    public function detail($id=''){
        if(isset($id)){
            $News = M('news');
            $alist = $News->field('news.*,admin.username as uname,admin.img as uimg')->join('admin ON news.uid = admin.id')->where("news.id=$id")->find();
            if($alist){
                $this->assign('alist',$alist);
                $this->display();
            }else{
                $this->error("无对应新闻");
            }
        }else{
            $this->error("未知参数");
        }
    }
}