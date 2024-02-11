<?php

require_once 'interfaces/ReceiptFormatter.php';

class TextReceiptFormatter implements ReceiptFormatter
{
    public function format(array $data): string
    {
        $formattedText = '';

        $formattedText .= "total price : " . $data["total_price"]
            . ' #|# user name : ' . $data["user_name"];
        foreach ($data["products"] as $product) {
            $formattedText .= ' #|# product name : ' . $product->getName()
                . ' category : ' . $product->getCategory()
                . ' price : ' . $product->getPrice();
            foreach ($product->getAttributes() as $key => $attribute) {
                $formattedText .= ' #|# ' . $key . ' ' . $attribute;
            }
        }

        return $formattedText;
    }
}
