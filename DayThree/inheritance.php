<?php
// Inheritance example
class Animal {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function speak() {
        return "Animal makes a sound";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Bark";
    }
}

class Cat extends Animal {
    public function speak() {
        return "Meow";
    }
}

$dog = new Dog("Buddy");
$cat = new Cat("Whiskers");

echo $dog->name . ": " . $dog->speak() . "<br>";
echo $cat->name . ": " . $cat->speak() . "<br>";



# using constructors in inheritance
class Vehicle {
    public $brand;

    public function __construct($brand) {
        $this->brand = $brand;
    }

    public function displayBrand() {
        return "Vehicle brand: " . $this->brand;
    }
}
class Car extends Vehicle {
    public $model;

    public function __construct($brand, $model) {
        parent::__construct($brand); // Call the parent constructor(the first thing to do in the child constructor)
        $this->model = $model;
    }

    public function displayInfo() {
        return "Car brand: " . $this->brand . ", Model: " . $this->model;
    }
}
$car = new Car("Toyota", "Corolla");
echo $car->displayInfo() . "<br>";
?>