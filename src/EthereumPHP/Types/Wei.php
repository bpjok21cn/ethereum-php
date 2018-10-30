<?php

namespace EthereumPHP\Types;

class Wei
{
    private $amount;

    public function __construct(string $amount)
    {
        $this->amount = $amount;
    }

    public function amount(): string
    {
        return $this->amount;
    }

    public function toEther(): float
    {
        return bcdiv($this->amount,1000000000000000000,18);
    }

    public function __toString()
    {
        return (string)$this->amount;
    }
}