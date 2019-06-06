<?php
function generate($rows, $placesPerRow, $avaliableCount) {
    $seats = [];
    for($i = 0; $i < $rows; $i++){
        for($j = 0; $j < $placesPerRow; $j++) {
            $seats[$i][$j] = false;
        } 
    }
    if ($rows * $placesPerRow > $avaliableCount) {
        return false;
    } else {
        return $seats;
    }
};
function reserve(&$map, $row, $place) {
    if($map[$row - 1][$place - 1] === false) {
        $map[$row - 1][$place - 1] = true;
        return true;
    } else {
        return false;
    }
    
}

$chairs = 50;
$map = generate(5, 8, $chairs);
$requireRow = 3;
$requiredPlace = 5;
$reverve = reserve($map, $requireRow, $requiredPlace);
logReserve($requireRow, $requiredPlace, $reverve);
$reverve = reserve($map, $requireRow, $requiredPlace);
logReserve($requireRow, $requiredPlace, $reverve);
function logReserve($row, $place, $result){
    if ($result) {
        echo "Ваше место забронировано! Ряд $row, место $place".PHP_EOL;
    } else {
        echo "Что-то пошло не так=( Бронь не удалась".PHP_EOL;
    }
}
?>