Paxum payment package
==============================================================

You can support me to this project and [make some donation]( https://paypal.me/stojankukrika).

Installation
---
You can install the package via composer:

```bash
composer require stojankukrika/paxum-payment
```

If you are using Laravel in a version < 5.5, the service provider must be registered as a next step:

```php
// config/app.php
'providers' => [
    ...
   stojankukrika\PaxumPayment\PaxumPaymentServiceProvider
];
```
and add in aliases
```php
// config/app.php
'aliases' => [
    ...
   'Paxum' => \stojankukrika\PaxumPayment\Facades\PaxumPayment::class
];
```
After that run migration to make payment table to log payments

```bash
$ php artisan migrate
```

#### Configuration

Add in your .env file variables:
```
- PAXUM_EMAIL 
- PAXUM_SHARED_SECRET  
- PAXUM_SANDBOX
```
set it values from paxum.com and publish this provider using:
```bash
$ php artisan vendor:publish --provider=stojankukrika\PaxumPayment\PaxumPaymentServiceProvider
```

#### Important note
Before testing Payment API Code Sample do not forget to do the following from Merchant Services >> API Settings:
 - Enable API
 - Enable API methods you want to use
 - Add your IP address to "Allowed IPs" list
 - "Generate New Shared Secret", if you didn't already received it by email during API activation
 - PAXUM_SANDBOX is true if it's test and if is production then set it to false


###Usage
Firstable you initialize PaxumPayment class then call some method, like this:
```
$paxum = new PaxumPayment();
$response = $paxum->transferFunds('email@example.com',50,'USD');
```  
Here you can find all function list and how to call each of them
[Paxum apiFunctionList](https://www.paxum.com/payment-docs/page.php?name=apiFunctionList).

All requests returns string xml which you can easy parse using:
``
$xml = simplexml_load_string($response);
``
Then you will get SimpleXMLElement which is Object and you can get his properties and work with them.
 

Changelog
---
- 2.1 - version who work with CURL
- 2.0 - version with tracking response code and return string xml as response
- 1.0 - initial version


License
---
The MIT License (MIT). Please see [License File](LICENSE) for more information.
