<?php

//Function to convert to camelCase
function camelCase($arr){
    $res = array();
    foreach($arr as $str){
        $brk= explode("_",$str);
        $newstr = $brk[0].ucwords($brk[1]);
        array_push($res,$newstr);
    }
    return $res;
}

$arr = ["snake_case", "camel_case"];
print_r(camelCase($arr));
?>