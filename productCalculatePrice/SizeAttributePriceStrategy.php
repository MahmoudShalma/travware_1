<?php

require_once 'interfaces/AttributePriceStrategy.php';

class SizeAttributePriceStrategy implements AttributePriceStrategy
{
    private $attribute;

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
    }

    public function calculatePrice(): int
    {
        switch ($this->attribute) {
            case 'small':
                return -10;
            case 'medium':
                return 20;
            case 'large':
                return 50;
            default:
                throw new Exception("Error in size");
        }
    }
}
