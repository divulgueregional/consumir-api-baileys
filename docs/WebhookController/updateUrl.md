#  UPDATE URL - BAILEYS

## Descrição
Cria um webhook.

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
            "url" => "", // sua url para receber as msg
        ];

        echo "<pre>";
        $updateUrl = $Baileys->updateUrl($filters);
        // print_r($updateUrl);
        if($updateUrl['status']==200){
            echo "Webhook criado: {$filters['data']['url']}";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
```