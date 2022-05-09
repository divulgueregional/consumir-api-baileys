<?php
namespace Divulgueregional\consumirapibaileys;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;

class Baileys{
    protected $instance;
    private $client;
    function __construct(array $config)
    {
        $this->client = new Client([
            'base_uri' => "{$config['http']}://{$config['dominio']}:{$config['porta']}/rest",
        ]);

        $this->instance = $config['instance'];
        $this->optionsRequest = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type: application/json',
            ],
        ];
    }

    #######################################################
    ############# SendMessageController ###################
    #######################################################
    public function text($filter){
        $options = $this->optionsRequest;
        $options['body'] = json_encode($filter);

        try {
            $response = $this->client->request(
                'POST',
                "/sendMessage/{$this->instance}/text",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return $result;
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            // return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }
}