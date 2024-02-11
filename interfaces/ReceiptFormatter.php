<?php

interface ReceiptFormatter
{
    public function format(array $data): string;
}