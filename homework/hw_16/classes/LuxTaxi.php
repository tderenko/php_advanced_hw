<?php


namespace homework\hw_16\classes;


use homework\hw_16\contracts\DeliveryInterface;
use homework\hw_16\contracts\Taxi;

class LuxTaxi extends Taxi
{

    public function getDelivery(): DeliveryInterface
    {
        return new LuxDelivery();
    }
}
