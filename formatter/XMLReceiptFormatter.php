<?php

require_once 'interfaces/ReceiptFormatter.php';

class XMLReceiptFormatter implements ReceiptFormatter
{

    public function format(array $data): string
    {
        $xml = new SimpleXMLElement('<receipt/>');
        $this->arrayToXml($data, $xml);
        return $xml->asXML();
    }

    private function arrayToXml(array $data, SimpleXMLElement &$xml)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $subNode = $xml->addChild($key);
                $this->arrayToXml($value, $subNode);
            } else {
                $xml->addChild($key, htmlspecialchars($value));
            }
        }
    }
}
