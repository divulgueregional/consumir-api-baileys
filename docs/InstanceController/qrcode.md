#  QRCODE - BAILEYS

## Descrição
Cria uma url para abrir no navegador e ler o QRCode do WhatSapp.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];

    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $urlQRCode = $Baileys->qrcode();
        print_r($urlQRCode);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```