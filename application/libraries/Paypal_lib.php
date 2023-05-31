<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'libraries/autoload.php';

use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class Paypal_lib {

    protected $apiContext;
    protected $clientID;
    protected $clientSecret;

    public function __construct()
    {
        $this->clientID = 'Acmh3KZMzUPKt05VR0Mc7wpIKZyJ_7byR1YKQVemCmd4SE8I8LiRKCqkN_JHrDpxMuoBGtQoESF6cJbA';
        $this->clientSecret = 'EDcTWGGCYHqAnofrSt_k-LFIZgs-29IzGwo2tbpy93xi2CYV3FWKDvFtAHZk4MK7fS8bbMRXDeRHUxEO';

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential($this->clientID, $this->clientSecret)
        );
    }

    public function getApiContext()
    {
        return $this->apiContext;
    }
}
