<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
        $Article = M('article');
        $alist = $Article->field('article.*,admin.username as uname,admin.img as uimg')->join('admin ON article.uid = admin.id')->select();
        $this->assign('alist', $alist);
        $this->assign('empty','<p class="text-center">暂无经验分享教程</p>');
        $this->display();
    }
    public function detail($id=''){
        $id = $_GET['id'];
        if(isset($id)){
            $Article = M('article');
            $alist = $Article->field('article.*,admin.username as uname,admin.img as uimg')->join('admin ON article.uid = admin.id')->where("article.id=$id")->find();
            if($alist){
                //统计
                $Vote = M('vote');
                $vlist = $Vote->field('sum(num) as hcount,avg(num) as scount')->where("rid = $id and type = 'article'")->group('rid')->find();
                $Comment = M('comment');
                $ccount = $Comment->where("rid = $id and type = 'article'")->count();
                $this->assign('alist',$alist);
                //评论
                //加入统计结果
                $this->assign('hcount',$vlist['hocunt']);
                $this->assign('scount',$vlist['scount']);
                $this->assign('ccount',$ccount);
                //加入评论结果
                $this->display();
            }else{
                $this->error("无对应文章");
            }
        }else{
            $this->error("未知参数");
        }
    }
}