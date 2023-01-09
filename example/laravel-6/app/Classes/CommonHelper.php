<?php
namespace App\Classes;

class CommonHelper {

    public function setOptionsToQuestion(&$array){
        foreach($array as &$a){
            $arr = explode('|', $a['options']);
            shuffle($arr);
            $arr = '[  ] ' . implode('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[    ] ', $arr);
            $a['options'] = $arr;
        }
        return $array;        
    }
}
