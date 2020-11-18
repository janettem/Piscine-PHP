<?php
Class Color {
    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = FALSE;

    public static function doc() {
        return (file_get_contents("Color.doc.txt"));
    }

    public function add(Color $rhs) {
        return (new Color(array(
            "red" => $this->red + $rhs->red,
            "green" => $this->green + $rhs->green,
            "blue" => $this->blue + $rhs->blue)));
    }

    public function sub(Color $rhs) {
        return (new Color(array(
            "red" => $this->red - $rhs->red,
            "green" => $this->green - $rhs->green,
            "blue" => $this->blue - $rhs->blue)));
    }

    public function mult($f) {
        return (new Color(array(
            "red" => $this->red * $f,
            "green" => $this->green * $f,
            "blue" => $this->blue * $f)));
    }

    public function __construct(array $kwargs) {
        if (array_key_exists("rgb", $kwargs)) {
            $this->red = (int)$kwargs["rgb"] & (int)0xFF;
            $this->green = ((int)$kwargs["rgb"] & (int)0xFF00) >> 8;
            $this->blue = ((int)$kwargs["rgb"] & (int)0xFF0000) >> 16;
        } else if (array_key_exists("red", $kwargs) &&
        array_key_exists("green", $kwargs) &&
        array_key_exists("blue", $kwargs)) {
            $this->red = (int)$kwargs["red"];
            $this->green = (int)$kwargs["green"];
            $this->blue = (int)$kwargs["blue"];
        }

        if (self::$verbose === TRUE) {
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.".PHP_EOL, $this->red, $this->green, $this->blue);
        }

        return;
    }

    public function __destruct() {
        if (self::$verbose === TRUE) {
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.".PHP_EOL, $this->red, $this->green, $this->blue);
        }

        return;
    }

    public function __toString() {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }
}
?>
