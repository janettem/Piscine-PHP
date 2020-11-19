<?php
abstract class Fighter extends UnholyFactory {
    abstract public function fight($target);

    public function __construct($v) {
        $this->_type = $v;

        return;
    }
}
?>
