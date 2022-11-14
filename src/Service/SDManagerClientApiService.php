<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class SDManagerClientApiService
{
    private $client;
    

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getProgetti(string $dataInizio, string $dataFine): array
    {
         
        $response = $this->client->request(
            'GET',
            'https://demo.sdmanager.it/ws/1.0/mSADManager/list-progetti/'. $dataInizio . "/" . $dataFine  
        );

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
    public function getUtenti(): array
    {
        $response = $this->client->request(
            'GET',
            ''
        );

        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}