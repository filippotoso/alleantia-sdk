<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;
use Http\Message\MultipartStream\MultipartStreamBuilder;

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
    public function activate(string $path, bool $reboot = false): Response
    {
        $url = '/license/activate.json' . http_build_query([
            'reboot' => ($reboot) ? 'true' : 'false',
        ]);

        $builder = new MultipartStreamBuilder($this->sdk->stream());
        $builder->addResource(
            'license',
            fopen($path, 'r'),
            [
                'filename' => basename($path),
                'headers' => ['Content-Type' => 'multipart/form-data']
            ]
        );

        $headers = ['Content-Type' => 'multipart/form-data; boundary="' . $builder->getBoundary() . '"'];

        return $this->post($url, $headers, $builder->build());
    }
}
