#  QRCODE - BAILEYS

## Descrição
Cria uma url para abrir no navegador e ler o QRCode do WhatSapp.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $instance = 'teste'; //nome da instância
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $urlQRCode = $Baileys->qrcode($instance, $config);
        print_r($urlQRCode);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```