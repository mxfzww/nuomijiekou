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
    public static function api(array $condition) {
        $default = [
            //model名字  
            'model' => '',
            //方法名  
            'action' => '',
            //参数  
            'param' => [],
        ];
       // return 
        $condition = array_merge($default, $condition);
        if (!$condition['model']) {
            return "Error Model Not Found ";
        }
        if (!$condition['action']) {
            return "Error Action Not Found ";
        }
        $action = $condition['action'];
        if ($condition['param']) {
            return model($condition['model'])->$action($condition['param']);
        }
        return model($condition['model'])->$action();
    }

}
