<?php
// Патерн Композит створений для того щоб об'єднувати і укправляти групою класів які схожі між собою. Часто
// метод класу кореня використовує в собі такий же метод як метод об'єктів з похідних класівю

//створення структур в яких групи об'єктів можна використовувати так ніби це окремий об'єкт


error_reporting(E_ALL);
ini_set('display_errors', 1);

abstract class Unit
{
    /**
     * @return mixed
     */
    abstract function bombardStrenghth();
}

abstract class CompositUnit extends Unit
{
    /**
     * @param Unit $unit
     * @return mixed
     */
    abstract function AddUnit(Unit $unit);

    /**
     * @param Unit $unit
     * @return mixed
     */
    abstract function RemoveUnit(Unit $unit);
    //створений для наслідування композитами
}

class Archer extends Unit
{
    /**
     * @return int|mixed
     */
    public function bombardStrenghth()
    {
        return 4;
    }
}

class Laser extends Unit
{
    /**
     * @return int|mixed
     */
    public function bombardStrenghth()
    {
        return 5;
    }
}

class Army extends CompositUnit
{
    /**
     * @var array
     */
    private $units = [];

    /**
     * @var array
     */
    private $armies = [];

    /**
     * @param Unit $unit
     * @return mixed|void
     */
    public function AddUnit(Unit $unit)
    {
        if(in_array($unit, $this->units, true)){
            echo "object already added";
        }
        $this->units[] = $unit;
    }

    /**
     * @param Unit $unit
     * @return mixed|void
     */
    public function RemoveUnit(Unit $unit){
        if(in_array($unit, $this->units, true)){
            unset($unit, $this->units);
        }
    }

    /**
     * @param Unit $army
     */
    public function AddArmy(Unit $army){
        $this->armies[] = $army;
    }

    /**
     * @return int|mixed
     */
    public function bombardStrenghth()
    {
        $power = 0;
        foreach ($this->units as $unit){
            $power = $power + $unit->bombardStrenghth();
        }

        foreach ($this->armies as $army){
            $power = $power + $army->bombardStrenghth();
        }
       return $power;
    }
}

$mainArmy = new Army();
$mainArmy->AddUnit(new Archer());
$object1 = new Laser();
$mainArmy->AddUnit($object1);

$subArmy = new Army();
$subArmy->AddUnit(new Laser());
$subArmy->AddUnit(new Laser());
$subArmy->AddUnit(new Laser());

$mainArmy->AddArmy($subArmy);
var_dump($mainArmy->bombardStrenghth());


?>