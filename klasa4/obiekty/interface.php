<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    interface Pływające {
        public function płyń();
    }

    interface latające {
        public function lata();
    }

    class pojazd {
        public function jedz() {
            echo "Pojazd jedzie. <br>";
        }

    }
    class ptak {
        public function oddychaj() {
            echo "Ptak oddycha. <br>";
        }
    }

    class Amfibia extends Pojazd implements Pływające { // jak kilka interface to po przecinku 1, 2, 3
        public function jedz() {
            echo "Amfibia jedzie. <br>";
        }
        public function płyń() {
            echo "Amfibia płynie. <br>";
        }
    }

    class wróbel extends ptak implements latające {
        public function lata() {
            echo "Tym ptakiem jest wróbel więc lata.<br>";
        }
    }

    class pingwin extends ptak implements Pływające {
        public function płyń() {
            echo "Tym ptakiem jest pingwin więc nie lata, ale pływa.<br>";
        }
    }

    class kaczka extends ptak implements Pływające, latające {
        public function płyń() {
            echo "Tym ptakiem jest kaczka, więc pływa.<br>";
        }
        public function lata() {
            echo "Ale kaczka też lata.<br>";
        }
    }

    $a = new Amfibia;
    $a->jedz();
    $a->płyń();
    $b = new wróbel;
    $b->oddychaj();
    $b->lata();
    $c = new pingwin;
    $c->oddychaj();
    $c->płyń();
    $d = new kaczka;
    $d->oddychaj();
    $d->płyń();
    $d->lata();
    
    ?>
</body>
</html>