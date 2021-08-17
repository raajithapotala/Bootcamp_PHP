<?php
//Solution 1
function mask1($phoneNo){
    $maskedNo = "";
    for($i=0;$i<strlen($phoneNo);$i++){
        if ($i<"2"|| $i>"7"){
            $maskedNo.= $phoneNo[$i];
        }
        else{
            $maskedNo.= "*";
        }
    }
    return $maskedNo;
}

//Efficient Solution
function mask2($phoneNo){
    $maskedNum = $phoneNo[0].$phoneNo[1]."******".$phoneNo[8].$phoneNo[9];
    return $maskedNum;
}

$phoneNo = "9876543210";
echo mask1($phoneNo);
echo "\n";
echo  mask2($phoneNo);

?>



