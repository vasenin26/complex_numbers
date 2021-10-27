<?php
include 'ComplexNumber.php';

function assertTrue($message, $assert)
{
    say($message . ": " . ($assert ? 'pass' : 'error'));
}

function say($message = "\n---\n")
{
    echo "$message\n";
}

$number1 = new ComplexNumber(2, -6);
$number2 = new ComplexNumber(-7, 8);

say(new ComplexNumber(1, 2));

say();

say($number1->add($number2));
say($number1->sub($number2));
say($number1->multiple($number2));
say($number1->divide($number2));

say();

say($number2->add($number1));
say($number2->sub($number1));
say($number2->multiple($number1));
say($number2->divide($number1));
say($number1->multiple($number2)->divide($number2));

say();

assertTrue('To string', (new ComplexNumber(1, 2)) . '' === '1+2i');
assertTrue('Sum check', $number1->add($number2)->isEqual($number2->add($number1)));
assertTrue('Sub check', $number1->add($number2)->sub($number2)->isEqual($number1));
assertTrue('Multiple check', $number1->multiple($number2)->isEqual($number2->multiple($number1)));
assertTrue('Multiple/divide check', $number1->multiple($number2)->divide($number2)->isEqual($number1));