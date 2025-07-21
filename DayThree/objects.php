<?php 
#objects and classes in PHP
// Declare a class for User
class User {
    public $name;
    public $email;

    // Constructor to initialize properties
    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    // Method to display user information
    public function displayInfo() {
        return "Name: $this->name, Email: $this->email";
    }
}

// Declare a class for Product
class Product {
    public $productName;
    public $price;

    // Constructor to initialize properties
    public function __construct($productName, $price) {
        $this->productName = $productName;
        $this->price = $price;
    }

    // Method to display product information
    public function displayInfo() {
        return "Product: $this->productName, Price: $$this->price";
    }
}

# create instances of User and Product
$user = new User("Praise", "praise@gmail.com");
$product = new Product("Sample Product", 19.99);
// Display user and product information
echo $user->displayInfo() . "<br>";
echo $product->displayInfo() . "<br>";


// static method example
class MathOperations {
    public static function add($a, $b) {
        return $a + $b;
    }

    public static function subtract($a, $b) {
        return $a - $b;
    }
}

#calling static methods
echo "Addition: " . MathOperations::add(5, 3) . "<br>";
echo "Subtraction: " . MathOperations::subtract(5, 3) . "<br>";


// more on constructors and destructors
class Car {
    public $brand;
    public $model;

    // Constructor to initialize properties
    public function __construct($brand, $model) {
        $this->brand = $brand;
        $this->model = $model;
        echo "Car created: $this->brand $this->model<br>";
    }

    // Destructor to clean up
    public function __destruct() {
        echo "Car destroyed: $this->brand $this->model<br>";
    }

    // Method to display car information
    public function displayInfo() {
        return "Car: $this->brand, Model: $this->model";
    }
}

#call the Car class
$car = new Car("Toyota", "Corolla");
echo $car->displayInfo() . "<br>";
// Destructor will be called automatically when the script ends or the object is no longer referenced
?>