<?php

namespace SecurePayApi\Model\Response;

use SecurePayApi\Exception\InvalidResponseException;
use SecurePayApi\Exception\UnauthorizedException;
use SecurePayApi\Model\Response\Error\ErrorObject;
use SecurePayApi\Model\Response\Error\ResponseError;

class ErrorParser
{
    /**
     * @param int|string $code
     * @param array $data
     *
     * @return ResponseError
     *
     * @throws InvalidResponseException
     * @throws UnauthorizedException
     */
    public static function parse($code, array $data): ResponseError
    {
        if ($code == 400 || $code == 500) {
            $errors = [];
            if (isset($data['errors'])) {
                foreach ($data['errors'] as $error) {
                    $errors[] = new ErrorObject($error);
                }
            } elseif (isset($data['error'])) {
                $errors[] = new ErrorObject([
                    ErrorObject::ID => $data[ErrorObject::ID] ?? $data['code'] ?? null,
                    ErrorObject::CODE => $data[ErrorObject::CODE] ?? $data['error'] ?? null,
                    ErrorObject::DETAIL => $data[ErrorObject::DETAIL] ?? $data['error_description'] ?? null,
                ]);
            }
            return new ResponseError(['errors' => $errors]);
        }

        if ($code == 401) {
            throw new UnauthorizedException();
        }

        throw new InvalidResponseException();
    }
}
