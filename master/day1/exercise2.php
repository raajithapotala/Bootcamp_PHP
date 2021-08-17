<?php

function mask1($phoneNo){
    $maskedNo = "";
    $len = strlen($phoneNo);
    if($len <5){
        return $phoneNo;
    }
    for($i=0;$i<$len;$i++){
        if ($i<"2"|| $i> ($len-3)){
            $maskedNo.= $phoneNo[$i];
        }
        else{
            $maskedNo.= "*";
        }
    }
    return $maskedNo;
}


$phoneNo = "9876543210";
echo mask1($phoneNo);
echo "\n";
echo  mask2($phoneNo);

?>



