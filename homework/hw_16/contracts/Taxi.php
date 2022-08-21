<?php


namespace homework\hw_16\contracts;


abstract class Taxi
{
    abstract public function getDelivery(): DeliveryInterface;

    public function drive()
    {
        $delivery = $this->getDelivery();
        echo "You will ride on {$delivery->model()} by {$delivery->price()}!!!";
    }
}
