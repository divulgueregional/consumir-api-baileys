# CONSUMIR API BAILEYS PHP

## Introdução

Essa biblioteca tem o objetivo de usar os recursos disponíveis da API do Baileys que é comercializada nos grupos. Aqui não está disponível a API apenas a utilização dela.

## Como usar:
<b>Instalação: </b>
Para utilizar a biblioteca através do composer:
```php
composer require divulgueregional/api-inter-v2
```
## Atualizar:
```php
composer update
```
<b>Ou pela última tag: </b>
```php
composer update divulgueregional/consumir-api-baileys 1.0.3
```

## O QUE VOCÊ PODE UTILIZAR:
<b>InstanceController</b>
- <b>init:</b> criar instância
- <b>list:</b> listar instâncias criadas
- <b>instance_key:</b> dados de uma instância
- <b>obterChats:</b> listar chats
- <b>obterMessages:</b> recebe mensagem de um determinado chat
- <b>obterContacts:</b> lista de contatos
- <b>isOnWhatsApp</b>: verifica se o número está cadastrado no whatsapp
- <b>qrcode:</b> gera url para ler o qrcode
- <b>qrcodeBase64:</b> (falta fazer)
- <b>logout:</b> (falta fazer)
- <b>delete:</b> (falta fazer)
- <b>downloadMediaMessage:</b> (falta fazer)

<b>WebhookController</b>
- <b>getWebhook:</b> Busca o whebhook cadastrado.
- <b>updateUrl:</b> Cria um webhook
- <b>enableMessage:</b> habilitar ou desabilitar um webhook

<b>SendMessageController</b>
- <b>textToMany:</b> enviar mensagem de texto para mais de um número
- <b>text:</b> enviar mensagem de texto para um número
- <b>document:</b> enviar um arquivo
- <b>mediaUrl:</b> permite que você envie um URL de mídia para um usuário.
- <b>image:</b> Envia uma imagem para um determinado número
- <b>video:</b> (falta fazer)
- <b>audio:</b> (falta fazer)
- <b>location:</b> (falta fazer)
- <b>templateMessage:</b> Permite que você crie 3 tipos de botões.<br>
        - replyButton: replicar a msg recebida<br>
        - urlButton: título, uma msg e um botão que direciona para um link a ser aberto no navegador<br>
        - callButton: manda uma msg e um botão que ao clicar abre para discar o número<br>
- <b>templateMessageWithMedia:</b> (falta fazer)
- <b>contactMessage:</b> Envia um vacard, possibilitando adicionar um contato nos contatos<br>
- <b>listMessage:</b> Você pode enviar uma lista de opções e o contato pode escolher uma opção e lhe retornar com a resposta.<br>

<b>GroupController</b>
- <b>listGroup:</b> Lista todos os grupos
- <b>adminGroups:</b> Lista todos os grupos em que você está e admin
- <b>adminGroupsWithParticipants:</b> Lista todos os grupos em que você está e admin junto com a matriz de participantes
- <b>group_id:</b> Lista todos os participantes de um grupo.<br>
- <b>creat:</b> Cria um grupo
- <b>addParticipants:</b> Adicionar participante(s) em um grupo.
- <b>removeParticipants:</b> Remove participantes de um grupo
- <b>groupInviteCode:</b> Pegar o código de convite do grupo
- <b>demoteParticipants:</b> Participante retirado como administrador
- <b>promoteParticipants:</b> Coloca  participante(s) como administrador de um grupo.
- <b>setWhoCanSendMessage:</b> Define quem envia mensagem no grupo
- <b>setWhoCanChangeSettings:</b> Definir quem pode alterar a configuração do grupo
- <b>leaveGroup:</b> Deixar o grupo


## Autor:
Roseno Matos (developer) rosenomatos@gmail.com

## Licença:
CONSUMIR API BAILEYS PHP é licenciado sob a Licença MIT (MIT). Você pode usar, copiar, modificar, integrar, publicar, distribuir e/ou vender cópias dos produtos finais, mas deve sempre declarar que Roseno Matos (rosenomatos@gmail.com) é o autor original destes códigos e atribuir um link para https://github.com/divulgueregional/consumir-api-baileys
<!-- ## Comunidade: -->
## Facilitou sua vida?
Se o projeto o ajudou em uma tarefa excencial a sua aplicação de uma forma simples e se gostaria de contribuir com uma pequena doação ao autor, faça pelo PIX abaixo<br><hr>

Chave Pix E-MAIL: roseno@divulgueregional.com.br