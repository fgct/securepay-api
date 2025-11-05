<?php

namespace SecurePayApi\Request;

use SecurePayApi\Exception\InvalidResponseException;
use SecurePayApi\Exception\RequestException;
use SecurePayApi\Exception\UnauthorizedException;
use SecurePayApi\Model\Response\Error\ResponseError;
use SecurePayApi\Model\Response\ErrorParser;

abstract class Request
{
    public const CONTENT_TYPE_JSON = 'application/json';
    public const CONTENT_TYPE_FORM = 'application/x-www-form-urlencoded';
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_DELETE = 'DELETE';
    public const HEADER_AUTHORIZATION = 'Authorization';
    public const HEADER_CONTENT_TYPE = 'Content-Type';
    protected bool $isLive;

    public function __construct(
        bool $isLive
    ) {
        $this->isLive = $isLive;
    }

    abstract public function execute();

    /**
     * @param string $url
     * @param string $method
     * @param array|string|null $data
     * @param array|null $headers
     * @param string|null $contentType
     *
     * @return mixed|ResponseError
     *
     * @throws InvalidResponseException
     * @throws RequestException
     * @throws UnauthorizedException
     */
    protected function request(
        string $url,
        string $method,
        $data = null,
        ?array $headers = null,
        ?string $contentType = null
    ) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        if ($method === self::METHOD_POST) {
            curl_setopt($ch, CURLOPT_POST, 1);
        } else {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        }

        $requestHeaders = [];

        if ($contentType) {
            $requestHeaders[] = self::HEADER_CONTENT_TYPE . ': ' . $contentType;
        }

        if (!empty($data)) {
            if (!$contentType) {
                $contentType = self::CONTENT_TYPE_JSON;
                $requestHeaders[] = self::HEADER_CONTENT_TYPE . ': ' . $contentType;
            }
            if (is_string($data)) {
                $requestData = $data;
            } elseif (is_array($data)) {
                if ($contentType === self::CONTENT_TYPE_JSON) {
                    $requestData = json_encode($data);
                } else {
                    $requestData = http_build_query($data);
                }
            } else {
                $requestData = json_encode($data);
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
        }

        if (!empty($headers)) {
            foreach ($headers as $key => $header) {
                $requestHeaders[] = "$key: $header";
            }
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new RequestException(curl_error($ch));
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $resultArray = json_decode($result, true);

        if ($resultArray === null) {
            throw new InvalidResponseException('Invalid response from gateway sever.');
        }

        if ($httpCode >= 200 && $httpCode < 300) {
            $responseClass = $this->getResponseClass();
            return new $responseClass($resultArray);
        }

        return ErrorParser::parse($httpCode, $resultArray);
    }

    /**
     * Response Class must extends DataObject class
     * @see \SecurePayApi\Model\DataObject
     *
     * @return string
     */
    abstract protected function getResponseClass(): string;

    protected function buildUrl(string ...$parts): string
    {
        $parts = array_map(function ($part) {
            return trim($part, "\\/\t\r\n\0\x0B");
        }, $parts);

        return join('/', $parts);
    }
}
