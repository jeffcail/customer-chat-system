<?php
/**
 * Copyright (C), 2016-2018, clj, Ltd.
 * Filename: Chat
 * Description: 客服聊天
 *
 * @author: clj
 * @Create Date: 2021/12/17 9:49 上午
 * @Update Date: 2021/12/17 9:49 上午 By clj
 * @version: 1.0
 */

namespace app\api\controller;

use PDOStatement;
use think\Controller;
use think\Db;
use think\db\exception\DataNotFoundException;
use think\db\exception\ModelNotFoundException;
use think\exception\DbException;
use think\Model;
use think\Request;

class Chat extends Controller
{
    /**
     * FunctionName: index
     * Description: 测试数据库连接
     * Author: clj
     * @throws DataNotFoundException
     * @throws ModelNotFoundException
     * @throws DbException
     */
    public function index()
    {
        var_dump(Db::name('user')->select());
    }

    /**
     * FunctionName: save_message
     * Description: 聊天消息持久化
     * Author: clj
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function save_message()
    {
        if (Request::instance()->isAjax()) {
            $message = input('post.');

            $data['fromid'] = $message['fromid'];
            $data['fromname'] = $this->getName($message['fromid']);
            $data['toid'] = $message['toid'];
            $data['toname'] = $this->getName($message['toid']);
            $data['content'] = $message['data'];
            $data['time'] = $message['time'];
            $data['isread'] = $message['isread'];
            $data['type'] = 1;

            Db::name('communication')->insert($data);
        }
    }

    /**
     * FunctionName: get_head
     * Description: 获取头像
     * Author: clj
     * @return array
     * @throws DataNotFoundException
     */
    public function get_head()
    {
        if (Request::instance()->isAjax()) {
            $fromid = input('fromid');
            if (!$fromid) {
                throw new \Exception('fromid is required', '2001');
            }
            $toid   = input('toid');
            if (!$toid) {
                throw new \Exception('toid is required', '2001');
            }

            $from_avator = Db::name("user")->where('id', $fromid)->field('headimgurl')->find();
            if (!$from_avator) {
                throw new DataNotFoundException('from_headimgurl not found', "user");
            }
            $to_avator = Db::name("user")->where('id', $toid)->field('headimgurl')->find();
            if (!$to_avator) {
                throw new DataNotFoundException('to_headimgurl not found', "user");
            }
            return [
                'from_head' => $from_avator['headimgurl'],
                'to_head' => $to_avator['headimgurl'],
            ];
        }
    }

    /**
     * FunctionName: get_nickname
     * Description: 获取聊天着的用户名
     * Author: clj
     * @return array
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function get_nickname()
    {
        if (Request::instance()->isAjax()) {
            $fromid = input('fromid');
            if (!$fromid) {
                throw new \Exception('fromid is required', '2001');
            }
            $toid   = input('toid');
            if (!$toid) {
                throw new \Exception('toid is required', '2001');
            }

            $from_name = Db::name("user")->where('id', $fromid)->field('nickname')->find();
            if (!$from_name) {
                throw new DataNotFoundException('from_nickname not found', "user");
            }
            $to_name = Db::name("user")->where('id', $toid)->field('nickname')->find();
            if (!$to_name) {
                throw new DataNotFoundException('to_nickname not found', "user");
            }

            return [
                'from_nickname' => $from_name['nickname'],
                'to_nickname' => $to_name['nickname'],
            ];
        }
    }

    /**
     * FunctionName: get_chat_history_conent
     * Description: 加载历史聊天记录
     * Author: clj
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function get_chat_history_conent()
    {
        if (Request::instance()->isAjax()) {
            $fromid = input('fromid');
            if (!$fromid) {
                throw new \Exception('fromid is required', '2001');
            }
            $toid   = input('toid');
            if (!$toid) {
                throw new \Exception('toid is required', '2001');
            }
            $fromhead = Db::name('user')->where('id', $fromid)->field('headimgurl')->find();
            if (!$fromhead) {
                throw new DataNotFoundException('from_headimgurl not found', "user");
            }
            $tohead = Db::name('user')->where('id', $toid)->field('headimgurl')->find();
            if (!$tohead) {
                throw new DataNotFoundException('to_headimgurl not found', "user");
            }

            // $count = Db::query("select count(*) from chat_communication where (fromid=".$fromid." and toid=".$toid.") or (fromid=".$toid." and toid=".$fromid.")");
            //echo "<pre>";
            //var_dump($count[0]["count(*)"]);
            $history_chat_content = Db::query("select content, fromid, toid, type  from chat_communication where (fromid=".$fromid." and toid=".$toid.") or (fromid=".$toid." and toid=".$fromid.") order by id");
            foreach ($history_chat_content as $key=>$item) {
                if ($item['fromid'] == $fromid) {
                    $history_chat_content[$key]['headimgurl']=$fromhead['headimgurl'];
                }
                if ($item['fromid'] == $toid) {
                    $history_chat_content[$key]['headimgurl']=$tohead['headimgurl'];
                }
            }
            return $history_chat_content;
        }
    }

    /**
     * FunctionName: upload_chat_img
     * Description: 上传图片
     * Author: clj
     * @return string[]
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    public function upload_chat_img()
    {
        $file = $_FILES['file'];
        $fromid = input('fromid');
        $toid = input('toid');
        $online = input('online');

        $ext = strtolower(strrchr($file['name'], "."));
        $type = ['.jpg', '.jpeg', '.png', '.gif'];
        if (!in_array($ext, $type)) {
            return ['status'=>'img type error'];
        }

        if ($file['size']/1024>5120) {
            return ['status'=>'img size is too large'];
        }

        $filename = uniqid("chat_img_", false);
        $uploadPath = ROOT_PATH . 'public/uploads/';
        $file_full_path_name = $uploadPath . $filename . $ext;
        $result = move_uploaded_file($file['tmp_name'], $file_full_path_name);
        if ($result) {
            $name = $filename.$ext;
            $data['content'] = $name;
            $data['fromid'] = $fromid;
            $data['toid'] = $toid;
            $data['fromname'] = $this->getName($fromid);
            $data['toname'] = $this->getName($toid);
            $data['time'] = time();
            $data['isread'] = $online;
            $data['type'] = 2;
            $insert_id = Db::name('communication')->insert($data);
            if ($insert_id) {
                return ['status' => 'ok', 'img_name' => $name];
            } else {
                return ['status' => 'false', 'img_name' => $name];
            }
        }
    }

    /**
     * FunctionName: get_head_one
     * Description: 根据uid获取头像
     * Author: clj
     * @param $uid
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    protected function get_head_one($uid)
    {
        $fromhead = Db::name('user')->where('id', $uid)->field('headimgurl')->find();
        return $fromhead['headimgurl'];
    }

    /**
     * FunctionName: getCountNoRead
     * Description: 获取未读的数量
     * Author: clj
     * @param $fromid
     * @param $toid
     * @return int|string
     */
    protected function getCountNoRead($fromid, $toid)
    {
        return Db::name('communication')->where(['fromid'=>$fromid, 'toid'=>$toid, 'isread'=>0])->count();
    }

    /**
     * FunctionName: getLastMessage
     * Description: 获取最后一条聊天记录
     * Author: clj
     * @param $fromid
     * @param $toid
     * @return array|bool|PDOStatement|string|Model|null
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    protected function getLastMessage($fromid, $toid)
    {
        $info = Db::name('communication')->where('(fromid=:fromid&&toid=:toid)||(fromid=:fromid2&&toid=:toid2)',['fromid'=>$fromid, 'toid'=>$toid, 'fromid2'=>$toid, 'toid2'=>$fromid])->order('id DESC')->limit(1)->find();
        return $info;
    }


    public function get_list()
    {
        if (Request::instance()->isAjax()) {
            $fromid = input('id');
            $info = Db::name('communication')->field(['fromid', 'toid', 'fromname'])->where('toid', $fromid)->group('fromid')->select();
            if (!$info) {
                throw new DataNotFoundException('get_list not found', 'communication');
            }

            $rows = array_map(function ($res) {
               return [
                   'head_url' => $this->get_head_one($res['fromid']),
                   'username' => $res['fromname'],
                   'countNoread' => $this->getCountNoRead($res['fromid'], $res['toid']),
                   'last_message' => $this->getLastMessage($res['fromid'], $res['toid']),
                   'chat_page' => "http://chat2.com/?fromid={$res['toid']}&toid={$res['fromid']}"
               ];
            }, $info);
        }
        return $rows;
    }

    /**
     * FunctionName: getName
     * Description: 根据uid获取用户名
     * Author: clj
     * @param $uid
     * @return mixed
     * @throws DataNotFoundException
     * @throws DbException
     * @throws ModelNotFoundException
     */
    protected function getName($uid)
    {
        $userInfo = Db::name('user')->where('id', $uid)->field('nickname')->find();
        if (empty($userInfo)) {
            throw new DataNotFoundException('userInfo is not found', 'user');
        }
        return $userInfo['nickname'];
    }


}
