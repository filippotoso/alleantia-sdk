<?php

namespace FilippoToso\Alleantia;

use FilippoToso\Alleantia\Endpoints\AlarmsEndpoint;
use FilippoToso\Alleantia\Endpoints\DataEndpoint;
use FilippoToso\Api\Sdk\Sdk;
use FilippoToso\Alleantia\Endpoints\DevicesEndpoint;
use FilippoToso\Alleantia\Endpoints\EventsEndpoint;
use FilippoToso\Alleantia\Endpoints\LicenseEndpoint;
use FilippoToso\Alleantia\Endpoints\ManagementEndpoint;
use FilippoToso\Alleantia\Endpoints\SystemEndpoint;
use FilippoToso\Alleantia\Endpoints\VariablesEndpoint;

class Alleantia extends Sdk
{
    /**
     * Alarms endpoint
     *
     * @return AlarmsEndpoint
     */
    public function alarms(): AlarmsEndpoint
    {
        return new AlarmsEndpoint($this);
    }

    /**
     * Data endpoint
     *
     * @return DataEndpoint
     */
    public function data(): DataEndpoint
    {
        return new DataEndpoint($this);
    }

    /**
     * Devices endpoint
     *
     * @return DevicesEndpoint
     */
    public function devices(): DevicesEndpoint
    {
        return new DevicesEndpoint($this);
    }

    /**
     * Events endpoint
     *
     * @return EventsEndpoint
     */
    public function events(): EventsEndpoint
    {
        return new EventsEndpoint($this);
    }

    /**
     * License endpoint
     *
     * @return LicenseEndpoint
     */
    public function license(): LicenseEndpoint
    {
        return new LicenseEndpoint($this);
    }

    /**
     * Management endpoint
     *
     * @return ManagementEndpoint
     */
    public function management(): ManagementEndpoint
    {
        return new ManagementEndpoint($this);
    }

    /**
     * System endpoint
     *
     * @return SystemEndpoint
     */
    public function system(): SystemEndpoint
    {
        return new SystemEndpoint($this);
    }

    /**
     * Variables endpoint
     *
     * @return VariablesEndpoint
     */
    public function variables(): VariablesEndpoint
    {
        return new VariablesEndpoint($this);
    }
}
