<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;

class PaypalController extends Controller
{

	public function payment()
	{
	$total = 500;

		$apiContext = new ApiContext(
		new OAuthTokenCredential(
		  'AV4epPFuK55nWaQ6GMswIhe_DZxPupiPXOxpYkVh4G_IkSg3nldSTI1AWdbFJddZiw1XTeuf8F0jsuvg',
			'EOogOPtnD2YNAxh7-e5Nlv5_tpAi8PmJh3jTW02mym0-feIdqalXOJvJcafMWDrKNjfhFOLN33lqyjD8'
		  )
		);

	$payer = new Payer();
	$payer->setPaymentMethod("paypal");
	$redirectUrls = new RedirectUrls();
	$redirectUrls->setReturnUrl(route('paypal.success'))
		->setCancelUrl(route('paypal.cancel'));
	$amount = new Amount();
	$amount->setCurrency("€")
		->setTotal($total);

	$transaction = new Transaction();
	$transaction->setAmount($amount)
		->setDescription(" Hola ");
	$payment = new Payment();
	$payment->setIntent('sale')
		->setPayer($payer)
		->setRedirectUrls($redirectUrls)
		->setTransactions(array($transaction));

	try{

        $payment->create($apiContext);
        return redirect($payment->getApprovalLink());

	} catch (PayPalConnectionException $ex){
		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
    }
 }

public function success(Request $request)
{

     $apiContext = new ApiContext(
	new OAuthTokenCredential(
        'AV4epPFuK55nWaQ6GMswIhe_DZxPupiPXOxpYkVh4G_IkSg3nldSTI1AWdbFJddZiw1XTeuf8F0jsuvg',
			'EOogOPtnD2YNAxh7-e5Nlv5_tpAi8PmJh3jTW02mym0-feIdqalXOJvJcafMWDrKNjfhFOLN33lqyjD8'
 )
   );


	$paymentId = $_GET['paymentId'];
	$payment = Payment::get($paymentId, $apiContext);
	$payerId = $_GET['PayerID'];

    $execution = new PaymentExecution();
    $execution->setPayerId($payerId);

	try {

		dd('success');

	} catch (PaypalConnectionException $ex) {

		echo $ex->getCode();
		echo $ex->getData();
		die($ex);
	} catch (Exception $ex) {
		die($ex);
  }
}

	public function cancel()
{
	dd('payment cancel');
}
}

