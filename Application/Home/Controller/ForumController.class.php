<?php
namespace Home\Controller;
use Think\Controller;
class ForumController extends Controller {
    public function index(){
        $Forum = M('Forum');
        $alist = $Forum->field('Forum.*,user.username as uname,user.img as uimg')->join('user ON Forum.uid = user.id')->select();
        $this->assign('alist', $alist);
        $this->assign('empty','<p class="text-center">暂无帖子</p>');
        $this->display();
    }
    public function detail($id=''){
        $id = $_GET['id'];
        if(isset($id)){
            $Forum = M('Forum');
            $alist = $Forum->field('Forum.*,user.username as uname,user.img as uimg')->join('user ON Forum.uid = user.id')->where("Forum.id=$id")->find();
            if($alist){
                //统计
                $Vote = M('vote');
                // $vlist = $Vote->field('sum(num) as hcount,avg(num) as scount')->where("rid = $id and type = 'Forum'")->group('rid')->find();
                $Comment = M('comment');
                $ccount = $Comment->where("rid = $id and type = 'Forum'")->count();
                $comment = $Comment->field('comment.*,user.username as uname,user.img as uimg')->join('user ON comment.uid = user.id')->where("rid = $id and type = 'Forum'")->select();

                $this->assign('alist',$alist);
                $this->assign('comment',$comment);
                $this->assign('empty','<p class="text-center">暂无跟帖</p>');
                //评论
                //加入统计结果
                // $this->assign('hcount',$vlist['hocunt']);
                // $this->assign('scount',$vlist['scount']);
                $this->assign('ccount',$ccount);
                //加入评论结果
                $this->display();
            }else{
                $this->error("无对应帖子");
            }
        }else{
            $this->error("未知参数");
        }
    }
}