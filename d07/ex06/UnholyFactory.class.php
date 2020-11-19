<?php
include_once("Fighter.class.php");

class UnholyFactory {
    protected $_type = "";
    private $_fighter = array();

    public function absorb($v) {
        $parentClass = get_parent_class($v);
        if ($parentClass === "Fighter" &&
        !array_key_exists($v->_type, $this->_fighter)) {
            $this->_fighter[$v->_type] = $v;
            print("(Factory absorbed a fighter of type ".$v->_type.")".PHP_EOL);
        } else if ($parentClass === "Fighter") {
            print("(Factory already absorbed a fighter of type ".$v->_type.")".PHP_EOL);
        } else {
            print("(Factory can't absorb this, it's not a fighter)".PHP_EOL);
        }

        return;
    }

    public function fabricate($v) {
        if (array_key_exists($v, $this->_fighter)) {
            print("(Factory fabricates a fighter of type ".$v.")".PHP_EOL);
            return ($this->_fighter[$v]);
        }
        print("(Factory hasn't absorbed any fighter of type ".$v.")".PHP_EOL);

        return (NULL);
    }
}
?>
