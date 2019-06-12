<?php
if (($handle = fopen('data.csv', 'r')) !== false) {
    $firstLine = fgetcsv($handle, 1000, ';');
    $name = $firstLine[0];
    $art = $firstLine[1];
    $price = $firstLine[2];
    $json = [];
    while (($data = fgetcsv($handle, 1000, ';')) !== false) {
        
        array_push($json, [
            $name => $data[0],
            $art => $data[1],
            $price => $data[2],
        ]);
    }
    fclose($handle);
}
print json_encode($json, JSON_UNESCAPED_UNICODE);
file_put_contents('data.json', json_encode($json, JSON_UNESCAPED_UNICODE));
?>