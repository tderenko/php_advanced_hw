<?php


namespace app\classes;


class Money
{
    private int|float $amount;
    private Currency $currency;

    public function __construct(int|float $amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    public function setAmount(int|float $amount): void
    {
        if (!is_int($amount) && !is_float($amount)) {
            throw new \Exception('Amount is incorrect!');
        }
        $this->amount = $amount;
    }

    public function getAmount(): int|float
    {
        return $this->amount;
    }

    public function setCurrency(Currency $currency):void
    {
        $this->currency = $currency;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function equals(self $money): bool
    {
        return $this->getCurrency()->equals($money->getCurrency());
    }

    public function add(self $money): static
    {
        if (!$this->equals($money)) {
            throw new InvalidArgumentException("Money \"{$money->getAmount()} {$money->getCurrency()}\" is different with \"{$this->getAmount()} {$this->getCurrency()}\"");
        }
        $this->amount += $money->getAmount();
        return $this;
    }
}
