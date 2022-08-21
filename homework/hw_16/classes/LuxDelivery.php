<?php


namespace homework\hw_16\classes;


use homework\hw_16\contracts\DeliveryInterface;

class LuxDelivery implements DeliveryInterface
{

    public function model()
    {
        return 'Lux Model';
    }

    public function price()
    {
        return 150;
    }
}
