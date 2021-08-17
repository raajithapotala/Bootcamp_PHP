<?php
//Function to flatten the array
function arrayFlatten($arr){
    $res = array();
    foreach ($arr as $value){
        if(!is_array($value)){
            array_push($res,$value);
        }
        else{
            foreach($value as $num){
                $new = arrayFlatten($value);
                $res = array_merge($res,$new);
            }
        }
    }
    return $res;
}

$arr =  [2, 3, [4,5], [6,7], 8];
print_r(arrayFlatten($arr));

?>