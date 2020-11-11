#!/usr/bin/php
<?PHP

function is_digit($c)
{
    if ($c >= '0' && $c <= '9')
        return (true);
    return (false);
}

function is_letter($c)
{
    if (($c >= 'A' && $c <= 'Z') || ($c >= 'a' && $c <= 'z'))
        return (true);
    return (false);
}

function is_other($c)
{
    if (!is_letter($c) && !is_digit($c))
        return (true);
    return (false);
}

function are_same($a, $b)
{
    if ((is_letter($a) && is_letter($b)) || (is_digit($a) && is_digit($b)) ||
    (is_other($a) && is_other($b)))
        return (true);
    return (false);
}

function my_sort($a_orig, $b_orig)
{
    $a = strtoupper($a_orig);
    $b = strtoupper($b_orig);
    $len_a = strlen($a);
    $len_b = strlen($b);
    $i = 0;
    while ($i < $len_a && $i < $len_b)
    {
        if ((is_letter($a[$i]) && !is_letter($b[$i])) ||
        (is_digit($a[$i]) && is_other($b[$i])) ||
        (are_same($a[$i], $b[$i]) && $a[$i] < $b[$i]))
            return (-1);
        if ((is_letter($b[$i]) && !is_letter($a[$i])) ||
        (is_digit($b[$i]) && is_other($a[$i])) ||
        (are_same($b[$i], $a[$i]) && $b[$i] < $a[$i]))
            return (1);
        $i++;
    }
    if ($i > $len_a)
        return (-1);
    if ($i > $len_b)
        return (1);
    return (0);
}

if ($argc > 1)
{
    foreach ($argv as $key=>$value)
    {
        if ($key == 1)
            $array = preg_split("/ +/", $value, -1, PREG_SPLIT_NO_EMPTY);
        else if ($key > 1)
            $array = array_merge($array, preg_split("/ +/", $value, -1, PREG_SPLIT_NO_EMPTY));
    }
    usort($array, "my_sort");
    foreach ($array as $elem)
        echo "$elem\n";
}

?>
