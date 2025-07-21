<?php
// method and property visibility example
class Example { 
    public $publicVar = "I am public";
    protected $protectedVar = "I am protected";
    private $privateVar = "I am private";
    public function getPublicVar() {
        return $this->publicVar;
    }
    protected function getProtectedVar() {
        return $this->protectedVar;
    }
    private function getPrivateVar() {
        return $this->privateVar;
    }
    public function displayVars() {
        echo $this->getPublicVar() . "<br>";
        echo $this->getProtectedVar() . "<br>";
        echo $this->getPrivateVar() . "<br>";
    }
}
$example = new Example();
echo $example->getPublicVar() . "<br>";
// The following lines will cause errors due to visibility restrictions
// echo $example->getProtectedVar(); // Error: Cannot access protected method
// echo $example->getPrivateVar(); // Error: Cannot access private method
$example->displayVars(); // This will work as it is a public method that accesses all variables
echo "<br>";


 class Entree {
 private $name;
 protected $ingredients = array();
 /* Since $name is private, this provides a way to read it */
 public function getName() {
 return $this->name;
 }
 public function __construct($name, $ingredients) {
 if (! is_array($ingredients)) {
 throw new Exception('$ingredients must be an array');
 }
 $this->name = $name;
 $this->ingredients = $ingredients;
 }

 public function getIngredients() {
 return $this->ingredients;
 }
 }

 # call the entree class
 try {
    $entree = new Entree("Pasta", array("Noodles", "Sauce", "Cheese"));

   echo $entree->getName() . "<br>";
   echo implode(", ", $entree->getIngredients()) . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}