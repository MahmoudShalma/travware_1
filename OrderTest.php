<?php

use PHPUnit\Framework\TestCase;

require_once 'User.php';
require_once 'Address.php';
require_once 'Shipping.php';
require_once 'Product.php';
require_once 'Shipping.php';
require_once 'Order.php';
require_once 'shipping/AttributeTaxCalculatorFactory.php';
require_once 'formatter/AttributeReceiptFormatterFactory.php';
require_once 'productCalculatePrice/AttributePriceStrategyFactory.php';


class OrderTest extends TestCase
{
    public function testOrderHaveReceipt()
    {
        $address = new Address('cairo', 'el tahrir', 'egypt');

        $shipping = new Shipping('aramex', 10, 13, new AttributeTaxCalculatorFactory());

        $product = new Product('t-shirt', 30, 'men', ['size' => 'small', 'color' => 'red'], 50);

        $user = new user('ahmed mohamed', $address);

        $order = new Order([$product], $user, $shipping, .02, $product->getPrice(),new AttributeReceiptFormatterFactory());

        $order->changeStatus('delivering');

        $print_receipt = $order->printReceipt("text");

        $this->assertEquals('total price : 83.16 #|# user name : ahmed mohamed #|# product name : t-shirt category : men price : 60 #|# size small #|# color red', $print_receipt);
    }
}
