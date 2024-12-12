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
        static private $num;
        private $id;
        public $x = 0;
        static public $y = 0;
        public function __construct($x, $y) {
            $this->id = self::$num++;
            $this->x = $x;
            self::$y = $y;
        }
        public function __destruct() {
            self::$y--;
        }
        public function __toString() {
            return "A$this->id = (x= $this->x)[liczba instancji: ".self::$y."]<br>"; // self:: --> pokazujemy na dana klasę, this ---> a thisem na obiekt
        }
        static public function fun() {
            echo "(y=".self::$y." )<br>";
        }
    }
    
    //echo A::$y;  // do elementow statycznych nazwa klasy :: $zmienna
    $a = new A(3, 4);
    echo $a;
    $b = new A(5, 2);
    echo $b;
    $c = new A(1, 3);
    echo $a;
    unset($b);
    echo $a;
    
    
    ?>
</body>
</html>