<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

class LicenseEndpoint extends Endpoint
{
    /**
     * Returns a data list to retrieve information on all devices configured in the IoT Server
     * @return Response
     */
    public function info(): Response
    {
        return $this->get('/license/info.json');
    }

    /**
     * Activate, if possible, the license obtained using the file license.lic as a parameter in the message body
     *
     * @return Response
     */
    public function activate(bool $reboot = false): Response
    {
        throw new \Exception('Not yet implemented');
    }
}
