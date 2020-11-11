#!/usr/bin/php
<?PHP

function my_is_int($input)
{
    if ($input[0] == '-')
        return (ctype_digit(substr($input, 1)));
    return (ctype_digit($input));
}

$prompt = "Enter a number: ";
echo $prompt;
while (fscanf(STDIN, "%s", $input))
{
    if (!my_is_int($input))
        echo "'$input' is not a number\n";
    else if ($input % 2)
        echo "The number $input is odd\n";
    else
        echo "The number $input is even\n";
    $input = "";
    echo $prompt;
}
echo "\n";

?>
