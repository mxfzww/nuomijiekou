<?php
namespace App\Controller;
use Hoa\Core\Exception\Exception;
use Swoole;
use App; 
use App\RPCClient;  
class Pages extends Swoole\Controller
{
    public function __construct($swoole)  
    {  
        parent::__construct($swoole);  
    }  
  
    public function index()  
    {  
   
        
        $default = [  
            'namespace' => "App\\RPCApi::api",  
            'param' => ['model'=>'Test','action'=>'demo','param'=>['a'=>'bd']],  
        ];  
        //print_r($default);
        
        echo "<pre>";  
        var_dump( RPCClient::api($default));  
        echo "</pre>";  
        
    }  
  
}  
