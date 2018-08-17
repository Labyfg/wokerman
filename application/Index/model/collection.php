<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\8\15 0015
 * Time: 16:40
 */

namespace app\Index\model;

use think\Model;

class collection extends Model
{
    //    添加bj pk10采集信息
    public function addCollection($data)
    {
        $info = $this->getCollectionInfo();
        $info = array_column($info, 'number');
        if (in_array($data['expect'] ,$info))
            return true;
        $params['number'] = $data['expect'];
        $params['openCode'] = $data['opencode'];
        $params['openTime'] = $data['opentime'];
        $params['timeStamp'] = $data['opentimestamp'];
        $params['gameType'] = 1;
        return $this->save($params);
    }

    //    获取采集信息
    public function getCollectionInfo()
    {
        return $this->field('number')->select()->toArray();
    }
}