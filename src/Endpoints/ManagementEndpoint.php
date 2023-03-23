<?php

namespace FilippoToso\Alleantia\Endpoints;

use FilippoToso\Api\Sdk\Support\Response;

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
        $url = $this->url('/devices/{deviceId}/documents/list?', $deviceId) . http_build_query([
            'path' => $path,
        ]);

        return $this->get($url);
    }

    /**
     * Upload a file in the selected folder.
     *
     * @param string $deviceId
     * @param string $destinationFolder
     * @param string $content
     * @return Response
     */
    public function upload(string $deviceId, string $destinationFolder, string $content): Response
    {
        throw new \Exception('Not yet implemented');
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
        $url = $this->url('/devices/{deviceId}/documents/download?', $deviceId) . http_build_query([
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
        $url = $this->url('/devices/{deviceId}/documents/delete?', $deviceId) . http_build_query([
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
        $url = $this->url('/devices/{deviceId}/documents/createSubfolder?', $deviceId) . http_build_query([
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
        $url = $this->url('/devices/{deviceId}/documents/deleteSubfolder?', $deviceId) . http_build_query([
            'folderPath' => $folderPath,
        ]);

        return $this->delete($url);
    }
}
