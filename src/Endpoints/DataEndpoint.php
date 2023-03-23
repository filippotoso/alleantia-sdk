<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class DataEndpoint extends Endpoint
{
    /**
     * Returns a list of actual values for the variables of a device configured in the IoT Server
     *
     * @param string $deviceId
     * @param mixed|null $id
     * @return void
     */
    public function list(string $deviceId, ?mixed $id = null)
    {
        $url = $this->url('/devices/{deviceId}/variables/data.json', $deviceId) . $this->repeat($id, 'id');

        return $this->get($url);
    }

    /**
     * Returns the actual variable value for a device configured in the IoT Server
     *
     * @param string $deviceId
     * @param string $variableId
     * @return void
     */
    public function read(string $deviceId, string $variableId)
    {
        $url = $this->url('/devices/{deviceId}/variables/{variableId}/data.json', $deviceId, $variableId);

        return $this->get($url);
    }

    /**
     * Returns the actual variable value for a device configured in the IoT Server
     *
     * @param string $deviceId
     * @param string $variableId
     * @param mixed $value
     * @return void
     */
    public function write(string $deviceId, string $variableId, mixed $value)
    {
        $url = $this->url('/devices/{deviceId}/variables/{variableId}/data.json?', $deviceId, $variableId) . http_build_query([
            'value' => $value,
        ]);

        return $this->get($url);
    }

    /**
     * Return the historical values of a variable of a device configured in the IoT Server for a specified time interval
     *
     * @param string $deviceId
     * @param string $variableId
     * @param integer $startTime
     * @param integer|null $endTime
     * @return Response
     */
    public function history(string $deviceId, string $variableId, int $startTime, ?int $endTime = null)
    {
        $url = $this->url('/devices/{deviceId}/variables/{variableId}/logdata.json?', $deviceId, $variableId) . http_build_query([
            'startTime' => $startTime,
            'endTime' => $endTime,
        ]);

        return $this->get($url);
    }

    /**
     * Returns a list with the variables actual values for the plant configured in the IoT Server
     *
     * @param mixed|null $id
     * @return void
     */
    public function variables(?mixed $id = null)
    {
        $url = '/devices/custom/variables/data.json' . $this->repeat($id, 'id');

        return $this->get($url);
    }

    /**
     * Returns the actual variable value for the plant configured in the IoT Server
     *
     * @param string $variableId
     * @return void
     */
    public function variable(string $variableId)
    {
        $url = $this->url('/devices/custom/variables/{variableId}/data.json?', $variableId);

        return $this->get($url);
    }

    /**
     * Return the historical values of a plant variable configured in the system for a specified time interval
     *
     * @param string $variableId
     * @param integer $startTime
     * @param integer|null $endTime
     * @return Response
     */
    public function customHistory(string $variableId, int $startTime, ?int $endTime = null)
    {
        $url = $this->url('/devices/custom/variables/{variableId}/logdata.json?', $variableId) . http_build_query([
            'startTime' => $startTime,
            'endTime' => $endTime,
        ]);

        return $this->get($url);
    }
}
