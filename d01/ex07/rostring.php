#!/usr/bin/php
<?PHP

if ($argc > 1)
{
    if (($array = preg_split("/ +/", $argv[1], -1, PREG_SPLIT_NO_EMPTY)))
    {
        foreach ($array as $key=>$value)
        {
            if ($key > 0)
                echo "$value ";
        }
        echo "$array[0]\n";
    }
}

?>
