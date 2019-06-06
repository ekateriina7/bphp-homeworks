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
    
};
function reserveForCompany($seatsNear, $map) {
    $row = count($map);
    $column = count($map[0]);
    for ($i = 0; $i < $row; $i++) {
        $place = 0;
        for ($j = 0; $j < $column; $j++) {
            if ($j > $column - $seatsNear + 1) {
                continue;
            }
            if ($map[$i][$j] == 0) {
                $place = $place + 1;
                if ($place == $seatsNear) {
                    echo 'Доступные места: ряд '. ($i+1) . ',' . ' места с ' . ($j+1 - $seatsNear+1). ' по ' . ($j+1) . '<br></br>';
                    continue;
                }
            } else {
                $place = 0;
            }
               
           
        
        }
   }
}

$chairs = 50;
$map = generate(5, 8, $chairs);
$requireRow = 5;
$requiredPlace = 1;
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
reserveForCompany(4,$map);
?>   