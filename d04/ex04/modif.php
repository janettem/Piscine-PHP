<?PHP

$error = "ERROR\n";
if ($_POST["submit"] !== "OK" || $_POST["newpw"] === "")
    exit ($error);
$modif_user = array("login"=>$_POST["login"], "passwd"=>hash("whirlpool", $_POST["oldpw"]));
$users = unserialize(file_get_contents("../private/passwd"));
foreach ($users as $key=>$user)
{
    if ($user["login"] === $modif_user["login"] && $user["passwd"] === $modif_user["passwd"])
    {
        $users[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
        file_put_contents("../private/passwd", serialize($users)."\n");
        header("Location: index.html");
        exit ("OK\n");
    }
}
echo $error;

?>
