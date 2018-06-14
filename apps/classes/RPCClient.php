<?php  
namespace App;  
use Swoole;  
/** 
 * RPC client 接口 
 * 
 * @author 赵巍
 * 
 */  
class RPCClient  
{  
    /** 
     * api 
     * @author赵巍
     * @return json
     */  
    public static function api( array $condition)  
    {    
        if (!$condition['namespace'] || empty($condition['param'])) {  
            return ;  
        }  
        $client = Swoole\Client\RPC::getInstance();  
        $client->auth('zhaowei', 'zhaoweidemima');
        $client->addServers(array('host' => '127.0.0.1', 'port' => 9999));  
        $ret = $client->task($condition['namespace'], [$condition['param']]);
        $client->wait(0.5); 
        unset($client);  
        return  $ret->data;  
    }  
} 
