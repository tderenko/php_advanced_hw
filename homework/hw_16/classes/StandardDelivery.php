<?php


namespace homework\hw_16\classes;


use homework\hw_16\contracts\DeliveryInterface;

class StandardDelivery implements DeliveryInterface
{

    public function model()
    {
        return 'Standart Model';
    }

    public function price()
    {
        return 130;
    }
}
