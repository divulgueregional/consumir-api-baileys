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

    public function reset(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'DELETE',
                "/rest/instance/{$this->config['instance']}/reset",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha  ao redefinir a instancia {$response}"];
        }
    }

    public function delete(String $key){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'DELETE',
                "/rest/instance/{$key}/delete",
                $options
            );

            $statusCode = $response->getStatusCode();
            $result = json_decode($response->getBody()->getContents());
            return array('status' => $statusCode, 'response' => $result);
        } catch (ClientException $e) {
            return $this->parseResultClient($e);
        } catch (\Exception $e) {
            $response = $e->getMessage();
            return ['error' => "Falha  ao redefinir a instancia {$response}"];
        }
    }

    public function qrcode_base64(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/instance/qrcode_base64/{$this->config['instance']}",
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

    public function document(array $info, string $extensao = 'pdf'){
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
                            'headers'  => ['Content-Type' => "application/{$extensao}"],
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
    ############# GroupController ################
    ##############################################
    public function listGroup(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/group/list/{$this->config['instance']}",
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

    public function adminGroups(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/group/{$this->config['instance']}/adminGroups",
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

    public function adminGroupsWithParticipants(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/group/{$this->config['instance']}/adminGroupsWithParticipants",
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

    public function group_id(string $group_id){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/group/{$this->config['instance']}/group/{$group_id}",
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

    public function createGroup($filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/group/{$this->config['instance']}/create",
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

    public function addParticipants($filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/group/{$this->config['instance']}/addParticipants",
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

    public function removeParticipants($filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode($filters);
        try {
            $response = $this->client->request(
                'DELETE',
                "/rest/group/{$this->config['instance']}/removeParticipants",
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

    public function groupInviteCode($filters){
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/group/{$this->config['instance']}/groupInviteCode",
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

    public function promoteParticipants($filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/group/{$this->config['instance']}/promoteParticipants",
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

    public function demoteParticipants($filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'DELETE',
                "/rest/group/{$this->config['instance']}/demoteParticipants",
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

    public function setWhoCanSendMessage($filters){
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'PUT',
                "/rest/group/{$this->config['instance']}/setWhoCanSendMessage",
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

    public function setWhoCanChangeSettings($filters){
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'PUT',
                "/rest/group/{$this->config['instance']}/setWhoCanChangeSettings",
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

    public function leaveGroup($filters){
        $options = $this->optionsRequest;
        $options['query'] = $filters;
        try {
            $response = $this->client->request(
                'PUT',
                "/rest/group/{$this->config['instance']}/leaveGroup",
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
    ############# FIM - GroupController ##########
    ##############################################

    ##############################################
    ######## WEBHOOK #############################
    ##############################################
    public function getWebhook(){
        $options = $this->optionsRequest;
        try {
            $response = $this->client->request(
                'GET',
                "/rest/webhook/{$this->config['instance']}",
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
    
    public function updateUrl(array $filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/webhook/{$this->config['instance']}/updateUrl",
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
    
    public function enableMessage(array $filters){
        $options = $this->optionsRequest;
        $options['body'] = json_encode(($filters));
        try {
            $response = $this->client->request(
                'POST',
                "/rest/webhook/{$this->config['instance']}/enableMessage",
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
    ######## FIM - WEBHOOK #######################
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