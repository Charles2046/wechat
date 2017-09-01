<?php
namespace app\admin\controller;






class User extends Base
{
    public function index()
    {
        return $this->fetch();
    }
}