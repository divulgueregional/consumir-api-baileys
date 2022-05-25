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
            ],'debug' => true,
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
    public function textToMany(array $filter, string $instance){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$instance}/textToMany",
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

    public function mediaURL(array $filter, string $instance){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filter));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/{$instance}/mediaUrl",
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

    public function document(string $instance, string $telefone, $cUrlFile){
        $url = "{$this->config['http']}://{$this->config['dominio']}:{$this->config['porta']}/rest/sendMessage/{$instance}/document?id={$telefone}";
        $headers = array("Content-Type:multipart/form-data");
        $postfields = array("file" => $cUrlFile);

        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_FAILONERROR => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_RETURNTRANSFER => true
        ); // cURL options
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        $info = curl_getinfo($ch);
        return $info;
    }

    //em teste, não funcionando
    public function documento(string $instance, $file){
        $contents = [
            "file" => '/nota.pdf',
            'type' =>' application/pdf',
        ];
        try {
            $response = $this->client->request(
                'POST',
                "/rest/sendMessage/drsystema/document?id=555484384705",
                [
                    'multipart' => [
                        // 'headers' => [
                        //     'Accept' => '*/*',
                        //     'Content-Type' => 'multipart/form-data',
                        // ],
                        
                        'headers' => array('Accept' => '*/*', 'Content-Type' => 'multipart/form-data'),
                        [
                            'name' => 'files',
                            'contents' => $contents,
                            'filename' => 'nota.pdf',
                        ],
                    ],
                    'verify' => false,
                    'debug' => true,
                ]
            );
            print_r($response);
            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {print_r($e);
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