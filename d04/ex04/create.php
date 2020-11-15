<?PHP

$error = "ERROR\n";
if ($_POST["submit"] !== "OK" || $_POST["passwd"] === "")
    exit ($error);
$new_user = array("login"=>$_POST["login"], "passwd"=>hash("whirlpool", $_POST["passwd"]));
if (file_exists("../private/passwd"))
{
    $users = unserialize(file_get_contents("../private/passwd"));
    foreach ($users as $user)
    {
        if ($user["login"] === $new_user["login"])
            exit ($error);
    }
    $users[] = $new_user;
}
else
{
    if (!file_exists("../private"))
        mkdir("../private");
    $users = array($new_user);
}
file_put_contents("../private/passwd", serialize($users)."\n");
header("Location: index.html");
echo "OK\n";

?>
