<?php


namespace homework\hw_18;


use homework\hw_18\interface\DataAccess;

class Controller
{
    private $adapter;

    public function __construct(DataAccess $adapter)
    {
        $this->adapter = $adapter;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}
