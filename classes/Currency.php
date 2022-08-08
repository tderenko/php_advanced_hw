<?php

namespace classes;

class Currency
{
    const DEFAULT_CURRENCY = [
        'USD',
        'EUR',
        'UAH',
        'PLN'
    ];

    private string $isoCode;

    public function __construct($isoCode)
    {
        $this->setIsoCode($isoCode);
    }

    public function __toString(): string
    {
        return $this->isoCode;
    }

    public function setIsoCode(string $isoCode): void
    {
        $isoCode = strtoupper($isoCode);
        if (!in_array($isoCode, static::DEFAULT_CURRENCY)) {
            throw new InvalidArgumentException("\"$isoCode\" Currency is incorrect!");
        }
        $this->isoCode = $isoCode;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function equals(self $currency): bool
    {
        return $this->getIsoCode() === $currency->getIsoCode();
    }
}
