<?php

class PaymentController extends BaseController
{

    public function Index()
    {

        //grap the credentials . be sute to set your acct1.ClientId and acct1.ClientSecret on sdk_config.ini

        $cred = Paypalpayment::OAuthTokenCredential();
        // ### Payer
        // A resource representing a Payer that funds a payment

        $payer = Paypalpayment::Payer();
        $payer->setPayment_method("paypal");

        // ### Amount
        // Let's you specify a payment amount.
        $amount = Paypalpayment::Amount();
        $amount->setCurrency("USD");
        $amount->setTotal("1.00");

        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types
        $transaction = Paypalpayment::Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription("This is the payment description.");

        // ### Redirect urls
        // Set the urls that the buyer must be redirected to after
        // payment approval/ cancellation.
        $baseUrl = Paypalpayment::getBaseUrl();
        $redirectUrls = Paypalpayment::RedirectUrls();
        $redirectUrls->setReturn_url("$baseUrl/executepaymentsuccess");
        $redirectUrls->setCancel_url("$baseUrl/executepaymentcancel");

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'
        $payment = Paypalpayment::Payment();
        $payment->setIntent("sale");
        $payment->setPayer($payer);
        $payment->setRedirect_urls($redirectUrls);
        $payment->setTransactions(array($transaction));

        // ### Api Context
        // Pass in a `ApiContext` object to authenticate
        // the call and to send a unique request id
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly.
        $apiContext = Paypalpayment::ApiContext($cred, 'Request' . time());

        // ### Create Payment
        // Create a payment by posting to the APIService
        // using a valid apiContext
        // The return object contains the status and the
        // url to which the buyer must be redirected to
        // for payment approval
        try {
            $payment->create($apiContext);
        } catch (\PPConnectionException $ex) {
            echo "Exception: " . $ex->getMessage() . PHP_EOL;
            var_dump($ex->getData());
            exit(1);
        }

        // ### Redirect buyer to paypal
        // Retrieve buyer approval url from the `payment` object.
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirectUrl = $link->getHref();
            }
        }
        // It is not really a great idea to store the payment id
        // in the session. In a real world app, please store the
        // payment id in a database.
        $_SESSION['paymentId'] = $payment->getId();
        if (isset($redirectUrl)) {
            header("Location: $redirectUrl");
            exit;
        }
    }

    public function ExecutePaymentSuccess()
    {

        // ### Api Context
        // Pass in a `ApiContext` object to authenticate
        // the call and to send a unique request id
        // (that ensures idempotency). The SDK generates
        // a request id if you do not pass one explicitly.
        $apiContext = Paypalpayment:: ApiContext($cred);

        // Get the payment Object by passing paymentId
        // payment id was previously stored in session
        $paymentId = $_SESSION['paymentId'];
        $payment = Paypalpayment::getPayment($paymentId);

        // PaymentExecution object includes information necessary
        // to execute a PayPal account payment.
        // The payer_id is added to the request query parameters
        // when the user is redirected from paypal back to your site
        $execution = Paypalpayment:: PaymentExecution();
        $execution->setPayer_id($_GET['PayerID']);

        //Execute the payment
        $payment->execute($execution, $apiContext);

        echo "<pre>";
        var_dump($payment->toArray());
    }

    public function ExecutePaymentCancel()
    {
        return "User cancelled payment.";
    }

}