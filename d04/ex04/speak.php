<?PHP

session_start();
if (isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] !== "")
{
    echo "<html>\n<head>\n<script language=\"javascript\">top.frames['chat'].location = 'chat.php';</script>\n</head>\n";
    echo "<body>\n<form action=\"speak.php\" method=\"post\">\n";
    echo "Message: <input type=\"text\" name=\"msg\" value=\"".$_POST["msg"]."\" />\n";
    echo "<input type=\"submit\" name=\"submit\" value=\"OK\" />\n";
    echo "</form>\n</body>\n</html>\n";
    if ($_POST["submit"] === "OK")
    {
        $msg = array("login"=>$_SESSION["loggued_on_user"], "time"=>time(), "msg"=>$_POST["msg"]);
        if (file_exists("../private/chat"))
        {
            $fd = fopen("../private/chat", "r+");
            if (flock($fd, LOCK_EX))
            {
                $chat = unserialize(file_get_contents("../private/chat"));
                $chat[] = $msg;
                file_put_contents("../private/chat", serialize($chat)."\n");
                flock($fd, LOCK_UN);
                fclose($fd);
            }
        }
        else
        {
            if (!file_exists("../private"))
                mkdir("../private");
            $chat = array($msg);
            file_put_contents("../private/chat", serialize($chat)."\n");
        }
    }
}
else
    echo "ERROR\n";

?>
