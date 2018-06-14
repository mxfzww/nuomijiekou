<?php

return array(
    'namespace' => "App\\RPCApi::api",
    'param' => [
        'model' => 'BaiduModel',
        'action' => 'httpRun',
        'param' => [
            'like' => "%s",
            "url" => "http://pan.here325.com/s?q=", //文件搜接口
            "verify" => "http://wjsou.com:8080/apicheck.jsp", //验证接口
        ],
    ],
);
