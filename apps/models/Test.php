<?php  
namespace App\Model;  
use Swoole;  
  
class Test extends Swoole\Model  
{  
  
    /** 
     * 表名 
     * @var string 
     */  
    public $table = 'a';  
  
    function demo($data)  
    {  
      return $data;  
  
    }  
}