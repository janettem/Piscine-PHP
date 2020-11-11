#!/usr/bin/php
<?PHP

function my_is_int($input)
{
    if ($input[0] == '-')
        return (ctype_digit(substr($input, 1)));
    return (ctype_digit($input));
}

function is_valid_count($array, &$n1, &$op, &$n2)
{
    $count = count($array);
    if ($count == 4 && $array[0] == "-" && my_is_int($array[1]))
    {
        $n1 = "-".$array[1];
        $op = $array[2];
        $n2 = $array[3];
        return (true);
    }
    else if ($count == 4 && $array[2] == "-" && my_is_int($array[3]))
    {
        $n1 = $array[0];
        $op = $array[1];
        $n2 = "-".$array[3];
        return (true);
    }
    else if ($count == 5 && $array[0] == "-" && my_is_int($array[1]) &&
    $array[3] == "-" && my_is_int($array[4]))
    {
        $n1 = "-".$array[1];
        $op = $array[2];
        $n2 = "-".$array[4];
        return (true);
    }
    else if ($count == 3)
    {
        $n1 = $array[0];
        $op = $array[1];
        $n2 = $array[2];
        return (true);
    }
    return (false);
}

if ($argc > 1)
{
    $syntax_error = "Syntax Error\n";
    $str = str_replace(' ', '', $argv[1]);
    $array = preg_split("/(\+|-|\*|\/|%)/", $str, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    if (is_valid_count($array, $n1, $op, $n2))
    {
        if (my_is_int($n1) && my_is_int($n2))
        {
            if ($op == "+")
                echo $n1 + $n2."\n";
            else if ($op == "-")
                echo $n1 - $n2."\n";
            else if ($op == "*")
                    echo $n1 * $n2."\n";
            else if ($op == "/")
            {
                if ($n2 == 0)
                    echo "0\n";
                else
                    echo $n1 / $n2."\n";
            }
            else if ($op == "%")
            {
                if ($n2 == 0)
                    echo "0\n";
                else
                    echo $n1 % $n2."\n";
            }
            else
                echo $syntax_error;
        }
        else
            echo $syntax_error;
    }
    else
        echo $syntax_error;
}
else
    echo "Incorrect Parameters\n";

?>
