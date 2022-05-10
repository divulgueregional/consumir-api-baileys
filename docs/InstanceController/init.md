#  INIT - BAILEYS

## Descrição
Cria uma intância.

```php
    require_once '../../../vendor/autoload.php';
    use Divulgueregional\ConsumirApiBaileys\Baileys;

    $config = [
        'http' => 'http',//http ou https
        'dominio' => '',//seu ip ou dominio
        'porta' => 8000, //porta de instalação do bailey
    ];

    $filters = [
        "instance_key" => "teste2", //nome da instance - uma palavra
        "disableWebhook" => "false" //false ou true
    ];
    try {
        $Baileys = new Baileys($config);

        echo "<pre>";
        $init = $Baileys->init($filters);
        print_r($init);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```