<?php

namespace app\admin\controller;
use think\AjaxPage;
use think\Page;

class Template extends Base{
    public function templateList(){
        $t = I('t','pc');
        $m = ($t == 'pc') ? 'home' : 'mobile';
        
    }
}