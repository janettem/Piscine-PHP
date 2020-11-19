<?php
class NightsWatch implements IFighter {
    public function fight() {
        return;
    }

    public function recruit($v) {
        if ($v instanceof IFighter) {
            $v->fight();
        }

        return;
    }
}
?>
