<?php
namespace Divulgueregional\consumirapibaileys;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\File;

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
            ],'debug' => true,
        ];
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

    public function instance_key(string $instance){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/{$instance}",
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

    public function obterChats(string $instance){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/chats/{$instance}",
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

    public function obterContacts(string $instance){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/contacts/{$instance}",
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

    public function obterMessages(string $instance, string $chat_id){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/messages/{$instance}?chat_id={$chat_id}",
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

    public function isOnWhatsApp(string $instance, string $phone){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/isOnWhatsApp/{$instance}?jid=55{$phone}@s.whatsapp.net",
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

    public function qrcode(string $instance, array $config){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/qrcode/{$instance}",
                $options
            );

            $statusCode = $response->getStatusCode();
            $urlQRCode = null;
            if($statusCode==200){
                $urlQRCode = "{$config['http']}://{$config['dominio']}:{$config['porta']}/rest/instance/qrcode/{$instance}";
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
    public function text(array $filter, string $instance){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$instance}/text",
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

    public function document(string $instance, $file){
        // $options = $this->optionsRequest;
        // $options['headers']['Content-Type'] = 'multipart/form-data';
        // $options['body'] = $postfields;
        $tmp = tempnam( sys_get_temp_dir(), 'php' );
        print_r($file);
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/drsystema/document?id=555484384705",
                [
                    'multipart' => [
                        'headers' => [
                            'Accept' => '*/*',
                            'Content-Type' => 'multipart/form-data',
                        ],
                        'body' => [
                            'name' => 'nota',
                            // 'name'     => 'myFile',

                            // 'contents' => 'C:/aplicativos/projetos/drsystema/themes/drsystema/_sis/api/Baileys/doc/nota.pdf',
                            // 'contents' => $file,
                            'contents' => file_get_contents($file),
                            // 'contents' => file_put_contents( $tmp, file_get_contents( $file ) ),
                            'filename' => "nota.pdf",
                            'type' =>' application/pdf',
                        ],
                    ],
                    // 'verify' => false,
                    'debug' => true,
                ]
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha ao enviar o arquivo: {$response}"];
        }
    }

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