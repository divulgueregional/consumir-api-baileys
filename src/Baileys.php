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
            'base_uri' => "{$config['http']}://{$config['dominio']}:{$config['porta']}",
        ]);
        $this->optionsRequest = [
            'headers' => [
                'Accept' => '*/*',
                'Content-Type' => 'application/json',
            ],
            // 'debug' => true,
        ];
        $this->config = $config;
    }

    #######################################################
    ############# InstanceController ###################
    #######################################################
    public function init(array $filters){
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'POST',
                "/rest/instance/init",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function list(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/list",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function instance_key(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/{$this->config['instance']}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function obterChats(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/chats/{$this->config['instance']}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function obterContacts(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/contacts/{$this->config['instance']}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function obterMessages(string $chat_id){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/messages/{$this->config['instance']}?chat_id={$chat_id}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function isOnWhatsApp(string $phone){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/isOnWhatsApp/{$this->config['instance']}?jid=55{$phone}@s.whatsapp.net",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function qrcode(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/qrcode/{$this->config['instance']}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $urlQRCode = null;
            if($statusCode==200){
                $urlQRCode = "{$this->config['http']}://{$this->config['dominio']}:{$this->config['porta']}/rest/instance/qrcode/{$this->config['instance']}";
            }
            return array('status' => $statusCode, 'urlQRCode' => $urlQRCode);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    #######################################################
    ############# SendMessageController ###################
    #######################################################
    public function textToMany(array $filter){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/textToMany",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function text(array $filter){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/text",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function mediaURL(array $filter){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/mediaUrl",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }
    
    public function image(array $info){
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/image",
                [
                    "query" => [
                        "id" => $info['id'],
                        "caption" => $info['caption']
                    ],
                    "multipart" => [
                        [
                            "name" => 'file',
                            'Content-type' => 'multipart/form-data, boundary=sendfile',
                            "filename" => $info['caption'],
                            'headers'  => ['Content-Type' => "image/png"],
                            "contents" => file_get_contents($info['link'])
                        ]
                    ],
                ],
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    
    public function video(array $info){

    }

    public function audio(array $info){

    }

    public function document(array $info){
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/document",
                [
                    "query" => [
                        "id" => $info['id'],
                        "caption" => $info['caption']
                    ],
                    "multipart" => [
                        [
                            "name" => 'file',
                            'Content-type' => 'multipart/form-data, boundary=sendfile',
                            "filename" => $info['filename'],
                            'headers'  => ['Content-Type' => 'application/pdf'],
                            "contents" => file_get_contents($info['link'])
                        ]
                    ],
                    // 'debug' => true,
                ],
            );
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function location(array $info){

    }

    public function button(array $filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/templateMessage",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function templateMessageWithMedia(array $info){

    }

    public function contactMessage(array $filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/contactMessage",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    public function listMessage(array $filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$this->config['instance']}/listMessage",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o texto: {$response}"];
        }
    }

    ##############################################
    ######## FIM - SEND MESSAGEM CONTROLLER ######
    ##############################################

    ##############################################
    ######## FERRAMENTAS #########################
    ##############################################
    private function parseResultClient($result)
    {
        $statusCode = $result->getResponse()->getStatusCode();
        $response = $result->getResponse()->getReasonPhrase();
        $body = $result->getResponse()->getBody()->getContents();

        return ['error' => $body, 'response' => $response, 'statusCode' => $statusCode];
    }
}