<?php

require_once 'interfaces/TaxCalculater.php';

class AramexTaxCalculator implements TaxCalculator
{
    private $tax;

    public function __construct(float $tax)
    {
        $this->tax = $tax;
    }

    public function calculateTax(Address $address): float
    {
        if ($address->getCountry() == 'egypt') {
            return $this->tax + 0.14;
        } elseif ($address->getCountry() == 'kuwait') {
            return $this->tax + 0.1;
        } else {
            // Handle unsupported countries
            return 0;
        }
    }
}
