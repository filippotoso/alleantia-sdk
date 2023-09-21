<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;
use Http\Message\MultipartStream\MultipartStreamBuilder;

class ManagementEndpoint extends Endpoint
{
    /**
     * Returns the list of files and directories (aliases and real paths) for every device connected to the IoT
     *
     * @return Response
     */
    public function list(): Response
    {
        return $this->get('/devices/documents/list');
    }

    /**
     * Returns the list of files and directories (aliases and real paths) in the indicated folder, if it’s authorized.
     *
     * @param string $deviceId
     * @param string $path
     * @return Response
     */
    public function deviceList(string $deviceId, string $path): Response
    {
        $url = $this->url('/devices/{deviceId}/documents/list?', compact('deviceId')) . http_build_query([
            'path' => $path,
        ]);

        return $this->get($url);
    }

    /**
     * Upload a file in the selected folder.
     *
     * @param string $deviceId
     * @param string $destinationFolder
     * @param string $path
     * @param string|null $filename
     * @return Response
     */
    public function upload(string $deviceId, string $destinationFolder, string $path, ?string $filename = null): Response
    {
        $destinationFolder .= (substr($destinationFolder, -1) != '/') ? '/' : '';
        $filename = is_null($filename) ? basename($path) : $filename;

        $url = $this->url('/devices/{deviceId}/documents/upload?', compact('deviceId')) . http_build_query([
            'destinationFolder' => $destinationFolder,
        ]);

        $builder = new MultipartStreamBuilder($this->sdk->stream());
        $builder->addResource(
            'uploadFile',
            fopen($path, 'r'),
            [
                'filename' => $filename,
                'headers' => ['Content-Type' => 'multipart/form-data']
            ]
        );

        $headers = ['Content-Type' => 'multipart/form-data; boundary="' . $builder->getBoundary() . '"'];

        return $this->post($url, $headers, $builder->build());
    }

    /**
     * Download the selected file
     *
     * @param string $deviceId
     * @param string $filePath
     * @return Response
     */
    public function downloadFile(string $deviceId, string $filePath): Response
    {
        $url = $this->url('/devices/{deviceId}/documents/download?', compact('deviceId')) . http_build_query([
            'filePath' => $filePath,
        ]);

        return $this->get($url);
    }

    /**
     * Deletes the selected file
     *
     * @param string $deviceId
     * @param string $filePath
     * @return Response
     */
    public function deleteFile(string $deviceId, string $filePath): Response
    {
        $url = $this->url('/devices/{deviceId}/documents/delete?', compact('deviceId')) . http_build_query([
            'filePath' => $filePath,
        ]);

        return $this->delete($url);
    }

    /**
     * Create a sub-folder in the selected path
     *
     * @param string $deviceId
     * @param string $folderPath
     * @param string $subfolderName
     * @return Response
     */
    public function createSubfolder(string $deviceId, string $folderPath, string $subfolderName): Response
    {
        $url = $this->url('/devices/{deviceId}/documents/createSubfolder?', compact('deviceId')) . http_build_query([
            'folderPath' => $folderPath,
            'subfolderName' => $subfolderName,
        ]);

        return $this->post($url);
    }

    /**
     * Delete a sub-folder in the selected path
     *
     * @param string $deviceId
     * @param string $folderPath
     * @param string $subfolderName
     * @return Response
     */
    public function deleteSubfolder(string $deviceId, string $folderPath): Response
    {
        $url = $this->url('/devices/{deviceId}/documents/deleteSubfolder?', compact('deviceId')) . http_build_query([
            'folderPath' => $folderPath,
        ]);

        return $this->delete($url);
    }
}
