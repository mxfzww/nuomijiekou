<?php
namespace App\Controller;
use Hoa\Core\Exception\Exception;
use Swoole;
use App;
/**[{ content: "QQ表情" }, { content: "博士论文" }, { content: "硕士论文" }, { content: "便民工具" }, { content: "儿童健康" }]
 * 首页关键字
 */
class Firstpage extends Swoole\Controller
{   
    protected  $fistPage = ["QQ表情" ,  "博士论文" ,  "硕士论文" , "便民工具" ,"儿童健康" ];
    
    public function index(){
        return json_encode($this->fistPage);
    }
}