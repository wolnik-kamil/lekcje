<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    class Zwierz {
        private $masa = 10;
        public function dajglos() {
            echo "Jestem zwierzem o masie $this->masa kg i daję głos.<br>";
        }

        public function get_masa() {
            return $this->masa;
        }
        public function __construct($masa) {
            $this->masa = $masa;
        }
    }

    class Pies extends Zwierz {
        public $rasa = "kundel";
        public function dajglos() {
            echo "Jestem psem rasy $this->rasa o masie ". $this->get_masa() ."kg i szczekam.<br>";
        }
        public function __construct($masa, $rasa) {
            $this->rasa = $rasa;
            parent::__construct($masa); //bo inaczej sie zapisauje masa = 10
        }
    }

    class kot extends Zwierz  {
        private $rasa = "dachowiec";
        private $wiek = 0;
        public function dajglos() {
            echo "Jestem kotem rasy $this->rasa o masie ". $this->get_masa() ."kg, który ma $this->wiek lat i mrukam.<br>";
        }
        public function __construct($masa, $rasa, $wiek) {
            $this->rasa = $rasa;
            $this->wiek = $wiek;
            parent::__construct($masa); //bo inaczej sie zapisauje masa = 10
        }
    
    }
    
    $a = [];
    $a[] = new Zwierz(15);
    $a[] = new Pies(20, "husky");
    $a[] = new kot(6, "sfinks", 4);

    foreach ($a as $zwierze) {
        $zwierze->dajglos();
    }
    ?>
</body>
</html>