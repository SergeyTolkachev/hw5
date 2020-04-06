<?php
namespace App\ValueObjects;

final class Currency
{
    /** @var string  */
    private $isoCode;

    public const USD = 'USD';
    public const UAH = 'UAH';
    public const EUR = 'EUR';

    private $currencies = [
        self::EUR,
        self::UAH,
        self::USD
    ];

    public function __construct(string $isoCode)
    {
        $this->setValue($isoCode);
    }

    /** @return string */
    public function getValue(): string
    {
        return $this->isoCode;
    }

    /** @param string $isoCode */
    public function setValue(string $isoCode): void
    {
        if (!in_array($isoCode, $this->currencies)) {
             throw new \InvalidArgumentException('isoCode is not valid');
        }

        $this->isoCode = $isoCode;
    }

    public function equals(Currency $currency): bool
    {
        return $this->getValue() === $currency->getValue();
    }

    public function __toString(): string
    {
        return $this->getValue();
    }
}


