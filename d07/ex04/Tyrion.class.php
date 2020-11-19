<?php
class Tyrion {
    public function whoAmI() {
        return ("Tyrion");
    }

    public function sleepWith($v) {
        if (method_exists($v, "whoAmI"))
            $who = $v->whoAmI();
        else
            $who = "";

        if ($who === "Lannister" || $who === "Jaime") {
            print("Not even if I'm drunk !".PHP_EOL);
        } else {
            print("Let's do this.".PHP_EOL);
        }

        return;
    }
}
?>
