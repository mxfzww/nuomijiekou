<?php

namespace App;

/**
 * RPC Server 接口 
 * 
 * @author 赵巍
 * @return void 
 * @throws Exception 
 * 
 */
class RPCApi {

    /**
     * 暂无说明 
     * 
     * @author 赵巍
     * @return void 
     * @throws Exception 
     * @access public 
     */
    public static function api(array $parm) {
        //判断方法
        if (!$parm['action']) {
            return "action not found";
        }
        //判断model
        if (!$parm['model']) {
            return "model not found";
        }

        $action = $parm['action'];
        if ($parm['param']) {
            return model($parm['model'])->$action($parm['param']);
        }
        return model($parm['model'])->$action();
    }

}
