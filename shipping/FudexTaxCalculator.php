<?php

require_once 'interfaces/TaxCalculater.php';

class FedexTaxCalculator implements TaxCalculator
{
    private $tax;

    public function __construct(float $tax)
    {
        $this->tax = $tax;
    }

    public function calculateTax(Address $address): float
    {
        if ($address->getCountry() == 'egypt') {
            return $this->tax + 0.20;
        } elseif ($address->getCountry() == 'kuwait') {
            return $this->tax + 0.13;
        }

        return 0.0;
    }
}
