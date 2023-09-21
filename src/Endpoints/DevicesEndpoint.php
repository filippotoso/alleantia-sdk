<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class DevicesEndpoint extends Endpoint
{
    /**
     * Returns a data list to retrieve information on all devices configured in the IoT Server
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->get('/devices.json');
    }

    /**
     * Returns the configuration information for device configured in the system
     *
     * @param string $deviceId
     * @return Response
     */
    public function device(string $deviceId): Response
    {
        $url = $this->url('/devices/{deviceId}/config.json', compact('deviceId'));

        return $this->get($url);
    }
}
