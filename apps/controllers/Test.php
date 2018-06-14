<?php

namespace App\Controller;

use Hoa\Core\Exception\Exception;
use Swoole;
use App;
use App\RPCClient;

class Test extends Swoole\Controller {

    public function __construct($swoole) {
        parent::__construct($swoole);
    }

    public function index() {
        $object = model('Users');
        $data = table('swoole_test')->all();
        //print_r($data);
        $this->assign('data',$data);
        $this->display('page/index.php');
        //print_r($data->user);
    }

}
