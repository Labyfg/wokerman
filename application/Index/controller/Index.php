<?php
namespace app\index\controller;


use think\Controller;
use app\Index\model\collection;
class Index extends Controller
{
    protected $url = 'http://e.apiplus.net/newly.do?token=e53c3b9e51a1a255&code=bjpk10&format=json';
    public function index()
    {
        return $this->fetch('index');
    }

    public function pk()
    {
        return $this->fetch('Index/pk');
    }

    public function tt()
    {
        $data = Common::sendCurl($this->url);

        // 指明给谁推送，为空表示向所有在线用户推送
        $to_uid = "";
        // 推送的url地址，使用自己的服务器地址
        $push_api_url = "http://127.0.0.1:2121/";
        $post_data = array(
            "type" => "publish",
            "content" => $data,
            "to" => $to_uid,
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        var_export($return);
    }

    public function back()
    {
        // 指明给谁推送，为空表示向所有在线用户推送
        $to_uid = 123;
        // 推送的url地址，使用自己的服务器地址
        $push_api_url = "http://127.0.0.1:2121/";
        $post_data = array(
            "type" => "publish",
            "content" => "下注成功请核对",
            "to" => $to_uid,
        );
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $push_api_url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_data );
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec ( $ch );
        curl_close ( $ch );
        var_export($return);
    }
}
