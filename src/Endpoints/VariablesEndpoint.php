<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class VariablesEndpoint extends Endpoint
{
    /**
     * Returns a list with the information on variables configuration of a device configured in the IoT Server.
     *
     * @param string $deviceId
     * @param mixed $id
     * @return Response
     */
    public function list(string $deviceId, mixed $id = null): Response
    {
        $url = $this->url('/devices/{deviceId}/variables/config.json', compact('deviceId')) . $this->repeat($id, 'id');

        return $this->get($url);
    }

    /**
     * Returns the information on a variable configuration for a device configured on the IoT Server.
     *
     * @param string $deviceId
     * @param string $variableId
     * @return Response
     */
    public function variable(string $deviceId, string $variableId): Response
    {
        $url = $this->url('/devices/{deviceId}/variables/{variableId}/config.json', compact('deviceId', 'variableId'));

        return $this->get($url);
    }

    /**
     * Returns a list with the information on variables configuration of the plant configured in the IoT Server.
     *
     * @param string $deviceId
     * @param mixed $id
     * @return Response
     */
    public function customVariables(string $deviceId, mixed $id = null): Response
    {
        $url = $this->url('/devices/custom/variables/config.json', compact('deviceId')) . $this->repeat($id, 'id');

        return $this->get($url);
    }

    /**
     * Returns the information on a variable configuration for a plant configured on the IoT Server.
     *
     * @param string $deviceId
     * @param string $variableId
     * @return Response
     */
    public function customVariable(string $deviceId, string $variableId): Response
    {
        $url = $this->url('/devices/custom/variables/{variableId}/config.json', compact('deviceId', 'variableId'));

        return $this->get($url);
    }
}
