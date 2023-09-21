<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Endpoint as BaseEndpoint;

class Endpoint extends BaseEndpoint
{
    /**
     * Replace tokens in url
     *
     * @param string $format
     * @param array $params
     * @return string
     */
    protected function url(string $format, $params): string
    {
        $url = $format;

        foreach ($params as $key => $value) {
            $url = str_replace('{' . $key . '}', urlencode($value), $url);
        }

        return $url;
    }

    /**
     * Create repeatable query params
     *
     * @param mixed $values
     * @param string $field
     * @return ?string
     */
    protected function repeat(mixed $values, string $field, string $prefix = '?'): ?string
    {
        if (is_null($values)) {
            return null;
        }

        $values = is_array($values) ? $values : [$values];

        $result = array_reduce($values, function ($carry, $value) use ($field) {
            return $carry . urlencode($field) . '=' . urlencode($value) . '&';
        });

        return $prefix . $result;
    }
}
