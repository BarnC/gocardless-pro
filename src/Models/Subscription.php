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
    protected $end_date;

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
    protected $start_date;

    /**
     * @var array
     */
    protected $upcoming_payments;

    /** @var Array */
    private $links;


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
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param string $end_at
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;

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
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param string $start_at
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

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

    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @return array
     */
    public function toArrayForUpdating()
    {
        return array_intersect_key($this->toArray(), array_flip(['name', 'metadata', 'payment_reference']));
    }
}