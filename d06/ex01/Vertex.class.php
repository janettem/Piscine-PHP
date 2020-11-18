<?php
Class Vertex {
    private $_x = 0.0;
    private $_y = 0.0;
    private $_z = 0.0;
    private $_w = 1.0;
    private $_color = 0;

    public static $verbose = FALSE;

    public static function doc() {
        return (file_get_contents("Vertex.doc.txt"));
    }

    public function getX() {
        return ($this->_x);
    }

    public function setX($v) {
        $this->_x = $v;

        return;
    }

    public function getY() {
        return ($this->_y);
    }

    public function setY($v) {
        $this->_y = $v;

        return;
    }

    public function getZ() {
        return ($this->_z);
    }

    public function setZ($v) {
        $this->_z = $v;

        return;
    }

    public function getW() {
        return ($this->_w);
    }

    public function setW($v) {
        $this->_w = $v;

        return;
    }

    public function getColor() {
        return ($this->_Color);
    }

    public function setColor($v) {
        $this->_Color = $v;
        return;
    }

    public function __construct(array $kwargs) {
        $this->setColor(new Color(array(
            "red" => 255,
            "green" => 255,
            "blue" => 255)));
        if (array_key_exists("x", $kwargs) &&
        array_key_exists("y", $kwargs) &&
        array_key_exists("z", $kwargs)) {
            $this->setX($kwargs["x"]);
            $this->setY($kwargs["y"]);
            $this->setZ($kwargs["z"]);
            if (array_key_exists("w", $kwargs)) {
                $this->setW($kwargs["w"]);
            }
            if (array_key_exists("color", $kwargs))  {
                $this->setColor($kwargs["color"]);
            }
        }

        if (self::$verbose === TRUE) {
            printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) constructed".PHP_EOL,
            $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
        }

        return;
    }

    public function __destruct() {
        if (self::$verbose === TRUE) {
            printf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s ) destructed".PHP_EOL,
            $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor());
        }

        return;
    }

    public function __toString() {
        if (self::$verbose === TRUE) {
            return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )",
            $this->getX(), $this->getY(), $this->getZ(), $this->getW(), $this->getColor()));
        }
        return (sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )",
        $this->getX(), $this->getY(), $this->getZ(), $this->getW()));
    }
}
?>
