<?php
namespace App\Common;

use Hoa\Core\Exception\Exception;
use Swoole;
use App;
use App\RPCClient;

class Api extends Swoole\Controller {

    //用户输入的值
    protected $userInput;
    //状态编码
    protected $code = 200;
    //操作变量
    protected $classData;
    //配置信息
    protected $config;
    //接口权限信息
    protected $interRole;
    //接口错误信息
    protected static $errorCode;

    public function __construct(Swoole $swoole) {

        parent::__construct($swoole);

        $this->getClass(); //获取当前操作

        $this->filtrationUserInput(); //过滤用户信息

        $this->interfaceInformationPath(); //获取配置信息

        $this->interfaceSettiongFile(); //获取权限信息

        $this->interfaceErrorCode(); //错误信息
    }
    /**
     * 当前有无操作 没有直接执行远程操作
     * @param type $func
     * @param type $param
     * @return type
     */
    public function __call($func, $param) {
        $interCodeData = $this->issetInterEroorCode();
        if (!empty($interCodeData)) return $interCodeData;
        if (method_exists($this, $func)) {
            $this->$func($this->userInput);
        } else {
            $this->fillValue();
            $jsonData = $this->_filterData(RPCClient::api($this->config));
            return json_encode($jsonData);
        }
    }

    /**
     * 过滤用户输入的值 待定过滤
     */
    public function filtrationUserInput() {
        $this->userInput = $this->request->get;
    }

    /**
     * 获取接口配置文件路径
     */
    public function interfaceInformationPath() {

        $this->config = include sprintf(WEBPATH . "/apps/configs/yunPanConfig/%s.php", $this->classData);

        if (empty($this->config))
            $this->code = 201; //没有此接口

        return $this->config;
    }

    /**
     * 检测接口信息
     */
    public function issetInterEroorCode() {
        if ($this->code != 200) {
            return $this->json('', $this->code, self::$errorCode[$this->code]);
        }
        return;
    }

    /**
     * 获取接口错误信息配置文件
     */
    public function interfaceErrorCode() {
        self::$errorCode = include WEBPATH . "/apps/configs/configCode.php";
    }

    /**
     * 填充查询数据
     */
    public function fillValue() {
        $this->config['param']['param']['like'] = sprintf($this->config['param']['param']['like'], $this->request->get['name']);
    }

    /**
     * 获取接口权限文件路径
     */
    public function interfaceSettiongFile() {

        $this->interRole = include WEBPATH . "/apps/configs/config.php";
        //print_r($this->interRole);
        if (!in_array($this->classData, explode(",", $this->interRole['interface']))) {

            $this->code = 202; //此接口未开通权限
        }

        return $this->interRole;
    }

    /**
     * 获取当前操作
     * @return type
     */
    public function getClass() {
        $classString = get_class($this);
        $this->classData = strtolower(array_pop(explode("\\", $classString)));
    }

}
