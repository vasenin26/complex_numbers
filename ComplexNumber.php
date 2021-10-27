<?php

class ComplexNumber
{
    /**
     * @var float
     */
    private $real;

    /**
     * @var float
     */
    private $imaginary;

    public function __construct(float $real, float $imaginary = 0)
    {
        $this->real = $real;
        $this->imaginary = $imaginary;
    }

    public function __toString(): string
    {
        $real = (float)$this->real;
        $imaginary = (float)$this->imaginary;

        return join('', [
                $real != 0 || $imaginary == 0 ? $real : '',
                $imaginary > 0 && $real != 0 ? '+' : '',
                $imaginary != 0 ? $imaginary . 'i' : ''
        ]);
    }

    public function add(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber(
                $this->real + $number->real,
                $this->imaginary + $number->imaginary
        );
    }

    public function sub(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber(
                $this->real - $number->real,
                $this->imaginary - $number->imaginary
        );
    }

    //(a + bi) · (c + di) = (ac – bd) + (ad + bc)i
    public function multiple(ComplexNumber $number): ComplexNumber
    {
        return new ComplexNumber(
                $this->real * $number->real - $this->imaginary * $number->imaginary,
                $this->real * $number->imaginary + $number->real * $this->imaginary
        );
    }

    public function divide(ComplexNumber $number): ComplexNumber
    {
        $divider = $number->real * $number->real + $number->imaginary * $number->imaginary;

        return new ComplexNumber(
                ($this->real * $number->real + $this->imaginary * $number->imaginary) / $divider,
                ($this->imaginary * $number->real - $this->real * $number->imaginary) / $divider
        );
    }

    public function isEqual(ComplexNumber $number): bool
    {
        return $this->real === $number->real && $this->imaginary === $number->imaginary;
    }
}
