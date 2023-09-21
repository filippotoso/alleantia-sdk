<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class AlarmsEndpoint extends Endpoint
{
    /**
     * Returns a list of all active alarms in the IoT Server. In case there are no active alarms returns a void list
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->get('/alarms.json');
    }

    /**
     * Returns a list of all active alarms in the IoT Server. In case there are no active alarms returns a void list
     *
     * @return Response
     */
    public function alarm(string $alarmId): Response
    {
        return $this->get($this->url('/alarms/{alarmId}/config.json', compact('alarmId')));
    }

    /**
     * Returns a list of active alarms in the IoT Server
     *
     * @param string|null $alarmId
     * @return Response
     */
    public function active(?string $alarmId = null): Response
    {
        $url = '/alarms/active.json' . $this->repeat($alarmId, 'alarmId');

        return $this->get($url);
    }

    /**
     * Returns the historical list of the alarms in the IoT Server sorted by ascending time
     *
     * @param string|null $alarmId
     * @return Response
     */
    public function history(?string $startEventId = null, ?string $endEventId, bool $includeActive = false): Response
    {
        $url = '/alarms/history.json?' . http_build_query([
            'startEventId' => $startEventId,
            'endEventId' => $endEventId,
            'includeActive' => ($includeActive) ? 'true' : 'false',
        ]);

        return $this->get($url);
    }
}
