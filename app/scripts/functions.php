<?php

function getInfo($filePath)
{
    $data = [];
    $file = fopen($filePath, "r");
    fgets($file);

    while (!feof($file)) {
        $keys = ['date', 'check', 'transaction', 'sum'];
        $values = array_slice(explode(',', fgets($file)), 0, 4);

        if (count($values) < 3) {
            continue;
        }

        $current_line_data = array_combine($keys, $values);
        array_push($data, $current_line_data);
    }

    fclose($file);
    return array_slice($data, 0, count($data) - 1);
}

function isMoneyNegative($date)
{
    $sum = str_replace('$', '', $date);
    if ($sum < 0) {
        return True;
    }
    return False;
}
