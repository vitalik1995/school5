<?php
// Відрізняється від абстрактної фабрики тільки тим що використовує лише один статичний метод для створення обєктів


interface Formater{
    public function sellcar();
}

class Dyller{
    public static function chooseFuel($type)
    {
        if($type == 'electric')
        {
            return new ElectrictDyller();
        }
        if($type == 'gas')
        {
            return new GasDyller();
        }
        else {
            echo "wrong type of fuel k";
        }
    }
}

class ElectrictDyller implements Formater {
    public function sellcar()
    {
        echo "user is redirected to Electrict dyller to buy car";
    }
}

class GasDyller implements Formater {
    public function sellcar()
    {
        return "user is redirected to Gas dyller to buy car";
    }
}

class Test{
    public function toEl(){
        return Dyller::chooseFuel('electric');
    }
    public function toGas(){
        return Dyller::chooseFuel('gas');
    }
}
$car = new Test();
$car1 = $car->toEl();
$car1->sellcar();
?>