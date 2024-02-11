<?php
require_once 'interfaces/AttributePriceStrategy.php';
require_once 'ColorAttributePriceStrategy.php';
require_once 'SizeAttributePriceStrategy.php';

class AttributePriceStrategyFactory
{
    public static function create($key, $attribute): AttributePriceStrategy
    {
        switch ($key) {
            case 'size':
                return new SizeAttributePriceStrategy($attribute);
            case 'color':
                return new ColorAttributePriceStrategy($attribute);
            default:
                throw new Exception("Error in attribute");
        }
    }
}
