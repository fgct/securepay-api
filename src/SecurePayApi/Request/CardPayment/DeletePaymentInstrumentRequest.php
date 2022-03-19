<?php

namespace SecurePayApi\Request\CardPayment;

use SecurePayApi\Model\Credential;
use SecurePayApi\Model\Response\CardPayment\DeletePaymentInstrumentObject;

class DeletePaymentInstrumentRequest extends CardPaymentRequest
{
    protected string $customerCode;

    public function __construct(bool $isLive, Credential $credential, array $data, string $customerCode)
    {
        parent::__construct($isLive, $credential, $data);
        $this->customerCode = $customerCode;
    }

    protected function getEndpoint(): string
    {
        return $this->buildUrl('customers', $this->customerCode, 'payment-instruments', 'token');
    }

    protected function getRequestMethod(): string
    {
        return self::METHOD_DELETE;
    }

    protected function getResponseClass(): string
    {
        return DeletePaymentInstrumentObject::class;
    }
}
