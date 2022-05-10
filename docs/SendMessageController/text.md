# TEXT - BAILEYS

## Descrição
Envia um texto simples para um determinado número.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
    ];

    $number = "55+DDD+Number";//ddd acima de 30 sem o 9
    $text = "oi";
    $filters["messageData"] = [
        "to" => "{$number}@s.whatsapp.net",
        "text" => "{$text}"
    ];
    $instance = ''; //nome da instância criada ao ler o qrcode
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $respText = $Baileys->text($filters, $instance);
        print_r($respText);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```