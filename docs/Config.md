# CONFIG API BAILEYS

## Introdução
Config é necessário para estabelecer a conexão e parâmetros iniciais, caso não queira ele dinâmicamnete poderá fixar o seu endereço no parâmentro base_uri.

```php
    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => => 8000, //porta de instalação do bailey
        'instancia' => '', //nome da inntância criada ao ler o qrcode
    ];
```