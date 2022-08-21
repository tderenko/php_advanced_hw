<?php


namespace homework\hw_16\classes;


use homework\hw_16\contracts\DeliveryInterface;

class EconomicalDelivery implements DeliveryInterface
{

    public function model()
    {
        return 'Econom Model';
    }

    public function price()
    {
        return 100;
    }
}
