<?php

namespace app\homework\hw_4;

use Exception;

class Color
{
    protected int $red;
    protected int $green;
    protected int $blue;
    public function __construct(int $red, int $green, int $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }

    private function setRed(int $red): void
    {
        if ($this->isWrongNumber($red)) {
            throw new Exception('Red color is incorrect! Please write the correct number');
        }
        $this->red = $red;
    }

    private function setGreen(int $green): void
    {
        if ($this->isWrongNumber($green)) {
            throw new Exception('Green color is incorrect! Please write the correct number');
        }
        $this->green = $green;
    }

    private function setBlue(int $blue): void
    {
        if ($this->isWrongNumber($blue)) {
            throw new Exception('Blue color is incorrect! Please write the correct number');
        }
        $this->blue = $blue;
    }

    public function mix(self $color): self
    {
        $newRed = round(($this->getRed() + $color->getRed()) / 2);
        $newGreen = round(($this->getGreen() + $color->getGreen()) / 2);
        $newBlue = round(($this->getBlue() + $color->getBlue()) / 2);

        return new self($newRed, $newGreen, $newBlue);
    }

    protected function isWrongNumber(int $number): bool
    {
        return $number < 0 || $number > 255;
    }

    public function equals(self $color): bool
    {
        return $this == $color;
    }

    public static function random(): self
    {
        return new self(
            rand(0,255),
            rand(0,255),
            rand(0,255)
        );
    }

}
