<?php
namespace app\home\controller;





use think\controller;

class User extends Base
{
    public $user_id = 0;
    public $user = array();
    
    
    
    public function forget_pwd()
    {
        if ($this->user_id > 0) {
            header("Location: " . U('Home/User/Index'));
        }
    }
}