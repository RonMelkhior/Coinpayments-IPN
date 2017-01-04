<?php

namespace RonMelkhior\CoinpaymentsIPN;

trait Initialize
{
    private $merchant_id = '';
    private $ipn_secret = '';

    /**
     * Set the merchant ID.
     *
     * @param  string  $merchant_id
     * @return self
     */
    public function setMerchantID($merchant_id)
    {
        $this->merchant_id = $merchant_id;

        return $this;
    }

    /**
     * Set the IPN secret.
     *
     * @param  string  $ipn_secret
     * @return self
     */
    public function setIPNSecret($ipn_secret)
    {
        $this->ipn_secret = $ipn_secret;

        return $this;
    }
}
