<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\15 0015
 * Time: 17:05
 */

namespace app\Index\controller;


use think\Controller;

class Common extends Controller
{
    //    发送请求
    public static function sendCurl($url)
    {
        //初始化一个 cURL 对象
        $ch  = curl_init();
        //设置你需要抓取的URL
        curl_setopt($ch, CURLOPT_URL, $url);
        // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //是否获得跳转后的页面
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}