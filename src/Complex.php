<?php

/**
 * Complex
 * 
 * Represents a complex number. Complex numbers are immutable.
 * 
 * Includes methods for addition, subtraction, multiplication, division, conjugation 
 * and other common functions on complex numbers.
 */
class Complex {

    private $re; // real
    private $im; // imaginary

    /**
     * Initializes a complex number from the specified real and imaginary parts.
     * 
     * @param type $real
     * @param type $imaginary
     */

    public function __construct($real, $imaginary) {

        $this->re = (double) $real;
        $this->im = (double) $imaginary;

    }

    /**
     * Returns the real part of this complex number.
     * 
     * @return double the real part of this complex number.
     */
    public function re() {

        return $this->re;

    }

    /**
     * Returns the imaginary part of this complex number.
     * 
     * @return double the imaginary part of this complex number.
     */
    public function im() {

        return $this->im;

    }

    /**
     * Returns the sum of this complex number and the specified complex number.
     * 
     * @param Complex $c other complex number
     * @return \Complex the complex number whose value is (this + c)
     */
    public function plus(Complex $c) {

        $re = $this->re + $c->re;
        $im = $this->im + $c->im;
        return new Complex($re, $im);

    }

    /**
     * Returns the result of subtracting the specified complex number from
     * this complex number.
     * 
     * @param Complex $c other complex number
     * @return \Complex the complex number whose value is (this - c)
     */
    public function minus(Complex $c) {

        $re = $this->re - $c->re;
        $im = $this->im - $c->im;
        return new Complex($re, $im);

    }

    /**
     * Returns the product of this complex number and the specified complex number.
     * 
     * @param Complex $c other complex number
     * @return \Complex the complex number whose value is (this * c)
     */
    public function times(Complex $c) {

        $re = $this->re * $c->re - $this->im * $c->im;
        $im = $this->re * $c->im + $this->im * $c->re;
        return new Complex($re, $im);

    }

    /**
     * Returns the result of dividing the specified complex number into
     * this complex number.
     * 
     * @param Complex $c other complex number
     * @return \Complex the complex number whose value is (this / c)
     */
    public function divides(Complex $c) {

        return $this->times($c->reciprocal());

    }

    /**
     * Returns the absolute value of this complex number.
     * 
     * @return mixed the absolute value of this complex number.
     */
    public function abs() {

        return hypot($this->re, $this->im);

    }

    /**
     * Returns the phase of this complex number.
     * 
     * @return float the phase of this complex number.
     */
    public function phase() {

        return atan2($this->im, $this->re);

    }

    /**
     * Returns the product of this complex number and the specified scalar.
     * 
     * @param mixed $alpha
     * @return \Complex the product of this complex number and the specified scalar.
     */
    public function scale($alpha) {

        return new Complex($alpha * $this->re, $alpha * $this->im);

    }

    /**
     * Returns the complex conjugate of this complex number.
     * 
     * @return \Complex the complex conjugate of this complex number.
     */
    public function conjugate() {

        return new Complex($this->re, -$this->im);

    }

    /**
     * Returns the reciprocal of this complex number.
     * 
     * @return \Complex the reciprocal of this complex number.
     */
    public function reciprocal() {

        $scale = $this->re * $this->re + $this->im * $this->im;
        return new Complex($this->re / $scale, -$this->im / $scale);

    }

    /**
     * Returns the complex exponential of this complex number.
     * 
     * @return \Complex the complex exponential of this complex number.
     */
    public function exp() {

        return new Complex(exp($this->re) * cos($this->im), exp($this->re) * sin($this->im));

    }

    /**
     * Returns the complex sine of this complex number.
     * 
     * @return \Complex the complex sine of this complex number.
     */
    public function sin() {

        return new Complex(sin($this->re) * cosh($this->im), cos($this->re) * sinh($this->im));

    }

    /**
     * Returns the complex cosine of this complex number.
     * 
     * @return \Complex the complex cosine of this complex number.
     */
    public function cos() {

        return new Complex(cos($this->re) * cosh($this->im), -sin($this->re) * sinh($this->im));

    }

    /**
     * Returns the complex tangent of this complex number.
     * 
     * @return \Complex the complex tangent of this complex number.
     */
    public function tan() {

        return $this->sin()->divides($this->cos());

    }

    /**
     * Returns a string representation of this complex number.
     * 
     * @return string a string representation of this complex number.
     */
    public function __toString() {

        if ($this->im == 0) {
            return (string) $this->re;
        }
        if ($this->re == 0) {
            return $this->im . "i";
        }
        if ($this->im < 0) {
            return $this->re . " - " . -$this->im . "i";
        }
        return $this->re . " + " . $this->im . "i";

    }

}
