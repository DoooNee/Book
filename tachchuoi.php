<?php
// $str = "MBVCB.3226939621.069088.NAPDL trongphuctrade@gmail.com 0363771361";
//$str = 'MBVCB.3229673818.063118.NAPDL hoangngoctiep1994 0363771361.CT tu 0451000240040 NGUYEN QUANG HUY toi 31072787';

$str = 'NAPDL ninjago 0363771361 GD 669713-031423 22:13:25';

$chuoicodinh = "NAPDL ";


sliceUsername($str, $chuoicodinh);


function sliceUsername($ss, $codinh){

    //$str = "Hello, world!";
    $start = strpos($ss, $codinh) + strlen($codinh);
    $result = substr($ss, $start);
    // echo $result; // Output: "!" 
    
    $first_space_position = strpos($result, ' ');
    $substring = substr($result, 0, $first_space_position);
    // echo $first_space_position;
    echo $substring;
}


function findDaiLy($input) {
    if (strpos($input, 'daily1') !== false) {
        return 'daily1';
    }
    if (strpos($input, 'daily2') !== false) {
        return 'daily2';
    }
}
