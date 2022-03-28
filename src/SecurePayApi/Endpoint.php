<?php

namespace SecurePayApi;

class Endpoint
{
    public const ENDPOINT_API_SANDBOX = 'https://payments-stest.npe.auspost.zone';
    public const ENDPOINT_API_LIVE = 'https://payments.auspost.net.au';
    public const ENDPOINT_AUTH_SANDBOX = 'https://welcome.api2.sandbox.auspost.com.au/oauth/token';
    public const ENDPOINT_AUTH_LIVE = 'https://welcome.api2.auspost.com.au/oauth/token';
    public const URL_SANDBOX_SCRIPT = 'https://payments-stest.npe.auspost.zone/v3/ui/client/securepay-ui.min.js';
    public const URL_LIVE_SCRIPT = 'https://payments.auspost.net.au/v3/ui/client/securepay-ui.min.js';
}
