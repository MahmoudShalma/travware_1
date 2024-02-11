<?php

require_once 'OrderStatus.php';

class Order
{
    public $products;
    public $user;
    public $shipping;
    public $invNum;
    public $status;
    public $tax;
    public $price;
    public $isDone;
    private $receiptFormatter;

    public function __construct($products, $user, $shipping, $tax, $price, AttributeReceiptFormatterFactory $receiptFormatter)
    {
        $this->products = $products;
        $this->user = $user;
        $this->shipping = $shipping;
        $this->tax = $tax;
        $this->price = $price;
        $this->receiptFormatter = $receiptFormatter;
    }

    public function changeStatus(string $status, bool $extra = false)
    {
        switch ($status) {
            case OrderStatus::PENDING:
                $this->status = OrderStatus::PENDING;
                break;
            case OrderStatus::ACCEPTED:
                $this->acceptOrder($extra);
                break;
            case OrderStatus::PROCESSING:
                $this->status = OrderStatus::PROCESSING;
                $this->notifyUser("Your order is processing");
                break;
            case OrderStatus::DELIVERING:
                $this->deliverOrder();
                break;
            case OrderStatus::RECEIVED:
                $this->status = OrderStatus::PENDING;
                $this->isDone = true;
                break;
            case OrderStatus::REJECTED:
                $this->status = OrderStatus::PENDING;
                $this->notifyUser("Your order is rejected");
                break;
            default:
                throw new Exception("Invalid status: $status");
        }
    }

    private function acceptOrder(bool $extra)
    {
        $this->status = OrderStatus::ACCEPTED;
        $this->notifyUser("Your order accepted");

        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->calculatePrice();
        }

        if ($extra) {
            $this->applyExtraTax();
        }

        $this->price = $totalPrice;
    }

    private function deliverOrder()
    {
        $this->status = OrderStatus::DELIVERING;
        $this->notifyUser("Your order is delivering");
        $this->invNum = rand(1, 10);

        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice += $product->calculatePrice();
        }

        $shippingTax = $this->tax + $this->shipping->calculateTax($this->user->getAddress());
        $this->price = $totalPrice + $shippingTax + $this->shipping->getCost();
    }

    private function applyExtraTax()
    {
        $tax = $this->tax * 2;
        $this->price += $tax + ($this->price * $tax);
        if ($tax == 0) {
            $_tax = 1;
            $this->price *= $_tax;
        }
    }

    private function notifyUser(string $message)
    {
        $this->user->notify($message);
    }

    public function printReceipt($format)
    {
        if ($this->status != 'delivering') {
            throw new Exception("Internal error");
        }

        $receipt = [
            'total_price' => $this->price,
            'user_name' => $this->user->getName(),
            'products' => $this->products,
        ];

        $formatter = $this->receiptFormatter->create($receipt, $format);
        return $formatter->format($receipt);
    }
}
