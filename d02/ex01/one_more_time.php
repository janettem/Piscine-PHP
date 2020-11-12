#!/usr/bin/php
<?PHP

function is_month($input, &$month)
{
    $input = ucfirst($input);
    if ($input === "Janvier")
        $month = "01";
    else if ($input === "Février")
        $month = "02";
    else if ($input === "Mars")
        $month = "03";
    else if ($input === "Avril")
        $month = "04";
    else if ($input === "Mai")
        $month = "05";
    else if ($input === "Juin")
        $month = "06";
    else if ($input === "Juillet")
        $month = "07";
    else if ($input === "Aout")
        $month = "08";
    else if ($input === "Septembre")
        $month = "09";
    else if ($input === "Octobre")
        $month = "10";
    else if ($input === "Novembre")
        $month = "11";
    else if ($input === "Décembre")
        $month = "12";
    else 
        return (FALSE);
    return (TRUE);
}

function my_is_int($input)
{
    if ($input[0] == '-')
        return (ctype_digit(substr($input, 1)));
    return (ctype_digit($input));
}

function is_valid_nbr($input, $len_min, $len_max, $val_min, $val_max, &$nbr)
{
    if (my_is_int($input) && ($len = strlen($input)) >= $len_min && $len <= $len_max &&
    $input >= $val_min && $input <= $val_max)
    {
        if ($len == 1)
            $nbr = "0".$input;
        else
            $nbr = $input;
        return (TRUE);
    }
    return (FALSE);
}

function is_weekday($input)
{
    $input = ucfirst($input);
    if ($input === "Lundi" || $input === "Mardi" || $input === "Mercredi" ||
    $input === "Jeudi" || $input === "Vendredi" || $input === "Samedi" ||
    $input === "Dimanche")
        return (TRUE);
    return (FALSE);
}

if ($argc > 1)
{
    $input = explode(" ", $argv[1]);
    $time = explode(":", $input[4]);
    if (count($input) != 5 || count($time) != 3 || !is_weekday($input[0]) ||
    !is_valid_nbr($input[1], 1, 2, 1, 31, $day) || !is_month($input[2], $month) ||
    !is_valid_nbr($input[3], 4, 4, 0000, 9999, $year) || !is_valid_nbr($time[0], 2, 2, 0, 23, $hour) ||
    !is_valid_nbr($time[1], 2, 2, 0, 59, $minute) || !is_valid_nbr($time[2], 2, 2, 0, 59, $second))
        echo "Wrong Format\n";
    else
    {
        $date = $year."-".$month."-".$day." ".$hour.":".$minute.":".$second;
        $date_diff = strtotime($date) - strtotime("1970-01-01 00:00:00") - 3600;
        echo "$date_diff\n";
    }
}

?>
