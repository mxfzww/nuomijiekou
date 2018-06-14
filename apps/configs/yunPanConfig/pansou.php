<?php

return array(
    'namespace' => "App\\RPCApi::api",
    'param' => [
        'model' => 'BaiduModel',
        'action' => 'httpRun',
        'param' => [
            'like' => "%s",
            "url" => "http://wjsou.com:8080/s2.jsp?q=", //文件搜接口
            "verify" => "http://wjsou.com:8080/apicheck.jsp", //验证接口
        ],
    ],
);
