<?php
class Tyrion extends Lannister {
	public $name = "My name is Tyrion";
	public $size = "Short";

    public function __construct() {
        parent::__construct();
		print($this->name.PHP_EOL);
		return;
    }

	public function getSize() {
		return ($this->size);
	}
}
?>
