<?php

interface AttributePriceStrategy
{
    public function calculatePrice(): int;
}