<?PHP

if (file_exists("../private/chat"))
{
    $fd = fopen("../private/chat", "r+");
    if (flock($fd, LOCK_EX))
    {
        $chat = unserialize(file_get_contents("../private/chat"));
        date_default_timezone_set("Europe/Helsinki");
        foreach ($chat as $msg)
            echo "[".date("H:i", $msg["time"])."] <b>".$msg["login"]."</b>: ".$msg["msg"]."<br />\n";
        flock($fd, LOCK_UN);
        fclose($fd);
    }
}

?>
