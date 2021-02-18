# Ippopay PHP Client

## Installation

```bash
composer require ippopay/ippopay
```

## Documentation

Documentation of Ippopay's API is available at <https://docs.ippopay.com/php-client>

### Basic Usage

Initiate the Ippopay instance with `public_key` & `secret_key`. You can get the keys from the merchant dashboard ([https://app.ippopay.com/settings/api](https://app.ippopay.com/settings/api))

```php
require('./vendor/ippopay/ippopay/Ippopay.php');

$api = new IPOrder('YOUR_PUBLIC_KEY','YOUR_SECRET_KEY');
```

### Create an Order

```php
$order = $api->createOrder([
    "amount"=> 1.00,
    "currency"=> "INR",
    "payment_modes"=> "cc,dc,nb,upi",
    "return_url"=> "",
    "customer"=> array(
        "name"=> "Test",
        "email"=> "test@gmail.com",
        "phone"=> array(
            "country_code"=> "91" ,
            "national_number"=> "9876543210"
        )
    )
]);
$orderData = json_decode($order, true);
$orderID = $orderData['data']['order']['order_id']; // Get your ORDER ID Here
print_r($orderID);
    
```

### Get Transaction Details of Order

```php

$orderTransactionDetails = $api->orderDetails('ORDER_ID'); // Get Transaction details of Order

```

---

## Author

This component is written by [IppoPay](https://github.com/ippopay).

## License

IppoPay 2021 &copy; All Rights Reserved. [IppoPay](https://www.ippopay.com)
