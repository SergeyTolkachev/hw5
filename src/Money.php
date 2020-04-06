<?php


namespace App;

use App\ValueObjects\Currency;

class Money
{
    /** @var int|float */
    private $amount;

    /** @var Currency */
    private $currency;


    /**
     * Money constructor.
     * @param int|float $amount
     * @param Currency $currency
     */
    public function __construct($amount, Currency $currency)
    {
        $this->setAmount($amount);
        $this->setCurrency($currency);
    }

    /** @return float|int */
    public function getAmount()
    {
        return $this->amount;
    }

    /** @param float|int $amount */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    public function equals(Money $money): bool
    {
        return $this->amount == $money->getAmount() && $this->currency->equals($money->getCurrency());
    }

    public function add(Money $money): void
    {
        if (!$this->getCurrency()->equals($money->getCurrency())) {
            throw new \InvalidArgumentException('Check the currency');
        }

        $this->setAmount($this->getAmount() + $money->getAmount());
    }

    public function __toString()
    {
        return $this->getAmount() . ' ' . $this->getCurrency();
    }

}