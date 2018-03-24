<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    //网站主页：显示
    public function index($id=''){
        $id = $_GET['id'];
        $Data1 = M('movie');
        if(!isset($id)||$id == 1){
            $id = 1;
            $order = "movie.addtime desc";
        }else if($id == 2){
            $order = "movie.addtime asc";
        }else if($id == 3){
            $order = "avg(vote.num) asc";
        }

        // 场馆获取
        
        $count = $Data1->where("pass = 1")->count();
        
        $p = getpage($count,10);
        
        $mlist = $Data1->field('movie.*,category.name as cname,user.username as uname,user.img as uimg,count(vote.num) as hcount')->join('category ON movie.typeid = category.id')->join('vote on movie.id = vote.rid')->join('user ON movie.uid = user.id')->where("movie.pass = 1")->order($order)->group('vote.rid')->limit($p->firstRow, $p->listRows)->select();
        
        $vlist = $Data1->field('movie.id,count(*),sum(vote.num)')->join('vote on movie.id = vote.rid')->where("vote.type= 'movie' and pass = 1 ")->group('movie.id')->order($order)->limit($p->firstRow, $p->listRows)->select();
        
        $rmlist = $Data1->field('movie.*,category.name as cname,user.username as uname,user.img as uimg,count(vote.num) as hcount')->join('category ON movie.typeid = category.id')->join('vote on movie.id = vote.rid')->join('user ON movie.uid = user.id')->where("movie.pass = 1")->group('vote.rid')->limit(2)->order('rand()')->select();
        
        //幻灯片
        $slideshow = M('slideshow');
        $focus2 = $slideshow->select();
        
        
        $Data2 = M('news');
        $rnlist = $Data2->limit(3)->order('rand()')->select();
        
        
        $Data3 = M('comment');
        $rclist = $Data3->field('comment.*,movie.id as mid,movie.name as mname,user.username as uname,user.img as uimg')->join('movie on comment.rid = movie.id')->join('user ON comment.uid = user.id')->limit(3)->order('rand()')->where("movie.pass = 1")->select();
        $this->assign('id',$id);
        
        $this->assign('focus',$focus2);
        
        $this->assign('mlist',$mlist);

        $this->assign('page', $p->show());
        
        $this->assign('empty','<p class="text-center">暂无此项</p>');
        
        $this->assign('rmlist', $rmlist);
        
        $this->assign('rnlist', $rnlist);
        
        $this->assign('rclist', $rclist);
        
        $this->display();
    }
}