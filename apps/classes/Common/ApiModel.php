<?php  
namespace App\Common;
use Swoole;  
class ApiModel extends Swoole\Model  
{  
  
    function demo($data)  
    {  
      return $data;  
    }  
}