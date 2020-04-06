<?php
require_once "vendor/autoload.php";

use App\ValueObjects\Currency;
use App\Money;

    $first = new Currency(Currency::USD);
    echo $first->getValue();
echo '<br>';

    $second = new Currency(Currency::USD);
    echo $second->getValue();

echo '<br>';

try {
    $result = $first->equals($second);
    var_dump($result);
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}

$money1 = new Money(300, new Currency(Currency::USD));
$money2 = new Money(10, $second);
$result2 = $money1->equals($money2);

echo '<br>';

var_dump($result2);

echo '<br>';

try {
    $money1->add($money2);
    echo $money1;
    echo '<br>';
    echo $money2;
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage();
}