<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    class A {
        protected $x;
        public function __construct($x) {
            $this->x = $x;
        }

        public function __toString() {
            return "[$this->x]<br>";
        }
        final public function test() {
            echo "TEST Z KLASY A <br>";
        }
    }

    class B extends A {
        private $y;
        public function __construct($x, $y) {
            $this->x = $x;
            $this->y = $y;
        }
        public function __toString() {
            return "[$this->x,$this->y]";
        }
        public function test() {
            echo "Test z klasy B <br>";
        }
    }

    $b = new B(5,6);
    $b->test();

    ?>
    
</body>
</html>