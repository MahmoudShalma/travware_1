<?php

interface TaxCalculator
{
    public function calculateTax(Address $address): float;
}
