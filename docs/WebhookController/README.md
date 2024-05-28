# WEBHOOK

## Introdução

Receber as mensagens enviadas para uma intância.

## Processo

1- getWebHook: consulta a situação do webhook de uma intância.
2- updateURL: criar ou deletar um webhook.
3- enableMessage: true para receber as msg e false para não receber

## Arquivo php

Receber as mensagens

```php
$response = trim(file_get_contents('php://input'));
$retorno = json_decode($response);//stdClass
$retorno = json_decode($response, true);// array
//key->remoteJid: quem enviou a msg
//jid: que recebeu a msg
print_r($retorno);

//gravar o retorno em um arquivo
$aleatorio = rand(1, 500);
$dataHora = date('Y-m-d H:s:i');//{$aleatorio}-
$fp = fopen("webhook-{$dataHora}.log", "a");
fwrite($fp, $response);
fclose($fp);
```
