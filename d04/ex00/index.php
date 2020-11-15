<?PHP

session_start();
if ($_GET["submit"] === "OK")
    $_SESSION["login"] = $_GET["login"];
if ($_GET["submit"] === "OK")
    $_SESSION["passwd"] = $_GET["passwd"];
echo "<html><body>\n<form action=\"index.php\">\n";
echo "   Username: <input type=\"text\" name=\"login\" value=\"".$_SESSION["login"]."\" />\n";
echo "   <br />\n";
echo "   Password: <input type=\"password\" name=\"passwd\" value=\"".$_SESSION["passwd"]."\" />\n";
echo "   <input type=\"submit\" name=\"submit\" value=\"OK\" />\n";
echo "</form>\n</body></html>\n";

?>
