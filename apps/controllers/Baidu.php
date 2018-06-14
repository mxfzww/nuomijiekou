<?php

namespace App\Controller;

use App\Common\Api;

class Baidu extends Api {
    
    /**
     * 过滤数据
     * 盘搜过滤
     */
    public function _filterData($data) {
        preg_match_all("/<a class=\"item-title\" .* title=\".*?\"?>.*?<\/a>/", $data, $aarray);
        $reg2 = "/href=\"([^\s>]+)\"/";
        $arr = array();
        //print_r($aarray);
        for ($i = 0; $i < count($aarray[0]); $i++) {
            preg_match_all($reg2, $aarray[0][$i], $hrefarray);
            $arr[$i]['url'] = str_replace("\/", "//", $hrefarray[1][0]);
            $reg3 = "/>(.*)<\/a>/";
            preg_match_all($reg3, $aarray[0][$i], $acontent);
            $arr[$i]['name'] = mb_substr(strip_tags($acontent[1][0]),0,30);
        }
        //print_r($arr);return;
        unset($arr[0]);
        $resData['List'] = $arr;
        $resData['total'] = count($arr);

        return $resData;
    }

}
