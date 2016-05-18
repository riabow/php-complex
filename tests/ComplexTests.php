<?php

require __DIR__ . "/../src/Complex.php";

class ComplexTest extends PHPUnit_Framework_TestCase {

    protected $a;
    protected $b;

    protected function setUp() {

        $this->a = new Complex(5, 6);
        $this->b = new Complex(-3, 4);

    }

    public function testToString() {

        $this->assertEquals('5 + 6i', $this->a);
        $this->assertEquals('-3 + 4i', $this->b);

    }

    public function testPlus() {

        // b + a
        $this->assertEquals('2 + 10i', $this->b->plus($this->a));

    }

    public function testMinus() {

        // a - b
        $this->assertEquals('8 + 2i', $this->a->minus($this->b));

    }

    public function testTimes() {

        // a * b
        $this->assertEquals('-39 + 2i', $this->a->times($this->b));
        // b * a
        $this->assertEquals('-39 + 2i', $this->b->times($this->a));

    }

    public function testDivide() {

        // a / b
        $this->assertEquals('0.36 - 1.52i', $this->a->divides($this->b));

    }

    public function testConjugate() {

        // conj(a)
        $this->assertEquals('5 - 6i', $this->a->conjugate());

    }

    public function testAbs() {

        // |a|
        $this->assertEquals('7.810249675906654', $this->a->abs());

    }

    public function testTan() {

        // tan(a)
        $this->assertEquals('-6.6852313902466E-6 + 1.0000103108981i', $this->a->tan());

    }

}
