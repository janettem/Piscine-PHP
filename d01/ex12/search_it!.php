#!/usr/bin/php
<?PHP

foreach ($argv as $key=>$value)
{
    if ($key > 1)
    {
        $array = explode(':', $value);
        if (count($array) == 2 && $argv[1] == $array[0])
            $match = $array[1];
    }
}
if ($match)
    echo "$match\n";

?>
