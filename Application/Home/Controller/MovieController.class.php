<?php
namespace Home\Controller;
use Think\Controller;
class MovieController extends Controller {
    //电影管理：显示全部频道
    public function index(){
        $Category = M('category');
        $clist = $Category->select();
        $this->assign('clist', $clist);
        $this->assign('empty','<div class="panel panel-default">
        <div class="panel-body"><p class="text-center">暂无频道</p></div></div>');
        $this->display();
    }
    //展示频道内容
    public function section($id=''){
        $id = $_GET['id'];
        $Category = M('category');
        $Movie = M('movie');
        if(!isset($id)){
            $cname = "";
            $where = "pass = 1";
        }else{
            $where = "typeid = $id and pass = 1";
            $clist = $Category->find($id);
            $cname = $clist['name'];
        }
        
        $count = $Movie->where($where)->count();
        
        $p = getpage($count,10);
        
        $mlist = $Movie->field('movie.*,user.username as uname,user.img as uimg,sum(vote.num) as hcount,avg(vote.num) as scount')->join('vote on movie.id = vote.rid')->join('user ON movie.uid = user.id')->where($where)->order("addtime desc")->group('vote.rid')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('page', $p->show());
        $this->assign('cname', $cname);
        $this->assign('mlist', $mlist);
        $this->assign('empty','<p class="text-center">暂无此项</p>');
        $this->display();
    }
    public function moviedl($id = ''){
        $id = $_GET['id'];
        if(isset($id)){
            $Movie = M('movie');
            $mlist = $Movie->field('movie.*,user.username as uname,category.name as cname,user.img as uimg')->join('category ON movie.typeid = category.id')->join('user ON movie.uid = user.id')->where("movie.id=$id and pass = 1")->find();
            if($mlist){
                $this->assign('mlist',$mlist);
                $this->display();
            }else{
                $this->error("无对应视频");
            }
        }else{
            $this->error("未知参数");
        }
    }
    //展示视频详情
    public function detail($id=''){
        $id = $_GET['id'];
        $uid = $_SESSION['uid'];
        if(isset($id)){
            $Movie = M('movie');
            $mlist = $Movie->field('movie.*,user.username as uname,category.name as cname,user.img as uimg')->join('category ON movie.typeid = category.id')->join('user ON movie.uid = user.id')->where("movie.id=$id and pass = 1")->find();
            if($mlist){
                //统计
                $Vote = M('vote');
                $vlist = $Vote->field('count(*) as pcount, sum(num) as hcount,avg(num) as scount')->where("rid = $id and type = 'Movie'")->group('rid')->find();
                $Comment = M('comment');
                $ccount = $Comment->where("rid = $id and type = 'Movie'")->count();
                $comment = $Comment->field('comment.*,user.username as uname,user.img as uimg')->join('user ON comment.uid = user.id')->where("rid = $id and type = 'Movie'")->select();
                // 状态检测
                if(isset($uid)){
                    $iscomment = $Comment->where("uid = $uid and rid = $id and type = 'Movie'")->count();
                    $isvote = $Vote->where("uid = $uid and rid = $id and type = 'Movie'")->count();
                    $favor = M('favor');
                    $isfavor = $favor->where("uid = $uid and rid = $id and type = 'Movie'")->count();
                    
                }else{
                    $iscomment = "";
                    $isvote = "";
                    $isfavor = "";
                }
                
                $this->assign('mlist',$mlist);
                $this->assign('comment',$comment);
                //加入统计结果
                $this->assign('hcount',$vlist["hcount"]);
                $this->assign('scount',$vlist["scount"]);
                $this->assign('ccount',$vlist["ccount"]);
                $this->assign('pcount',$vlist["pcount"]);
                
                $this->assign('iscomment',$iscomment);
                $this->assign('isvote',$isvote);
                $this->assign('isfavor',$isfavor);
                
                $this->display();
            }else{
                $this->error("无对应视频");
            }
        }else{
            $this->error("未知参数");
        }
        
    }
}