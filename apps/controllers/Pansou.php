<?php

namespace App\Controller;

use App\Common\Api;

class Wangpan extends Api {

    /**
     * 过滤数据1111
     */
    public function _filterData($data) {
        preg_match_all("/<a .*? class='fname' target='_blank' .*?>.*?<\/a>/", $data, $aarray);
        $reg2 = "/href=([^\s>]+)/";
        $arr = array();
        for ($i = 0; $i < count($aarray[0]); $i++) {

            preg_match_all($reg2, $aarray[0][$i], $hrefarray);

            $arr[$i]['url'] = $hrefarray[1][0];
            $reg3 = "/>(.*)<\/a>/";
            preg_match_all($reg3, $aarray[0][$i], $acontent);
            //$str=htmlspecialchars($str);
            $arr[$i]['name'] = strip_tags($acontent[1][0]);
        }
        $resData['List'] = $arr;
        $resData['total'] = count($arr);

        return $resData;
    }

}
