<?php

namespace RonMelkhior\CoinpaymentsIPN;

trait Initialize
{
    private $merchant_id = '';
    private $ipn_secret = '';

    public function setMerchantID($merchant_id)
    {
        $this->merchant_id = $merchant_id;

        return true;
    }

    public function setIPNSecret($ipn_secret)
    {
        $this->ipn_secret = $ipn_secret;

        return true;
    }
}
