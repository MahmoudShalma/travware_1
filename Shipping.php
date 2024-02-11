<?php

class Shipping
{
    private $name;
    private $cost;
    private $tax;
    private $taxCalculator;

    public function __construct($name, $cost, $tax, AttributeTaxCalculatorFactory $taxCalculator)
    {
        $this->name = $name;
        $this->cost = $cost;
        $this->tax = $tax;
        $this->taxCalculator = $taxCalculator;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function calculateTax(Address $address)
    {
        try {
            $strategy = $this->taxCalculator->create($this->name, $this->tax);
            return $strategy->calculateTax($address);
        } catch (Exception $e) {
            // Handle exception gracefully
            return 0;
        }
    }
    public function notify($message)
    {
        /**
         * TODO
         * we need to add channel to send notification to shipping company but not now
         */
    }
}
