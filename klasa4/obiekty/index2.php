<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // zamiast public - private, tylko w danej klasie dziala :)
    class Prostokat {
        private $a = 1;
        private $b = 1;
        public function __construct($a, $b) {
            if($a>0)
                $this->a = $a;
            if($b>0)
                $this->b = $b;
        }
        public function __toString() {
            return "Prostokat[$this->a, $this->b]<br> pole= ".$this->pole()."<br> obwod= ".$this->obwod()."<br> przekatna= ".$this->przekatna() ;
        }
        public function get_a() {
            return $this->a;
        }
        public function get_b() {
            return $this->b;
        }
        public function set_a($a) {
            if ($a>0)
                $this->a = $a;
        }
        public function set_b($b) {
            if($b>0)
                $this->b = $b;
        }
        public function pole() {
            return $this->a * $this->b;
        }
        public function obwod() {
            return $this->a*2 + $this->b*2;
        }
        public function przekatna() {
            return sqrt($this->a**2)+sqrt($this->b**2);
        }
    }
    $p = new Prostokat(3,4);
    echo $p;
    //$p->set_a(6);

    class Trojkat {
        private $b = 1;
        private $a = 1;
        private $c = 1;
        public function __construct($a, $b, $c) {
            if($a+$b>$c && $b+$c>$a && $c+$a>$b){
                $this->a = $a;
                $this->b = $b;
                $this->c = $c;
            }
        }
        public function __toString() {
            return "<br><br>Trojkąt[$this->a, $this->b, $this->c]<br> pole= ".$this->pole()."<br> obwod= ".$this->obwod();
        }
        public function get_a() {
            return $this->a;
        }
        public function get_b() {
            return $this->b;
        }
        public function get_c() {
            return $this->c;
        }
        public function set_a($a) {
            if ($a>0)
                $this->a = $a;
        }
        public function set_b($b) {
            if($b>0)
                $this->b = $b;
        }
        public function set_c($c) {
            if($c>0)
                $this->c = $c;
        }
        public function pole() {
            $p = $this->obwod()/2;
            $a = $this->a;
            $b = $this->b;
            $c = $this->c;
            return sqrt($p*($p-$a)*($p-$b)*($p-$c));
        }
        public function obwod() {
            return $this->a + $this->b +$this->c;
        }
    }
    $t = new Trojkat(4, 5, 6);
    echo $t;
    ?>
</body>
</html>