<?php
/**
* TODO 基础分页的相同代码封装，使前台的代码更少
* @param $count 要分页的总记录数
* @param int $pagesize 每页查询条数
* @return \Think\Page
*/
function getpage($count, $pagesize = 10) {
    $p = new Think\Page($count, $pagesize);
    $p->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $p->setConfig('prev', '上一页');
    $p->setConfig('next', '下一页');
    $p->setConfig('last', '末页');
    $p->setConfig('first', '首页');
    $p->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
    $p->lastSuffix = false;//最后一页不显示为总页数
    return $p;
}
/*验证码设置*/

/*验证码检测*/
function check_verify($code, $id = "") {
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=false){
    if(function_exists("mb_substr")){
        if($suffix)
        return mb_substr($str, $start, $length, $charset)."...";
        else
            return mb_substr($str, $start, $length, $charset);
    }elseif(function_exists('iconv_substr')) {
        if($suffix)
        return iconv_substr($str,$start,$length,$charset)."...";
        else
            return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8'] = "/[x01-x7f]|[xc2-xdf][x80-xbf]|[xe0-xef][x80-xbf]{2}|[xf0-xff][x80-xbf]{3}/";
    $re['gb2312'] = "/[x01-x7f]|[xb0-xf7][xa0-xfe]/";
    $re['gbk'] = "/[x01-x7f]|[x81-xfe][x40-xfe]/";
    $re['big5'] = "/[x01-x7f]|[x81-xfe]([x40-x7e]|xa1-xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}

function getstar($num){
    if(is_float($num)){
        $num = intval($num);
    }

    switch ($num) {
        case "1":
            $ret = "★";
            break;
        case "2":
            $ret = "★★";
            break;
        case "3":
            $ret = "★★★";
            break;
        case "4":
            $ret = "★★★★";
            break;
        case "5":
            $ret = "★★★★★";
            break;
        
        default:
            $ret = "";
            break;
    }
    return $ret;
}


?>