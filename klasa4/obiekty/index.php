<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        // class Pies {
        //     public $imie;
        //     public $rasa;
        //     public function __construct($imie, $rasa) {
        //         $this->imie = $imie;
        //         $this->rasa = $rasa;
        //     }
        //     public function __destruct() {
        //         echo "Usuwam obiekt z klasy Pies: $this->imie<br>";
        //     }
        //     public function __toString() {
        //         return "{ $this->imie rasy $this->rasa }<br>";
        //     }
        //     public function szczekaj($pies2) {
        //         echo "Whoof whoof, whoof whoof na $pies2->imie! Jestem $this->imie, rasy $this->rasa.<br>";
        //     }
        // }
        // $p = new Pies("Bartek", "Chihuahua");
        // $p2 = new Pies("Bartek Czech", "Kundel");
        
        // $p2->szczekaj($p);
        // $p->szczekaj($p2);
        // echo $p;

        // $p3 = $p;
        // $p =5;

        class Auto {
            public $przebieg = 0;
            public $marka;
            public $model;
            public function __construct($marka, $model) {
                $this->marka = $marka;
                $this->model = $model;
            }
            public function __destruct() {
                echo "Usuwam obiekt z klasy Auto: $this->marka, $this->model<br>";
            }
            public function __toString() {
                return "{ Marka: $this->marka, model: $this->model, $this->przebieg km przebiegu. }<br>";
            }
            public function jedz($ile) {
                $this->przebieg += $ile;
            }
        }
        $s1 = new Auto ("BMW","e92");
        $s1->jedz(20);
        $s1->jedz(30);
        echo $s1;
        $s2 = new Auto ("BMW","e90");
        $s2->jedz(1244);
        $s3 = new Auto ("Audi","Q7");
        echo $s2, $s3;
    ?>
</body>
</html>