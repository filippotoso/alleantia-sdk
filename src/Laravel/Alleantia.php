<?php

namespace FilippoToso\Alleantia\Laravel;

use FilippoToso\Alleantia\Alleantia as BaseAlleantia;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \FilippoToso\Alleantia\Endpoints\ALarmsEndpoint alarms()
 * @method static \FilippoToso\Alleantia\Endpoints\DataEndpoint data()
 * @method static \FilippoToso\Alleantia\Endpoints\DevicesEndpoint devices()
 * @method static \FilippoToso\Alleantia\Endpoints\EventsEndpoint events()
 * @method static \FilippoToso\Alleantia\Endpoints\LicenseEndpoint license()
 * @method static \FilippoToso\Alleantia\Endpoints\ManagementEndpoint management()
 * @method static \FilippoToso\Alleantia\Endpoints\SystemEndpoint chat()
 * @method static \FilippoToso\Alleantia\Endpoints\VariablesEndpoint variables()
 *
 * @see \FilippoToso\Alleantia\Alleantia
 */
class Alleantia extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return BaseAlleantia::class;
    }
}
