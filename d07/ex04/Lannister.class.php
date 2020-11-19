<?php
class Lannister {
    public function whoAmI() {
        return ("Lannister");
    }

    public function sleepWith($v) {
        if (method_exists($v, "whoAmI"))
            $who = $v->whoAmI();
        else
            $who = "";

        if ($who === "Jaime") {
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
