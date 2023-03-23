<?php

namespace FilippoToso\Alleantia;

use FilippoToso\Api\Sdk\Support\Options as BaseOptions;
use InvalidArgumentException;

class Options extends BaseOptions
{
    public function __construct(array $options = [])
    {
        if (!array_key_exists('username', $options)) {
            throw new InvalidArgumentException('Missing username option.');
        }

        if (!array_key_exists('password', $options)) {
            throw new InvalidArgumentException('Missing password option.');
        }

        if (!array_key_exists('base_url', $options)) {
            throw new InvalidArgumentException('Missing base_url option.');
        }

        $options = [
            'uri' => $options['base_url'] . '/api/v2',
            'headers' => array_filter([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode($options['username'] . ':' . $options['password']),
            ]),
        ];

        parent::__construct($options);
    }
}
