#  QRCODE BASE64 - BAILEYS

## Descrição
Cria um QRCode na tag <img src="">.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
        'instance' => '' //sua instância
    ];
    $Baileys = new Baileys($config);

    try {
        echo "<pre>";
        $response = $this->Baileys->qrcode_base64();
        print_r($response);
        
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```