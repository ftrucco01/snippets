<?php
$arr = array(5, 4, 3, 2, 1, 8);
var_dump(_sort($arr));

function _sort(array $arr){
    for($i = 1; $i < count($arr); $i++){
        for($j = 0; $j < count($arr) - $i; $j++){
            if($arr[$j] > $arr[$j+1]){
                $aux = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $aux;
            }
        }
    }
    return $arr;
}