#!/usr/bin/php
<?PHP

if ($argc > 1)
{
    foreach ($argv as $key=>$value)
    {
        if ($key == 1)
            $array = preg_split("/ +/", $value, -1, PREG_SPLIT_NO_EMPTY);
        else if ($key > 1)
            $array = array_merge($array, preg_split("/ +/", $value, -1, PREG_SPLIT_NO_EMPTY));
    }
    sort($array);
    foreach ($array as $elem)
        echo "$elem\n";
}

?>
