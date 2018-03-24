<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index($uidA = ''){
        //后台主页，显示各项计数
        if (isset($_SESSION['uidA'])) {
            $slider = M('slideshow');
            $slidercount = $slider->count();
            $movie = M('movie');
            $moviecount = $movie->count();
            // $coach = M('coach');
            // $coachcount = $coach->count();
            $Comment = M('Comment');
            $Commentcount = $Comment->count();
            $User = M('User');
            $Usercount = $User->count();
            $article = M('article');
            $articlecount = $article->count();
            $News = M('News');
            $Newscount = $News->count();
            $Category = M('Category');
            $Categorycount = $Category->count();
            // $Admin = M('useradmin');
            // $userAdmincount = $Admin->count();
            
            $this->assign('slider',$slidercount);
            $this->assign('movie',$moviecount);
            // $this->assign('coach',$coachcount);
            $this->assign('Comment',$Commentcount);
            $this->assign('User',$Usercount);
            $this->assign('article',$articlecount);
            $this->assign('News',$Newscount);
            $this->assign('Category',$Categorycount);
            // $this->assign('Admin',$userAdmincount);

            $this->display();
        }else{
            $this->redirect('/Admin/Form/login');
        }
        
    }
}