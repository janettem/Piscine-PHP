#!/usr/bin/php
<?PHP

function my_is_int($input)
{
    if ($input[0] == '-')
        return (ctype_digit(substr($input, 1)));
    return (ctype_digit($input));
}

if ($argc > 3)
{
    $n1 = str_replace(' ', '', $argv[1]);
    $op = str_replace(' ', '', $argv[2]);
    $n2 = str_replace(' ', '', $argv[3]);
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
    }
}
else
    echo "Incorrect Parameters\n";

?>
