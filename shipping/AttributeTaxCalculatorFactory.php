<?php
require_once 'interfaces/TaxCalculater.php';
require_once 'AramexTaxCalculator.php';
require_once 'FudexTaxCalculator.php';

class AttributeTaxCalculatorFactory
{
    public static function create($address,$tax): TaxCalculator
    {
        switch ($address) {
            case 'aramex':
                return new AramexTaxCalculator($tax); // Tax rate should be passed here
            case 'fudex':
                return new FedexTaxCalculator($tax); // Tax rate should be passed here
            default:
                throw new Exception("Error in address");
        }
    }
}
