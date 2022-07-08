<?php

namespace SecurePayApi\Model\Response\ApplePay;

use SecurePayApi\Model\DataObject;

class ApplePayPaymentResponseObject extends DataObject
{
    public const CREATED_AT = 'createdAt';
    public const AMOUNT = 'amount';
    public const CURRENCY = 'currency';
    public const STATUS = 'status';
    public const BANK_TRANSACTION_ID = 'bankTransactionId';
    public const GATEWAY_RESPONSE_CODE = 'gatewayResponseCode';
    public const GATEWAY_RESPONSE_MESSAGE = 'gatewayResponseMessage';
    public const ERROR_CODE = 'errorCode';
    public const MERCHANT_CODE = 'merchantCode';
    public const IP = 'ip';
    public const ORDER_ID = 'orderId';

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
     * Getter for Amount.
     *
     * @return int
     */
    public function getAmount(): int
    {
        return (int)$this->getData(self::AMOUNT);
    }

    /**
     * Getter for Currency.
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->getData(self::CURRENCY);
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
     * Getter for Ip.
     *
     * @return string
     */
    public function getIp(): string
    {
        return $this->getData(self::IP);
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
}
