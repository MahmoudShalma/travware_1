<?php

require_once 'interfaces/ReceiptFormatter.php';

class JSONReceiptFormatter implements ReceiptFormatter
{
    public function format(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}
