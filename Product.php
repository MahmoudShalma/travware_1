<?php

class Product
{
    private $name;
    private $quantity;
    private $category;
    private $attributes;
    private $price;

    public function __construct($name, $quantity, $category, $attributes, $price)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->category = $category;
        $this->attributes = $attributes;
        $this->price = $price;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function calculatePrice()
    {
        foreach ($this->attributes as $key => $attribute) {
            $strategy = AttributePriceStrategyFactory::create($key, $attribute);
            $this->price += $strategy->calculatePrice();
        }
        return $this->price;
    }
}
