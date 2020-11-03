<?php

interface ItemInterface
{
    public function setCost(float $cost);
    public function getCost();
}

class Item implements ItemInterface
{
    protected $cost = 0;


    public function setCost(float $cost)
    {
        $this->cost = $cost;
    }

    public function getCost()
    {
        return $this->cost;
    }
}

class Cart
{
    protected $items = [];

    // public function add($item)
    // public function add(Item $item)
    public function add(ItemInterface $item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        // return 0;
        $total = 0;

        foreach ($this->items as $item) {
            $total += $item->getCost();
        }

        return $total; // 25.5
    }
}

$item1 = new Item;
$item1->setCost(5);

$item2 = new Item;
$item2->setCost(20.50);

$cart = new Cart;

$cart->add($item1);
// $cart->add($cart);
// Fatal error: Uncaught Error: Call to undefined method Cart::getCost() in
# when you add Item type to function add
// : Uncaught TypeError: Argument 1 passed to Cart::add() must be an instance of Item, instance of Cart given

$cart->add($item2);

// var_dump($cart);

echo $cart->total();
















/*
class Caculator
{
    protected $total = 0;

    public function add(array $values)
    {
        // if (!is_array($values)) {
        //     return; // or show error here
        // };

        foreach ($values as $value) {
            $this->total += $value;
        }
    }

    public function total()
    {
        return $this->total;
    }
}

$calculator = new Caculator;
// $calculator->add([2, 4, 6]); // 12
// $calculator->add(2); //  Warning: Invalid argument supplied for foreach()
$calculator->add(2); // TypeError: Argument 1 passed to Caculator::add() must be of the type array, int given

echo $calculator->total();
*/