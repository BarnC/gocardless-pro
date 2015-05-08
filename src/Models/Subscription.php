<?php namespace GoCardless\Pro\Models;

use GoCardless\Pro\Models\Abstracts\Entity;
use GoCardless\Pro\Models\Traits\Factory;

class Subscription extends Entity
{
    use Factory;

    /**
     * @var Mandate
     */
    protected $mandate;

    /**
     * @var string
     */
    protected $amount;

    /**
     * @var string
     */
    protected $count;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var string
     */
    protected $day_of_month;

    /**
     * @var string
     */
    protected $end_at;

    /**
     * @var string
     */
    protected $interval;

    /**
     * @var string
     */
    protected $interval_unit;

    /**
     * @var string
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $month;


    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $start_at;

    /**
     * @var array
     */
    protected $upcoming_payments;


    public function __construct(Mandate $mandate = null)
    {
        $this->setMandate($mandate);

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
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param string $count
     */
    public function setCount($count)
    {
        $this->count = $count;

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
    public function getDayOfMonth()
    {
        return $this->day_of_month;
    }

    /**
     * @param string $day_of_month
     */
    public function setDayOfMonth($day_of_month)
    {
        $this->day_of_month = $day_of_month;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndAt()
    {
        return $this->end_at;
    }

    /**
     * @param string $end_at
     */
    public function setEndAt($end_at)
    {
        $this->end_at = $end_at;

        return $this;
    }

    /**
     * @return string
     */
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntervalUnit()
    {
        return $this->interval_unit;
    }

    /**
     * @param string $interval_unit
     */
    public function setIntervalUnit($interval_unit)
    {
        $this->interval_unit = $interval_unit;

        return $this;
    }

    /**
     * @return Mandate
     */
    public function getMandate()
    {
        return $this->mandate;
    }

    /**
     * @param Mandate $mandate
     */
    public function setMandate($mandate)
    {
        $this->mandate = $mandate;

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
     * @return string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param string $month
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartAt()
    {
        return $this->start_at;
    }

    /**
     * @param string $start_at
     */
    public function setStartAt($start_at)
    {
        $this->start_at = $start_at;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    /**
     * @return array
     */
    public function getUpcomingPayments()
    {
        return $this->upcoming_payments;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $subscription = array_filter(get_object_vars($this));
        if ($this->mandate) {
            $subscription['links']['mandate'] = $this->mandate->getId();
        }
        unset($subscription['mandate']);
        return $subscription;
    }
}