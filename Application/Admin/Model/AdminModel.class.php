<?php
namespace Home\Model;
use Think\Model;
class AdminModel extends Model {
// 定义自动验证:验证输入情况 name=title，需要验证，未满足提示信息
protected $_validate = array(
    array('username','require','用户名未填写'),
    array('password','require','密码未填写'),
    array('username', '', '该用户名已存在！', 0, 'unique', 1)
);
// 定义自动完成:自动完成 time 完善时间信息
protected $_auto = array(
    //array('id','time',1,'function'),
);
}
?>