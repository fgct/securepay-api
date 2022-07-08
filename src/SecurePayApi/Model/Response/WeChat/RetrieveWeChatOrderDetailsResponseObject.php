<?php

namespace SecurePayApi\Model\Response\WeChat;

use SecurePayApi\Model\DataObject;

class RetrieveWeChatOrderDetailsResponseObject extends DataObject
{
    public const CREATED_AT = 'createdAt';
    public const MERCHANT_CODE = 'merchantCode';
    public const CUSTOMER_CODE = 'customerCode';
    public const AMOUNT = 'amount';
    public const ORDER_ID = 'orderId';
    public const PROVIDER_REFERENCE_NUMBER = 'providerReferenceNumber';
    public const STATUS = 'status';

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
     * Getter for Customer Code.
     *
     * @return string
     */
    public function getCustomerCode(): string
    {
        return $this->getData(self::CUSTOMER_CODE);
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
     * Getter for Order Id.
     *
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->getData(self::ORDER_ID);
    }

    /**
     * Getter for Provider Reference Number.
     *
     * @return string
     */
    public function getProviderReferenceNumber(): string
    {
        return $this->getData(self::PROVIDER_REFERENCE_NUMBER);
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
}
