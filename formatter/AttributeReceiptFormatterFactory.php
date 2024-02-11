<?php
require_once 'interfaces/ReceiptFormatter.php';
require_once 'XMLReceiptFormatter.php';
require_once 'JSONReceiptFormatter.php';
require_once 'TextReceiptFormatter.php';

class AttributeReceiptFormatterFactory
{
    public static function create(array $data, $format): ReceiptFormatter
    {
        switch ($format) {
            case 'xml':
                return new XMLReceiptFormatter($data);
            case 'json':
                return new JSONReceiptFormatter($data);
            case 'text':
                return new TextReceiptFormatter();
            default:
                throw new Exception("Error in address");
        }
    }
}
