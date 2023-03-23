<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class EventsEndpoint extends Endpoint
{
    /**
     * Return information relative to events that can be generated by the system through a JSON object
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->get('/events/info.jso');
    }

    /**
     * Returns the historical list of the alarms in the IoT Server sorted by ascending time
     *
     * @param string|null $eventId
     * @return Response
     */
    public function active(?string $eventId): Response
    {
        $url = '/events/active.json?' . http_build_query([
            'eventId' => $eventId,
        ]);

        return $this->get($url);
    }

    /**
     * Return information relative to the single event that can be generated by the system through a JSON object
     *
     * @param string $eventId
     * @return Response
     */
    public function event(string $eventId): Response
    {
        return $this->get($this->url('/events/{eventId}/info.json', $eventId));
    }

    /**
     * Returns the historical list of the alarms in the IoT Server sorted by ascending time
     *
     * @param string $eventId
     * @param integer $startTime
     * @param integer|null $endTime
     * @return Response
     */
    public function eventHistory(string $eventId, int $startTime, ?int $endTime = null): Response
    {
        $url = $this->url('/events/{eventId}/history.json?', $eventId) . http_build_query([
            'startTime' => $startTime,
            'endTime' => $endTime,
        ]);

        return $this->get($url);
    }

    /**
     * Return the historical events in the IoT Server for a specified time interval
     *
     * @param integer $startTime
     * @param integer|null $endTime
     * @return Response
     */
    public function history(int $startTime, ?int $endTime = null)
    {
        $url = '/events/history.json?' . http_build_query([
            'startTime' => $startTime,
            'endTime' => $endTime,
        ]);

        return $this->get($url);
    }
}
