paxum-payment
===

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
#### Configuration
```bash
$ php artisan vendor:publish --provider=stojankukrika\PaxumPayment\PaxumPaymentServiceProvider
```
Add in your .ev file variables PAXUM_ACCOUNT_ID, PAXUM_EMAIL, PAXUM_SHARED_SECRRET set it values from pacum.com and publish this provider using:


Usage
---


Changelog
---
Check [CHANGELOG](CHANGELOG.md) for the changelog

Testing
---
To run tests use

    $ composer test

Contributing
---

About
---

License
---
The MIT License (MIT). Please see [License File](LICENSE) for more information.