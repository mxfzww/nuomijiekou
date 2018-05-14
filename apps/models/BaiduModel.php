<?php

namespace App\Model;

use Swoole;
use App\Common\ApiModel;
class BaiduModel extends ApiModel {

    protected $config; //swoole信息
    protected $curl;
    public function __construct(Swoole $swoole, $db_key = 'master') {
        parent::__construct($swoole, $db_key);
    }

    /**
     * 抓取网盘数据
     * @param type $data
     * @return type
     */
    function httpRun($data) {
        $data = file_get_contents($data['url'].$data['like']);
       return $data;
    }
}
