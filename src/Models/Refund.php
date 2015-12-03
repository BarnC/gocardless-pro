<?php namespace GoCardless\Pro\Models;

use GoCardless\Pro\Models\Abstracts\Entity;
use GoCardless\Pro\Models\Traits\Factory;

class Refund extends Entity
{
    use Factory;


    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @var int
     */
    protected $amount;

    /**
     * @var int
     */
    protected $total_amount_confirmation;

    /**
     * @var string
     */
    protected $reference;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var Array
     */
    protected $metadata;

    /** @var Array
     */
    private $links;


    public function __construct(Payment $payment = null)
    {
        $this->setPayment($payment);
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getTotalAmountConfirmation()
    {
        return $this->total_amount_confirmation;
    }

    /**
     * @param string $amount
     */
    public function setTotalAmountConfirmation($amount)
    {
        $this->total_amount_confirmation = $amount;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $amount
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * @param string $amount
     */
    public function setPayment($payment)
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param string $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $subscription = array_filter(get_object_vars($this));
        if ($this->payment) {
            $subscription['links']['payment'] = $this->payment->getId();
        }
        unset($subscription['payment']);
        return $subscription;
    }

    public function getLinks()
    {
        return $this->links;
    }
}