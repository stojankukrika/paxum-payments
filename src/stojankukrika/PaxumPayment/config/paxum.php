<?php
return [
    /*
	|------------------------------------------------------------------------------------
	| Paxum email is mail which is used for registration on paxum
	|------------------------------------------------------------------------------------
	|
	*/
    'paxum_email'   => getenv('PAXUM_EMAIL',null),

    /*
	|------------------------------------------------------------------------------------
	| Shared secret is API key for transactions
	|------------------------------------------------------------------------------------
	|
	*/
    'paxum_shared_secret'   => getenv('PAXUM_SHARED_SECRET', null),

    /*
	|------------------------------------------------------------------------------------
	| Sendbox = true is used for test transactions, false is for production transactions
	|------------------------------------------------------------------------------------
	|
	*/
    'sendbox'   => getenv('PAXUM_SANDBOX', false)
];