<?php

namespace SecurePayApi\Request\CardPayment;

use SecurePayApi\Model\Credential;
use SecurePayApi\Model\Response\CardPayment\RefundObject;
use SecurePayApi\Request\RestApiRequest;

class RefundPaymentRequest extends RestApiRequest
{
    protected string $orderId;

    public function __construct(bool $isLive, Credential $credential, array $data, string $orderId)
    {
        parent::__construct($isLive, $credential, $data);
        $this->orderId = $orderId;
    }

    public function getEndpoint(): string
    {
        return $this->buildUrl(parent::getEndpoint(), 'orders', $this->orderId, 'refunds');
    }

    protected function getResponseClass(): string
    {
        return RefundObject::class;
    }
}
