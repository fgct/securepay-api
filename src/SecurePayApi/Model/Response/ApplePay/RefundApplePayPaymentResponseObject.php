<?php

namespace SecurePayApi\Model\Response\ApplePay;

use SecurePayApi\Model\DataObject;

class RefundApplePayPaymentResponseObject extends DataObject
{
    public const CREATED_AT = 'createdAt';
    public const MERCHANT_CODE = 'merchantCode';
    public const AMOUNT = 'amount';
    public const STATUS = 'status';
    public const ORDER_ID = 'orderId';
    public const BANK_TRANSACTION_ID = 'bankTransactionId';
    public const GATEWAY_RESPONSE_CODE = 'gatewayResponseCode';
    public const GATEWAY_RESPONSE_MESSAGE = 'gatewayResponseMessage';
    public const ERROR_CODE = 'errorCode';

    /**
     * Getter for Created At.
     *
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Getter for Merchant Code.
     *
     * @return string
     */
    public function getMerchantCode(): string
    {
        return $this->getData(self::MERCHANT_CODE);
    }

    /**
     * Getter for Amount.
     *
     * @return int
     */
    public function getAmount(): int
    {
        return (int)$this->getData(self::AMOUNT);
    }

    /**
     * Getter for Status.
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Getter for Order Id.
     *
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Getter for Bank Transaction Id.
     *
     * @return string
     */
    public function getBankTransactionId(): string
    {
        return $this->getData(self::BANK_TRANSACTION_ID);
    }

    /**
     * Getter for Gateway Response Code.
     *
     * @return string
     */
    public function getGatewayResponseCode(): string
    {
        return $this->getData(self::GATEWAY_RESPONSE_CODE);
    }

    /**
     * Getter for Gateway Response Message.
     *
     * @return string
     */
    public function getGatewayResponseMessage(): string
    {
        return $this->getData(self::GATEWAY_RESPONSE_MESSAGE);
    }

    /**
     * Getter for Error Code.
     *
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->getData(self::ERROR_CODE);
    }
}
