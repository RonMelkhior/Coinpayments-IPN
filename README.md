# Introduction

Coinpayments-IPN is a simple PHP package that lets you easily handle IPN requests from Coinpayments, without any hassle.

# Disclaimer

At the moment, this package only supports the HTTP Auth IPN method in Coinpayments.

# Usage

First of all, install the package via Composer:

```sh
composer require ronmelkhior/coinpayments-ipn
```

Then add in the IPN to your code like so:

```php
<?php

use RonMelkhior\CoinpaymentsIPN\IPN;

$ipn = new IPN();
```

Once you initialize the `IPN` class, you need to setup the merchant ID & IPN secret with the `setMerchantID` and `setIPNSecret` methods.

```php
<?php

use RonMelkhior\CoinpaymentsIPN\IPN;

$ipn = new IPN();
$ipn->setMerchantID('your-id-here')
    ->setIPNSecret('your-secret-here');
```

Then, you can validate the IPN with the `validate` method, which you need to provide your `$_POST` and `$_SERVER` arrays to.


```php
<?php

use RonMelkhior\CoinpaymentsIPN\IPN;

$ipn = new IPN();
$ipn->setMerchantID('your-id-here')
    ->setIPNSecret('your-secret-here');

try {
    if ($ipn->validate($_POST, $_SERVER)) {
        // Payment was successful, verify vars such as the transaction ID/email and process it.
    } else {
        // IPN worked, but the payment is pending.
    }
} catch (RonMelkhior\CoinpaymentsIPN\Exceptions\InvalidRequestException $e) {
    // The IPN data was not valid to begin with (missing data, invalid IPN method).
} catch (RonMelkhior\CoinpaymentsIPN\Exceptions\InsufficientDataException $e) {
    // Sufficient data provided, but either the merchant ID or the IPN secret didn't match.
} catch (RonMelkhior\CoinpaymentsIPN\Exceptions\FailedPaymentException $e) {
    // IPN worked, but the payment has failed (PayPal refund/cancelled/timed out).
}
```
