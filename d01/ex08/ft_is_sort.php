<?PHP

function ft_is_sort($array)
{
    $sorted = $array;
    sort($sorted);
    if ($array == $sorted)
        return (true);
    return (false);
}

?>
