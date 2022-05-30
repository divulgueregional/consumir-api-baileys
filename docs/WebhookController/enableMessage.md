#  UPDATE URL - BAILEYS

## Descrição
habilitar ou desabilitar um webhook.

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

        $filters["data"] = [
            "sendWebhook" => true // true or false
        ];

        echo "<pre>";
        $enableMessage = $Baileys->enableMessage($filters);
        print_r($enableMessage);
        if($enableMessage['status']==200){
            echo "Webhook sendWebhook: {$filters['data']['sendWebhook']}";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```