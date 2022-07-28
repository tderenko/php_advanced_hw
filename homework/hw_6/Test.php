<?php


namespace app\homework\hw_6;


use app\homework\hw_6\traits\Trait1;
use app\homework\hw_6\traits\Trait2;
use app\homework\hw_6\traits\Trait3;

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait2::test insteadof Trait1;
        Trait3::test insteadof Trait2;
        Trait1::test as t1;
        Trait2::test as t2;
        Trait3::test as t3;
    }

    public function getSum()
    {
        return $this->t1() + $this->t2() + $this->t3();
    }
}
