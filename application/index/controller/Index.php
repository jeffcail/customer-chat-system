<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    /**
     * FunctionName: index
     * Description: 聊天窗口
     * Author: clj
     * @return mixed
     * @throws \Exception
     */
    public function index()
    {
        $fromid = input('fromid');
        if (!$fromid) {
            throw new \Exception('fromid is required', '2001');
        }
        $toid   = input('toid');
        if (!$toid) {
            throw new \Exception('toid is required', '2001');
        }
        $this->assign('fromid', $fromid);
        $this->assign('toid', $toid);
        return $this->fetch();
    }

    public function lists()
    {
        $fromid = substr(strrchr(Request::instance()->url(), '?'), 8, 9);
        $this->assign('fromid', $fromid);
        return $this->fetch();
    }
}
