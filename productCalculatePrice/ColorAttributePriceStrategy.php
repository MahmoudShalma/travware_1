<?php

require_once 'interfaces/AttributePriceStrategy.php';

class ColorAttributePriceStrategy implements AttributePriceStrategy
{
    private $attribute;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function calculatePrice(): int
    {
        switch ($this->attribute) {
            case 'white':
                return -15;
            case 'red':
                return 20;
            case 'blue':
                return 18;
            default:
                throw new Exception("Error in color");
        }
    }
}
