<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class SystemEndpoint extends Endpoint
{
    /**
     * Get system information
     * @return Response
     */
    public function info(): Response
    {
        return $this->get('/info.json');
    }
}
