<?php
namespace App;

class Invoice
{
    private $sum;
    private $tax = 20;

    /**
     * Invoice constructor.
     * @param $sum
     */
    public function __construct($sum)
    {
        $this->sum = $sum;
    }

    /**
     * @param int $tax
     */
    public function setTax(int $tax)
    {
        $this->tax = $tax;
    }

    /**
     * @return float|int
     */
    public function sumInvoiceWithoutTax() {
        return $this->sum - $this->sum / (100 + $this->tax) * $this->tax;
    }

}