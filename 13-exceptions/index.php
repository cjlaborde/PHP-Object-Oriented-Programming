<?php

class PaymentGatewayException extends Exception
{
}

# remember this may be in a separate file in a directory where you store all your exceptions
class GatewayPaymentFailedException extends PaymentGatewayException
{
    protected $message = 'Payment failed';
}

class InvalidGatewayTokenException extends PaymentGatewayException
{
    protected $message = 'Invalid token';
}

class PaymentGateway
{
    public function charge($token, $amount)
    {

        // Check if token is valid

        if (0) {
            throw new InvalidGatewayTokenException; //  Fatal error: Uncaught Exception: Payment failed
        }

        if (1) {
            throw new GatewayPaymentFailedException; //  Fatal error: Uncaught Exception: Payment failed
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);
    echo 'Update subscription';
} catch (PaymentGatewayException $e) {
    // die($e->getMessage());
} finally {
    die('finally');
}


/*
class PaymentGateway
{
    # payment method token
    # usually when you work with payment providers and user enter their card details
    # The card information will be translated into a token that we can store and
    # used to charge user.
    public function charge($token, $amount)
    {
        */
        /*
        $payment = $this->service->charge($token, $amount);

        if (!$payment->success) {
            return false;
        }
        */
        /*

        if (1) {
            // throw new Exception; //Uncaught Exception
            // throw new Exception('Payment failed'); //  Fatal error: Uncaught Exception: Payment failed
            throw new Exception('Payment failed'); //  Fatal error: Uncaught Exception: Payment failed
        }
    }
}

$gateway = new PaymentGateway;

try {
    $gateway->charge('123', 25.00);

    // update subscription
    echo 'Update subscription';
} catch (Exception $e) {
    // redirect user
    // flash error message
    die('Payment failed'); // Payment failed
}

*/


### Checking using if statement instead of using Exception
/*
if (!$gateway->charge('123', 25.00)) {
    die('Payment failed');
}
*/

// $gateway->charge('123', 25.00);
