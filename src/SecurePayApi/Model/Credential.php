<?php

namespace SecurePayApi\Model;

use SecurePayApi\Exception\InvalidResponseException;
use SecurePayApi\Exception\RequestException;
use SecurePayApi\Model\Response\Error\ResponseError;
use SecurePayApi\Request\ClientCredentialsRequest;

class Credential
{
    protected bool $isLive;
    protected string $merchantCode;
    protected string $clientId;
    protected string $clientSecret;
    protected string $token;

    /**
     * @param bool $isLive
     * @param string $merchantCode
     * @param string $clientId
     * @param string $clientSecret
     * @param string|null $token
     *
     * @throws InvalidResponseException
     * @throws RequestException
     */
    public function __construct(
        bool $isLive,
        string $merchantCode,
        string $clientId,
        string $clientSecret,
        ?string $token = null
    ) {
        $this->isLive = $isLive;
        $this->merchantCode = $merchantCode;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        if (!$token) {
            $request = new ClientCredentialsRequest($isLive, $clientId, $clientSecret);
            $response = $request->execute();
            if ($response instanceof ResponseError) {
                throw new RequestException($response->getFirstError()->getDetail());
            }

            $token = $response->getAccessToken();
        }
        $this->token = $token;
    }

    /**
     * @return bool
     */
    public function isLive(): bool
    {
        return $this->isLive;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getMerchantCode(): string
    {
        return $this->merchantCode;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }
}
