<?php
return [
    /*
	|--------------------------------------------------------------------------
	| Cache Filename
	|--------------------------------------------------------------------------
	|
	| Cache configuration path
	|
	*/
    'paxum_account_id' => getenv('PAXUM_ACCOUNT_ID', null),

    /*
	|--------------------------------------------------------------------------
	| Table name to store settings
	|--------------------------------------------------------------------------
	|
	| Info: If you change this table name, dont forget to update your settings migrations file.
	|
	*/
    'paxum_email'   => getenv('PAXUM_EMAIL',null),

    /*
	|--------------------------------------------------------------------------
	| Fallback setting
	|--------------------------------------------------------------------------
	|
	| Return Laravel config if the value with particular key is not found in cache or DB.
    | It will work if default value in laravel setting is not set, and this value is set to true
	|
	*/
    'paxum_shared_secret'   => getenv('PAXUM_SHARED_SECRET', null)
];