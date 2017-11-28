<?php
/*
 * This file is part of the paxum-api.
 *
 * (c) Stojan Kukrika <stojankukrika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace stojankukrika\PaxumPayment\Response;

/**
 * Response codes constants
 *
 * @package stojankukrika\PaxumPayment\Response
 * @author Stojan Kukrika <stojankukrika@gmail.com>
 */
class ResponseCode
{
    const SUCCESS = '00';
    const INVALID_MERCHANT = '03';

    const SYSTEM_ERROR = '13';

    const NOT_SUFFICIENT_FUNDS = '51';
    const TRANSACTION_AMOUNT_LIMIT_EXCEEDED_SINGLE  = '52';
    const TRANSACTION_AMOUNT_LIMIT_EXCEEDED_DAILY = '53';
    const TRANSACTION_AMOUNT_LIMIT_EXCEEDED_MONTHLY = '54';
    const INCORRECT_PIN = '55';
    const TRANSACTION_NUMBER_LIMIT_EXCEEDED_DAILY = '56';
    const TRANSACTION_NUMBER_LIMIT_EXCEEDED_MONTHLY = '57';
    const TRANSACTION_NOT_PERMITTED = '58';

    const API_METHOD_DISABLED = '66';

    const FAILED_CANCEL_SUBSCRIPTION = '83';
    const FAILED_FILE_UPLOAD = '88';
    const FAILED_REQUEST_MONEY = '89';

    const UNAUTHORIZED_ACCESS = '90';
    const UNAUTHORIZED_MOBILE_DEVICE = '91';
    const NOT_IMPLEMENTED = '99';

    const NOT_CONFIRMED_ADDRESS = 'CT';
    const NOT_CONFIRMED_BANK_ACCOUNT = 'CB';
    const NOT_CONFIRMED_CARD = 'CC';

    const FORMAT_ERROR = '30';
    const FORMAT_ERROR_ADDRESS = '3D';
    const FORMAT_ERROR_ADDRESS_STATUS_ID = '3T';
    const FORMAT_ERROR_BANK_ACCOUNT = '3B';
    const FORMAT_ERROR_COUNTRY = '3C';
    const FORMAT_ERROR_IBAN = '3I';
    const FORMAT_ERROR_STATE = '3S';

    const AMBIGUOUS_SUBSCRIPTION_TERMINATION = 'AS';

    const DOCUMENT_EXPIRED = 'DE';

    const EMPTY_ACCOUNT_TYPE = 'EA';
    const EMPTY_ADDRESS = 'ED';
    const EMPTY_ADDRESS_STATUS_ID = 'ET';
    const EMPTY_BANK_ACCOUNT = 'EB';
    const EMPTY_BANK_NAME = 'EN';
    const EMPTY_BANK_ROUTING_NUMBER = 'ER';
    const EMPTY_BANK_SWIFT = 'EW';
    const EMPTY_CITY = 'EC';
    const EMPTY_FIRST_NAME = 'EF';
    const EMPTY_LAST_NAME = 'EL';
    const EMPTY_PHONE = 'EP';
    const EMPTY_STATE = 'ES';
    const EMPTY_ZIP = 'EZ';

    const INVALID_ACCOUNT_ID = 'IA';
    const INVALID_ADDRESS_ID = 'ID';
    const INVALID_BANK_ACCOUNT = 'IB';
    const INVALID_CARD_ID = 'IC';
    const INVALID_CARD_NUMBER = 'IN';
    const INVALID_CARD_TYPE = 'IY';
    const INVALID_CVV = 'IV';
    const INVALID_CURRENCY = 'IK';
    const INVALID_FREQUENCY = 'IF';
    const INVALID_METHOD_NAME = 'IM';
    const INVALID_PASSWORD = 'IW';
    const INVALID_PAYEE = 'IP';
    const INVALID_SUBSCRIPTION_ID = 'IS';
    const INVALID_TRANSACTION_ID = 'IT';
    const INVALID_USERNAME = 'IU';

    const NOT_MATCH_BUSINESS_NAME = 'BM';
    const NOT_MATCH_NAME = 'NM';

    const PO_BOX_NOT_ALLOWED = 'PO';
    const PRIMARY_CARD = 'PC';
    const PRIMARY_BANK_ACCOUNT = 'PB';
    const CURRENCY_CONVERSION_ERROR = 'P5';

    const UNVERIFIED_ACCOUNT = 'UA';
}
