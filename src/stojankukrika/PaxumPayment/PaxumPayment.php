<?php

namespace stojankukrika\PaxumPayment;

/**
 * The PaxumPayment class.
 *
 * @package  payment.api
 * @since    Payment 1.0
 * @version  1.1
 * @category Payment
 */

class PaxumPayment
{

	/**
	 * the username of the client account
	 * @var string
	 */
	private $fromEmail = null;

	/**
	 * the encrypted password of the client account MD5(password)
	 * @var string
	 */
	private $encryptedPassword = null;

	/**
	 * the account ID is number from merchent panel related to his currency
	 * @var string
	 */
	private $accountId = null;


	/**
	 * The PaxumPayment constructor
	 */
	public function __construct()
	{
		$this->fromEmail = config('paxum.paxum_email');
		$this->encryptedPassword = config('paxum.paxum_shared_secret');
		$this->accountId = config('paxum.paxum_account_id');
	}

	public function login()
	{
		$key = md5(sprintf("%s%s",
			$this->encryptedPassword,
			$this->fromEmail)
		);

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("login"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"400\" rows=\"100\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function balanceInquiry()
	{
        $accountId = $this->accountId;
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $accountId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("balanceInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&accountId=%s", urlencode($accountId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;

	}

	public function cardInquiry($cardId = null)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $cardId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("cardInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&cardId=%s", urlencode($cardId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function bankAccountInquiry($bankAccountId = null)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $bankAccountId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("bankAccountInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&bankAccountId=%s", urlencode($bankAccountId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function addressInquiry($addressId = null)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $addressId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addressInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&addressId=%s", urlencode($addressId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function identityVerificationInquiry($identityVerificationId = null, $pageSize = null, $pageNumber = null)
	{
		$key = md5(sprintf("%s%s%s%s", $this->encryptedPassword,
			($identityVerificationId != null) ? $identityVerificationId : "",
			($pageSize   != null) ? $pageSize : "",
			($pageNumber != null) ? $pageNumber : ""
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("identityVerificationInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		($identityVerificationId != null) ? $req .= sprintf("&identityVerificationId=%s", urlencode($identityVerificationId)) : "";
		($pageNumber 			 != null) ? $req .= sprintf("&pageNumber=%s", urlencode($pageNumber)) : "";
		($pageSize				 != null) ? $req .= sprintf("&pageSize=%s", urlencode($pageSize)) : "";
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function currencyInquiry($status = null)
	{
		$key = md5(sprintf("%s", $this->encryptedPassword));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("currencyInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function emailInquiry()
	{
		$key = md5(sprintf("%s", $this->encryptedPassword));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("emailInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function newsInquiry()
	{
		// Prepare the request
		$key = md5(sprintf("%s", $this->encryptedPassword));

		$req  = sprintf("method=%s", urlencode("newsInquiry"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function addFundsFromCard($fromCard, $toAccountId, $amount, $currency, $cardVerificationNumber)
	{
		$key = md5(sprintf("%s%s%s%s%s%s",
			$this->encryptedPassword,
			$fromCard,
			$toAccountId,
			$amount,
			$currency,
			$cardVerificationNumber
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addFundsFromCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromCard=%s", urlencode($fromCard));
		$req .= sprintf("&toAccountId=%s", urlencode($toAccountId));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&cardVerificationNumber=%s", urlencode($cardVerificationNumber));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function addFundsFromBankAccount($bankAccountId, $toAccountId, $amount, $currency, $transferType)
	{
		$key = md5(sprintf("%s%s%s%s%s%s",
			$this->encryptedPassword,
			$bankAccountId,
			$toAccountId,
			$amount,
			$currency,
			$transferType
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addFundsFromBankAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromBankAccount=%s", urlencode($bankAccountId));
		$req .= sprintf("&toAccountId=%s", urlencode($toAccountId));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&transferType=%s", urlencode($transferType));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function transferFundsBetweenAccounts($fromAccount, $toAccount, $amount, $currency, $subscriptionFrequency = null, $subscriptionEndDate = null, $subscriptionUserCancel = null, $subscriptionTransactions  = null)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$fromAccount,
			$toAccount,
			$amount,
			$currency,
			($subscriptionFrequency  != null) ? $subscriptionFrequency : "",
			($subscriptionEndDate 	 != null) ? $subscriptionEndDate : "",
			($subscriptionUserCancel != null) ? $subscriptionUserCancel : "",
			($subscriptionTransactions   != null) ? $subscriptionTransactions  : ""
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("transferFundsBetweenAccounts"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromAccount=%s", urlencode($fromAccount));
		$req .= sprintf("&toAccount=%s", urlencode($toAccount));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		($subscriptionFrequency  != null) ? $req .= sprintf("&subscriptionFrequency=%s", urlencode($subscriptionFrequency)) : "";
		($subscriptionEndDate    != null) ? $req .= sprintf("&subscriptionEndDate=%s", urlencode($subscriptionEndDate)) : "";
		($subscriptionUserCancel != null) ? $req .= sprintf("&subscriptionUserCancel=%s", urlencode($subscriptionUserCancel)) : "";
		($subscriptionTransactions   != null) ? $req .= sprintf("&subscriptionTransactions=%s", urlencode($subscriptionTransactions )) : "";
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function transferFunds($toEmail, $amount, $currency, $note = null, $firstName = null, $lastName = null, $businessName = null,
		$reference = null, $subscriptionFrequency = null, $subscriptionEndDate = null, $subscriptionUserCancel = null, $subscriptionTransactions  = null,
		$fromAccount = null, $transactionCategory = null)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$toEmail,
			$amount,
			$currency,
			($note 		   != NULL) ? $note : "",
			($firstName    != null) ? $firstName : "",
			($lastName 	   != null) ? $lastName : "",
			($businessName != null) ? $businessName : "",
			($reference    != null) ? $reference : "",
			($subscriptionFrequency  != null) ? $subscriptionFrequency : "",
			($subscriptionEndDate 	 != null) ? $subscriptionEndDate : "",
			($subscriptionUserCancel != null) ? $subscriptionUserCancel : "",
			($subscriptionTransactions   != null) ? $subscriptionTransactions  : "",
			($fromAccount  != null) ? $fromAccount : "",
			($transactionCategory  != null) ? $transactionCategory : ""
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("transferFunds"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&toEmail=%s", urlencode($toEmail));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		($note         != null) ? $req .= sprintf("&note=%s", urlencode($note)) : "";
		($firstName    != null) ? $req .= sprintf("&firstName=%s", urlencode($firstName)) : "";
		($lastName     != null) ? $req .= sprintf("&lastName=%s", urlencode($lastName)) : "";
		($businessName != null) ? $req .= sprintf("&businessName=%s", urlencode($businessName)) : "";
		($reference    != null) ? $req .= sprintf("&reference=%s", urlencode($reference)) : "";
		($subscriptionFrequency  != null) ? $req .= sprintf("&subscriptionFrequency=%s", urlencode($subscriptionFrequency)) : "";
		($subscriptionEndDate    != null) ? $req .= sprintf("&subscriptionEndDate=%s", urlencode($subscriptionEndDate)) : "";
		($subscriptionUserCancel != null) ? $req .= sprintf("&subscriptionUserCancel=%s", urlencode($subscriptionUserCancel)) : "";
		($subscriptionTransactions   != null) ? $req .= sprintf("&subscriptionTransactions=%s", urlencode($subscriptionTransactions )) : "";
		($fromAccount  != null) ? $req .= sprintf("&fromAccount=%s", urlencode($fromAccount)) : "";
		($transactionCategory  != null) ? $req .= sprintf("&transactionCategory=%s", urlencode($transactionCategory)) : "";

		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function massTransferFunds($data, $fromAccountId = null)
	{
		$key = md5(sprintf("%s%s%s", $this->encryptedPassword, $data, $fromAccountId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("massTransferFunds"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&data=%s", urlencode($data));
		$req .= sprintf("&fromAccountId=%s", urlencode($fromAccountId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function withdrawFundsToCard($fromAccount, $toCard, $amount, $currency)
	{
		$key = md5(sprintf("%s%s%s%s%s",
			$this->encryptedPassword,
			$fromAccount,
			$toCard,
			$amount,
			$currency

		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("withdrawFundsToCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromAccount=%s", urlencode($fromAccount));
		$req .= sprintf("&toCard=%s", urlencode($toCard));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function withdrawFundsToBankAccount($fromAccount, $toBankAccount, $amount, $currency, $transferType)
	{
		$key = md5(sprintf("%s%s%s%s%s%s",
			$this->encryptedPassword,
			$fromAccount,
			$toBankAccount,
			$amount,
			$currency,
			$transferType
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("withdrawFundsToBankAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromAccount=%s", urlencode($fromAccount));
		$req .= sprintf("&toBankAccount=%s", urlencode($toBankAccount));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&transferType=%s", urlencode($transferType));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function refundTransaction($transId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $transId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("refundTransaction"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&transId=%s", urlencode($transId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function requestMoney($toEmail, $amount, $currency, $toAccount = null, $transactionCategory = null)
	{
		$key = md5(sprintf("%s%s%s%s%s%s", $this->encryptedPassword, $toEmail, $amount, $currency, $toAccount, $transactionCategory));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("requestMoney"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&toEmail=%s", urlencode($toEmail));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&currency=%s", urlencode($currency));
		($toAccount != null) ? $req .= sprintf("&toAccount=%s", urlencode($toAccount)) : "";
		($transactionCategory != null) ? $req .= sprintf("&transactionCategory=%s", urlencode($transactionCategory)) : "";
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function subscriptionList($pageSize = null, $pageNumber = null)
	{
		$key = md5(sprintf("%s%s%s", $this->encryptedPassword, $pageSize, $pageNumber));

		// Prepare the request
		$req  = sprintf("method=%s", urlencode("subscriptionList"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&pageSize=%s", urlencode($pageSize));
		$req .= sprintf("&pageNumber=%s", urlencode($pageNumber));
		$req .= sprintf("&key=%s", urlencode($key));

		//the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function cancelSubscription($subscriptionId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $subscriptionId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("cancelSubscription"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&subscriptionId=%s", urlencode($subscriptionId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;

	}

	public function transactionHistory($fromDate, $toDate, $pageSize = NULL, $pageNumber = NULL)
	{
        $accountId = $this->accountId;
		$key = md5(sprintf("%s%s%s%s%s%s",
			$this->encryptedPassword,
			($accountId != NULL) ? $accountId : "",
			$fromDate,
			$toDate,
			($pageSize != NULL) ? $pageSize : "",
			($pageNumber != NULL) ? $pageNumber : "")
		);

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("transactionHistory"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));

		if($accountId != NULL)
			$req .= sprintf("&accountId=%s", urlencode($accountId));

		$req .= sprintf("&fromDate=%s", urlencode($fromDate));
		$req .= sprintf("&toDate=%s", urlencode($toDate));

		if($pageSize != NULL)
			$req .= sprintf("&pageSize=%s", urlencode($pageSize));
		if($pageNumber != NULL)
			$req .= sprintf("&pageNumber=%s", urlencode($pageNumber));

		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function identityVerification($toEmail, $firstName = null, $lastName = null, $gender = null, $address = null, $city = null, $state = null, $country = null, $postalCode = null, $birthday = null, $phone = null, $idType = null, $idNumber = null, $businessName = null)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$toEmail,
			($firstName  != null) ? $firstName : "",
			($lastName   != null) ? $lastName : "",
			($gender     != null) ? $gender : "",
			($address    != null) ? $address : "",
			($city       != null) ? $city : "",
			($state      != null) ? $state : "",
			($country    != null) ? $country : "",
			($postalCode != null) ? $postalCode : "",
			($birthday   != null) ? $birthday : "",
			($phone      != null) ? $phone : "",
			($idType     != null) ? $idType : "",
			($idNumber   != null) ? $idNumber : "",
			($businessName   != null) ? $businessName : ""
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("identityVerification"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&toEmail=%s", urlencode($toEmail));
		($firstName  != null) ? $req .= sprintf("&firstName=%s", urlencode($firstName)) : "";
		($lastName 	 != null) ? $req .= sprintf("&lastName=%s", urlencode($lastName)) : "";
		($gender 	 != null) ? $req .= sprintf("&gender=%s", urlencode($gender)) : "";
		($address 	 != null) ? $req .= sprintf("&address=%s", urlencode($address)) : "";
		($city 		 != null) ? $req .= sprintf("&city=%s", urlencode($city)) : "";
		($state 	 != null) ? $req .= sprintf("&state=%s", urlencode($state)) : "";
		($country 	 != null) ? $req .= sprintf("&country=%s", urlencode($country)) : "";
		($postalCode != null) ? $req .= sprintf("&postalCode=%s", urlencode($postalCode)) : "";
		($birthday 	 != null) ? $req .= sprintf("&birthday=%s", urlencode($birthday)) : "";
		($phone 	 != null) ? $req .= sprintf("&phone=%s", urlencode($phone)) : "";
		($idType 	 != null) ? $req .= sprintf("&idType=%s", urlencode($idType)) : "";
		($idNumber 	 != null) ? $req .= sprintf("&idNumber=%s", urlencode($idNumber)) : "";
		($businessName 	 != null) ? $req .= sprintf("&businessName=%s", urlencode($businessName)) : "";

		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function addCard($cardName, $cardType, $cardNumber, $cardExpiration, $currency, $type, $phone, $idNumber, $idExpiration, $addressId)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$cardName,
			$cardType,
			$cardNumber,
			$cardExpiration,
			$currency,
			$type,
			$phone,
			$idNumber,
			$idExpiration,
			$addressId
		));
		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&cardName=%s", urlencode($cardName));
		$req .= sprintf("&cardType=%s", urlencode($cardType));
		$req .= sprintf("&cardNumber=%s", urlencode($cardNumber));
		$req .= sprintf("&cardExpiration=%s", urlencode($cardExpiration));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&type=%s", urlencode($type));
		$req .= sprintf("&phone=%s", urlencode($phone));
		$req .= sprintf("&idNumber=%s", urlencode($idNumber));
		$req .= sprintf("&idExpiration=%s", urlencode($idExpiration));
		$req .= sprintf("&addressId=%s", urlencode($addressId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function setPrimaryCard($cardId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword,$cardId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("setPrimaryCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&cardId=%s", urlencode($cardId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function deleteCard($cardId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword,$cardId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("deleteCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&cardId=%s", urlencode($cardId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function verifyCardRequest($fromCard, $cardVerificationNumber)
	{
		$key = md5(sprintf("%s%s%s",
			$this->encryptedPassword,
			$fromCard,
			$cardVerificationNumber
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("verifyCardRequest"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromCard=%s", urlencode($fromCard));
		$req .= sprintf("&cardVerificationNumber=%s", urlencode($cardVerificationNumber));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function verifyCardConfirmation($fromCard, $amount)
	{
		$key = md5(sprintf("%s%s%s",
			$this->encryptedPassword,
			$fromCard,
			$amount
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("verifyCardConfirmation"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&fromCard=%s", urlencode($fromCard));
		$req .= sprintf("&amount=%s", urlencode($amount));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

 	public function addBankAccount(
						$firstName, $lastName, $companyName, $phone, $addressId, $bankName, $bankSwiftCode, $bankStreet,$bankCity, $bankCountry, $bankState, $bankPostalCode,
						$bankAccountNumber, $currency, $bankRoutingCode, $accountType, $bankAccountType, $intermediaryName, $intermediaryStreet,
						$intermediaryCountry, $intermediaryState, $intermediaryCity, $intermediaryPostalCode, $intermediarySwift, $intermediaryCodeBank, $intermediaryFurtherAccount, $intermediaryBank
						)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword, $firstName, $lastName, $companyName,
			$phone, $addressId, $bankName, $bankSwiftCode, $bankStreet, $bankCity,
			$bankState, $bankCountry, $bankPostalCode, $bankAccountNumber,
			$currency, $bankRoutingCode, $bankAccountType, $accountType,
			$intermediaryName, $intermediaryStreet, $intermediaryCountry,
			$intermediaryState, $intermediaryCity, $intermediaryPostalCode,
			$intermediarySwift, $intermediaryCodeBank, $intermediaryFurtherAccount, $intermediaryBank
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addBankAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&firstName=%s", urlencode($firstName));
		$req .= sprintf("&lastName=%s", urlencode($lastName));
		$req .= sprintf("&companyName=%s", urlencode($companyName));
		$req .= sprintf("&phone=%s", urlencode($phone));
		$req .= sprintf("&addressId=%s", urlencode($addressId));
		$req .= sprintf("&bankName=%s", urlencode($bankName));
		$req .= sprintf("&bankSwiftCode=%s", urlencode($bankSwiftCode));
		$req .= sprintf("&bankStreet=%s", urlencode($bankStreet));
		$req .= sprintf("&bankCity=%s", urlencode($bankCity));
		$req .= sprintf("&bankCountry=%s", urlencode($bankCountry));
		$req .= sprintf("&bankState=%s", urlencode($bankState));
		$req .= sprintf("&bankPostalCode=%s", urlencode($bankPostalCode));
		$req .= sprintf("&bankAccountNumber=%s", urlencode($bankAccountNumber));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&bankRoutingCode=%s", urlencode($bankRoutingCode));
		$req .= sprintf("&accountType=%s", urlencode($accountType));
		$req .= sprintf("&bankAccountType=%s", urlencode($bankAccountType));
		$req .= sprintf("&intermediaryName=%s", urlencode($intermediaryName));
		$req .= sprintf("&intermediaryStreet=%s", urlencode($intermediaryStreet));
		$req .= sprintf("&intermediaryCountry=%s", urlencode($intermediaryCountry));
		$req .= sprintf("&intermediaryState=%s", urlencode($intermediaryState));
		$req .= sprintf("&intermediarySwift=%s", urlencode($intermediarySwift));
		$req .= sprintf("&intermediaryCodeBank=%s", $intermediaryCodeBank);
		$req .= sprintf("&intermediaryFurtherAccount=%s", urlencode($intermediaryFurtherAccount));
		$req .= sprintf("&intermediaryBank=%s", $intermediaryBank);
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function setPrimaryBankAccount($bankAccountId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $bankAccountId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("setPrimaryBankAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&bankAccountId=%s", urlencode($bankAccountId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function deleteBankAccount($bankAccountId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $bankAccountId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("deleteBankAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&bankAccountId=%s", urlencode($bankAccountId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function addAddress($streetName, $streetNumber, $building, $entrance, $floor, $apartment, $district, $postalCode, $city, $state, $country, $addressStatus)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$streetName, $streetNumber, $building, $entrance, $floor,
			$apartment, $district, $postalCode, $city, $state, $country, $addressStatus
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("addAddress"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&streetName=%s", urlencode($streetName));
		$req .= sprintf("&streetNumber=%s", urlencode($streetNumber));
		$req .= sprintf("&building=%s", urlencode($building));
		$req .= sprintf("&entrance=%s", urlencode($entrance));
		$req .= sprintf("&floor=%s", urlencode($floor));
		$req .= sprintf("&apartment=%s", urlencode($apartment));
		$req .= sprintf("&district=%s", urlencode($district));
		$req .= sprintf("&postalCode=%s", urlencode($postalCode));
		$req .= sprintf("&city=%s", urlencode($city));
		$req .= sprintf("&state=%s", urlencode($state));
		$req .= sprintf("&country=%s", urlencode($country));
		$req .= sprintf("&addressStatus=%s", urlencode($addressStatus));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function deleteAddress($addressId)
	{
		$key = md5(sprintf("%s%s", $this->encryptedPassword, $addressId));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("deleteAddress"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));
		$req .= sprintf("&addressId=%s", urlencode($addressId));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function createAccount($operatorCode, $username,	$firstName, $lastName, $language,  $idn, $citizenship, $residenceCountry, $birthday, $ocupation,
									$employer, $politicalyView, $currency, $phoneCountryCode,	$phone,	$phoneExtension, $phoneType, $streetName, $streetNumber,
									$building, $floor, $apartment,	$country, $state, $city, $postalCode, $addressStatus, $apiStatus, $apiSecret, $apiIPs
								)
	{

		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword ,$operatorCode, $username,	$firstName,	$lastName, $language,
			$idn, $citizenship, $residenceCountry, $birthday, $ocupation, $employer,
			$politicalyView, $currency, $phoneCountryCode,	$phone,	$phoneExtension,
			$phoneType, $streetName, $streetNumber, $building, $floor,
			$apartment,	$country, $state, $city, $postalCode, $addressStatus, $apiStatus, $apiSecret, $apiIPs
		));

		// Prepare the request

		$req  = sprintf("method=%s", urlencode("createAccount"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));

		$req .= sprintf("&operatorCode=%s", urlencode($operatorCode));
		$req .= sprintf("&username=%s", urlencode($username));
		$req .= sprintf("&firstName=%s", urlencode($firstName));
		$req .= sprintf("&lastName=%s", urlencode($lastName));
		$req .= sprintf("&language=%s", urlencode($language));
		$req .= sprintf("&idn=%s", urlencode($idn));
		$req .= sprintf("&citizenship=%s", urlencode($citizenship));
		$req .= sprintf("&residenceCountry=%s", urlencode($residenceCountry));
		$req .= sprintf("&birthday=%s", urlencode($birthday));
		$req .= sprintf("&ocupation=%s", urlencode($ocupation));
		$req .= sprintf("&employer=%s", urlencode($employer));
		$req .= sprintf("&politicalyView=%s", urlencode($politicalyView));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&phoneCountryCode=%s", urlencode($phoneCountryCode));
		$req .= sprintf("&phone=%s", urlencode($phone));
		$req .= sprintf("&phoneExtension=%s", urlencode($phoneExtension));
		$req .= sprintf("&phoneType=%s", urlencode($phoneType));
		$req .= sprintf("&streetName=%s", urlencode($streetName));
		$req .= sprintf("&streetNumber=%s", urlencode($streetNumber));
		$req .= sprintf("&building=%s", urlencode($building));
		$req .= sprintf("&floor=%s", urlencode($floor));
		$req .= sprintf("&apartment=%s", urlencode($apartment));
		$req .= sprintf("&country=%s", urlencode($country));
		$req .= sprintf("&state=%s", urlencode($state));
		$req .= sprintf("&city=%s", urlencode($city));
		$req .= sprintf("&postalCode=%s", urlencode($postalCode));
		$req .= sprintf("&addressStatus=%s", urlencode($addressStatus));
		$req .= sprintf("&apiStatus=%s", urlencode($apiStatus));
		$req .= sprintf("&apiSecret=%s", urlencode($apiSecret));
		$req .= sprintf("&apiIPs=%s", urlencode($apiIPs));
		$req .= sprintf("&key=%s", urlencode($key));

		// the following two lines are for testing only (in production they should be commented out)
		//$req .= sprintf("&sandbox=ON");
		//$req .= sprintf("&return=%s", urlencode("51"));



		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
        echo $res;
	}

	public function uploadDocument($type, $file, $fileType, $toEmail, $issuingCountry, $issuingState, $issuingAuthority, $issuedDate, $expiryDate, $series, $number, $addressId = null)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$type, $file, $fileType, $toEmail, $issuingCountry, $issuingState, $issuingAuthority, $issuedDate, $expiryDate, $series, $number,
			($addressId != NULL) ? $addressId : ""
		));

		$req  = sprintf("method=%s", urlencode("uploadDocument"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));

		$req .= sprintf("&type=%s", urlencode($type));
		$req .= sprintf("&file=%s", urlencode($file));
		$req .= sprintf("&fileType=%s", urlencode($fileType));
		$req .= sprintf("&toEmail=%s", urlencode($toEmail));
		$req .= sprintf("&issuingCountry=%s", urlencode($issuingCountry));
		$req .= sprintf("&issuingState=%s", urlencode($issuingState));
		$req .= sprintf("&issuingAuthority=%s", urlencode($issuingAuthority));
		$req .= sprintf("&issuedDate=%s", urlencode($issuedDate));
		$req .= sprintf("&expiryDate=%s", urlencode($expiryDate));
		$req .= sprintf("&series=%s", urlencode($series));
		$req .= sprintf("&number=%s", urlencode($number));
		if($addressId != NULL)
			$req .= sprintf("&addressId=%s", urlencode($addressId));

		$req .= sprintf("&key=%s", urlencode($key));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
		echo $res;
	}

	public function requestCard($toEmail, $type, $currency, $nameOnCard, $billingAddress, $shippingMethod, $fromAccount)
	{
		$key = md5(sprintf("%s%s%s%s%s%s%s%s",
			$this->encryptedPassword,
			$toEmail, $type, $currency, $nameOnCard, $billingAddress, $shippingMethod, $fromAccount
		));

		$req  = sprintf("method=%s", urlencode("requestCard"));
		$req .= sprintf("&fromEmail=%s", urlencode($this->fromEmail));

		$req .= sprintf("&toEmail=%s", urlencode($toEmail));
		$req .= sprintf("&type=%s", urlencode($type));
		$req .= sprintf("&currency=%s", urlencode($currency));
		$req .= sprintf("&nameOnCard=%s", urlencode($nameOnCard));
		$req .= sprintf("&billingAddress=%s", urlencode($billingAddress));
		$req .= sprintf("&shippingMethod=%s", urlencode($shippingMethod));
		$req .= sprintf("&fromAccount=%s", urlencode($fromAccount));

		$req .= sprintf("&key=%s", urlencode($key));

		$res = $this->process($req);

		// TODO: Parse the response from server and return error code
		// printf("<textarea cols=\"60\" rows=\"10\" wrap=\"off\">\n%s\n</textarea>\n", $res);
		echo $res;
	}
	/**
	 * Process the HTTP/HTTPS request
	 *
     * @param string $req the client request
	 *
	 * @return server response
	 */
	protected function process($req)
	{
		$header  = "POST /payment/api/paymentAPI.php HTTP/1.0\r\n";
		$header .= "Host: www.prioripay.com\r\n";
		$header .= "Accept: */*\r\n";
		$header .= "User-Agent: php-agent/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Connection: close\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

		// Make the request to the server
		// If possible, securely post using HTTPS, your PHP server will need to be SSL enabled
		$fp = fsockopen ("ssl://www.prioripay.com", 443, $errno, $errstr, 30);

		if (!$fp)
		{
			// HTTP ERROR
			return -1;
		}

		//echo $req;exit;

		fputs ($fp, sprintf("%s%s", $header, $req));

		// Read the server response

		$res = "";
		$headerdone = false;
		while (!feof($fp))
		{
			$line = fgets ($fp, 1024);
			if (strcmp($line, "\r\n") == 0)
			{
				// read the header
				$headerdone = true;
			}
			else if ($headerdone)
			{
				// header has been read. now read the contents
				$res .= $line;
			}
		}

		fclose ($fp);

		return $res;
	}
}
?>