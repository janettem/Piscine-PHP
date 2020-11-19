<?php
class Jaime {
    public function whoAmI() {
        return ("Jaime");
    }

    public function sleepWith($v) {
        if (method_exists($v, "whoAmI"))
            $who = $v->whoAmI();
        else
            $who = "";

        if ($who === "Lannister") {
            print("With pleasure, but only in a tower in Winterfell, then.".PHP_EOL);
        } else if ($who === "Tyrion") {
            print("Not even if I'm drunk !".PHP_EOL);
        } else {
            print("Let's do this.".PHP_EOL);
        }

        return;
    }
}
?>
