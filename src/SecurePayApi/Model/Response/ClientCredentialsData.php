<?php

namespace SecurePayApi\Model\Response;

use SecurePayApi\Model\DataObject;

class ClientCredentialsData extends DataObject
{
    public const ACCESS_TOKEN = 'access_token';
    public const TOKEN_TYPE = 'token_type';
    public const EXPIRES_IN = 'expires_in';
    public const SCOPE = 'scope';

    /**
     * Getter for Access Token.
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->getData(self::ACCESS_TOKEN);
    }

    /**
     * Getter for Token Type.
     *
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->getData(self::TOKEN_TYPE);
    }

    /**
     * Getter for Expires In.
     *
     * @return int
     */
    public function getExpiresIn(): int
    {
        return (int)$this->getData(self::EXPIRES_IN);
    }

    /**
     * Getter for Scope.
     *
     * @return string
     */
    public function getScope(): string
    {
        return $this->getData(self::SCOPE);
    }
}
