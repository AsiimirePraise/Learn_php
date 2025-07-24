<?php

// 4. Put Ingredient class in its own namespace
namespace Food;

// 1. Ingredient class that keeps track of name and cost
class Ingredient
{
    private $name;
    private $cost;

    public function __construct($name, $cost)
    {
        $this->name = $name;
        $this->cost = $cost;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCost()
    {
        return $this->cost;
    }

    // 2. Method to change the cost of an ingredient
    public function setCost($newCost)
    {
        $this->cost = $newCost;
    }
}

// 2. IngredientCost class with method to change cost
class IngredientCost extends Ingredient
{
    public function changeCost($newCost)
    {
        $this->setCost($newCost);
    }
}

// 3. Entree subclass that accepts Ingredient objects and calculates total cost
class Entree
{
    protected $ingredients = [];

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;
    }

    public function getTotalCost()
    {
        $total = 0;
        foreach ($this->ingredients as $ingredient) {
            $total += $ingredient->getCost();
        }
        return $total;
    }

    public function getIngredients()
    {
        return $this->ingredients;
    }
}

// Example usage demonstrating all requirements
echo "=== Ingredient System Demo ===\n\n";

//  ingredients
$tomato = new Ingredient("Tomato", 0.5);
$cheese = new Ingredient("Cheese", 1.0);
$basil = new Ingredient("Basil", 0.2);

// IngredientCost object and change its cost
$oliveOil = new IngredientCost("Olive Oil", 0.8);
echo "Original olive oil cost: $" . $oliveOil->getCost() . "\n";
$oliveOil->changeCost(0.9);
echo "New olive oil cost: $" . $oliveOil->getCost() . "\n\n";

// Create entree and add ingredients
$pasta = new Entree();
$pasta->addIngredient($tomato);
$pasta->addIngredient($cheese);
$pasta->addIngredient($basil);
$pasta->addIngredient($oliveOil);

// Display ingredients and total cost
echo "Pasta ingredients:\n";
foreach ($pasta->getIngredients() as $ingredient) {
    echo "- " . $ingredient->getName() . ": $" . $ingredient->getCost() . "\n";
}
echo "\nTotal cost of pasta: $" . $pasta->getTotalCost() . "\n";

// Demonstrate changing ingredient cost after adding to entree
echo "\n=== Changing ingredient cost ===\n";
$cheese->setCost(1.5);  // Change cheese cost
echo "Updated cheese cost: $" . $cheese->getCost() . "\n";
echo "New total cost of pasta: $" . $pasta->getTotalCost() . "\n";
 