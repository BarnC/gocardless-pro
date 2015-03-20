<?php namespace GoCardless\Pro\Models;

use GoCardless\Pro\Models\Abstracts\BankAccount;

class CustomerBankAccount extends BankAccount
{
    /** @var Customer */
    protected $customer;

    public function setOwner(Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Provdes an easy way to set UK bank account details
     *
     * @param $account_holder_name
     * @param $account_number
     * @param $sort_code
     * @param Customer $owner
     * @return $this
     */
    public function withAccountDetails($account_holder_name, $account_number, $sort_code, Customer $owner)
    {
        return $this->setAccountHolderName($account_holder_name)
                    ->setAccountNumber($account_number)
                    ->setSortCode($sort_code)
                    ->setOwner($owner);
    }

    public function toArray()
    {
        $account = array_filter(get_object_vars($this));

        if ($this->customer instanceof Customer)
        {
            unset($account['customer']);
            $account['links'] = [
                'customer' => $this->customer->getId()
            ];
        }

        return $account;
    }
}