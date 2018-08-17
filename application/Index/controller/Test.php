<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\16 0016
 * Time: 9:41
 */

namespace app\index\controller;
use GatewayWorker\Lib\Gateway;

class Test
{
    protected  $userId = 1;
    protected  $groupId = 1;
    protected $url = 'http://e.apiplus.net/newly.do?token=e53c3b9e51a1a255&code=bjpk10&format=json';
    public function test()
    {
        // 设置GatewayWorker服务的Register服务ip和端口，请根据实际情况改成实际值
        Gateway::$registerAddress = '127.0.0.1:1238';
        $uid = $this->userId;
        $group_id = $this->groupId;
        $client_id = request()->param('client_id');
        // client_id与uid绑定
        Gateway::bindUid($client_id, $uid);
        // 加入某个群组（可调用多次加入多个群组）
        Gateway::joinGroup($client_id, $group_id);

    }
}