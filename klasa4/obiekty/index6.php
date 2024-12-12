<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    abstract class C {
        protected $x = 1;
        public function __construct($x) {
            $this->x = $x;
        }

        abstract public function test();
    }

    class D extends C {
        private $y = 1;
        public function __construct($x, $y) {
            parent::__construct($x);
            $this->y = $y;
        }
        public function test() {
            echo "Test z klasy D. x=$this->x y=$this->y<br>";
        }
    }

    abstract class figura {
        abstract public function pole();
        abstract public function obwod();
    }

    class prostokat extends figura {
        private $a;
        private $b;
        public function __construct($a, $b) {
            $this->a = $a;
            $this->b = $b;
        }
        public function pole() {
            return $this->a * $this->b;
        }
        public function obwod() {
            return $this->a *2 + $this->b*2;
        }
        public function __toString() {
            return "Prostokąt -> ".$this->pole()." <== Pole||Obwod ==> ".$this->obwod()."<br>";
        }
    }

    class kwadrat extends prostokat {
        public function __construct($a) {
            parent::__construct($a, $a);
        }
        public function __toString() {
            return "Kwadrat -> ".$this->pole()." <== Pole||Obwod ==> ".$this->obwod()."<br>";
        }
    }

    class Koło extends figura {
        private $r;
        public function __construct($r) {
            $this->r = $r;
        }
        public function obwod() {
            return round((2*pi() * $this->r), 2);
        }

        public function pole() {
            return round((pi() * $this->r**2),2);
        }
        public function __toString() {
            return "Koło -> ".$this->pole()." <== Pole||Obwod ==> ".$this->obwod()."<br>";
        }
    }

    $p = new prostokat(3,4);
    $k = new Koło(10);
    $sq = new kwadrat(4);
    echo $p, $k, $sq;
    ?>
</body>
</html>